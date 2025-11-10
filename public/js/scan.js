// scan.js - Modular Scanner Application
class QRScanner {
    constructor() {
        this.lastKeyTime = 0;
        this.scannerBuffer = '';
        this.totalScans = 0;
        this.successfulScans = 0;
        this.failedScans = 0;
        this.lastScanData = null;
        this.isManualInput = false;
        this.scannerActive = false;
        this.videoStream = null;
        this.scanAnimationFrame = null;
        this.isProcessing = false;
        
        this.init();
    }

    init() {
        this.initializeScanner();
        this.initializeEventListeners();
        this.showScannerStatus('Scanner siap - Gunakan hardware scanner atau input manual', 'info');
        
        // Preload JSQR library
        this.preloadResources();
    }

    preloadResources() {
        // Preload critical resources
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = 'https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js';
        link.as = 'script';
        document.head.appendChild(link);
    }

    initializeScanner() {
        const scannerInput = document.getElementById('scanner-input');
        if (scannerInput) {
            scannerInput.focus();
            
            scannerInput.addEventListener('click', () => {
                this.focusScannerInput();
            });
        }
    }

    focusScannerInput() {
        const scannerInput = document.getElementById('scanner-input');
        if (scannerInput) {
            scannerInput.focus();
            scannerInput.select();
        }
    }

    initializeEventListeners() {
        // Camera Scanner Controls
        this.addEventListener('start-scanner', 'click', this.startCameraScanner.bind(this));
        this.addEventListener('stop-scanner', 'click', this.stopCameraScanner.bind(this));
        
        // Touch events for mobile
        this.addEventListener('start-scanner', 'touchend', this.startCameraScanner.bind(this));
        this.addEventListener('stop-scanner', 'touchend', this.stopCameraScanner.bind(this));

        // Manual Verification
        this.addEventListener('verify-btn', 'click', this.handleManualVerification.bind(this));
        
        // Enter key support
        this.addEventListener('scanner-input', 'keypress', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                this.handleManualVerification();
            }
        });

        // Hardware Scanner Detection
        document.addEventListener('keydown', this.handleHardwareScanner.bind(this));

        // Page Visibility Changes
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && this.scannerActive) {
                this.stopCameraScanner();
            }
        });

        // Cleanup
        window.addEventListener('beforeunload', this.stopCameraScanner.bind(this));
        window.addEventListener('pagehide', this.stopCameraScanner.bind(this));
        
        // Focus management
        document.addEventListener('click', this.focusScannerInput.bind(this));
    }

    addEventListener(elementId, event, handler) {
        const element = document.getElementById(elementId);
        if (element) {
            element.addEventListener(event, handler);
        }
    }

    handleHardwareScanner(event) {
        if (this.isProcessing) return;

        const now = Date.now();
        const timeSinceLastKey = now - this.lastKeyTime;

        // Reset buffer jika waktu antara input terlalu lama
        if (timeSinceLastKey > 100) {
            this.scannerBuffer = '';
            this.isManualInput = false;
        }

        this.lastKeyTime = now;

        // Handle Enter key (end of scan)
        if (event.key === 'Enter' && this.scannerBuffer.length > 0) {
            event.preventDefault();
            this.processHardwareScannerInput();
            return;
        }

        // Accumulate characters
        if (event.key.length === 1 && !event.ctrlKey && !event.altKey && !event.metaKey) {
            this.scannerBuffer += event.key;
            if (!this.isManualInput && this.scannerBuffer.length > 2) {
                this.isManualInput = true;
            }
        }
    }

    processHardwareScannerInput() {
        console.log('🔍 HARDWARE SCANNER DETECTED:', this.scannerBuffer);

        const processedCode = this.scannerBuffer.trim().toUpperCase();
        this.totalScans++;
        this.updateStats();

        const scannerInput = document.getElementById('scanner-input');
        
        if (this.validateICAQrFormat(processedCode)) {
            this.showScannerStatus('✅ QR Code ICA terdeteksi: ' + processedCode, 'success');
            scannerInput.classList.add('scanner-input-active');
            this.verifyQRCode(processedCode, 'hardware');
        } else {
            this.failedScans++;
            this.updateStats();
            this.showErrorResult(
                '❌ Format tidak valid: <strong>' + processedCode + '</strong><br>' +
                '❌ Ini adalah <strong>barcode produk</strong>, bukan QR Code ICA!<br>' +
                '✅ Silakan scan <strong>QR Code ICA</strong> dengan format: <strong>ICA-XXX-XXXX</strong>'
            );
            scannerInput.classList.add('scanner-input-active');
        }

        this.scannerBuffer = '';
        this.clearScannerInput();
    }

    handleManualVerification() {
        const scannerInput = document.getElementById('scanner-input');
        const qrData = scannerInput.value.trim();

        if (!qrData) {
            this.showErrorResult('Silakan masukkan atau scan kode QR terlebih dahulu');
            this.focusScannerInput();
            return;
        }

        this.processQRCode(qrData, 'manual');
    }

    processQRCode(qrData, source = 'hardware') {
        if (this.isProcessing) {
            console.log('⚠️ Request sedang diproses, tunggu...');
            return;
        }

        const normalizedQrCode = qrData.trim().toUpperCase();
        this.totalScans++;
        this.updateStats();

        if (!this.validateICAQrFormat(normalizedQrCode)) {
            this.failedScans++;
            this.updateStats();
            this.showErrorResult(
                '❌ Format QR Code tidak valid: "' + normalizedQrCode + '"<br>' +
                '<strong>Format yang diharapkan: ICA-XXX-XXXX</strong><br>' +
                'Contoh: <strong>ICA-ABC-1234</strong>'
            );
            return;
        }

        this.showScannerStatus('✅ QR Code ICA terdeteksi: ' + normalizedQrCode, 'success');
        this.verifyQRCode(normalizedQrCode, source);
    }

    validateICAQrFormat(qrData) {
        const icaPattern = /^ICA-[A-Z0-9]{3}-[A-Z0-9]{4,}$/i;
        return icaPattern.test(qrData.trim());
    }

    async verifyQRCode(qrData, source = 'hardware') {
        if (this.isProcessing) return;
        
        this.isProcessing = true;
        const normalizedQrCode = qrData.trim().toUpperCase();

        // Show loading state
        this.showLoadingState();

        try {
            const requestData = {
                qr_code: normalizedQrCode,
                source: source,
                timestamp: Date.now()
            };

            console.log('Sending verification request:', requestData);

            const response = await fetch('{{ route('admin.checkin') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(requestData)
            });

            const data = await response.json();
            console.log('Verification response:', data);

            if (!response.ok) {
                throw new Error(data.message || `HTTP error! status: ${response.status}`);
            }

            this.handleVerificationResponse(data, normalizedQrCode, source);
            
        } catch (error) {
            console.error('Verification Error:', error);
            this.failedScans++;
            this.updateStats();
            this.showErrorResult(error.message || 'Terjadi kesalahan saat memverifikasi QR Code');
            this.showScannerStatus('❌ Error: ' + error.message, 'danger');
        } finally {
            this.isProcessing = false;
            this.hideLoadingState();
            this.clearScannerInput();
        }
    }

    handleVerificationResponse(data, qrCode, source) {
        if (data.success === true) {
            this.successfulScans++;
            this.updateStats();

            const participantData = data.data || {};

            if (data.is_duplicate === true) {
                this.showSuccessResult(participantData, data.message || 'Peserta sudah check-in sebelumnya');
                this.showScannerStatus('⚠ Peserta sudah check-in sebelumnya', 'warning');
            } else {
                this.showSuccessResult(participantData, data.message || 'Check-in berhasil!');
                this.showScannerStatus('✅ Check-in berhasil! Scanner siap untuk scan berikutnya', 'success');
            }

            this.lastScanData = {
                qrCode: qrCode,
                name: participantData.nama || participantData.name || 'Tidak ada nama',
                time: new Date().toLocaleTimeString('id-ID'),
                method: source
            };

        } else {
            this.failedScans++;
            this.updateStats();
            this.showErrorResult(data.message || 'Verifikasi gagal');
            this.showScannerStatus('❌ Check-in gagal', 'danger');
        }
    }

    showLoadingState() {
        const verifyBtn = document.getElementById('verify-btn');
        if (verifyBtn) {
            verifyBtn.innerHTML = '<span class="loading-spinner"></span> Memproses...';
            verifyBtn.disabled = true;
        }
        this.showScannerStatus('⏳ Memverifikasi QR Code...', 'info');
    }

    hideLoadingState() {
        const verifyBtn = document.getElementById('verify-btn');
        if (verifyBtn) {
            verifyBtn.innerHTML = '<i class="fas fa-search me-2"></i>Verifikasi';
            verifyBtn.disabled = false;
        }
    }

    clearScannerInput() {
        const scannerInput = document.getElementById('scanner-input');
        setTimeout(() => {
            scannerInput.value = '';
            scannerInput.classList.remove('scanner-input-active');
            this.focusScannerInput();
        }, 100);
    }

    // Camera Scanner Methods
    async startCameraScanner() {
        if (this.scannerActive) return;

        console.log('Starting camera scanner...');
        this.showScannerStatus('Menyiapkan kamera...', 'info');

        const container = document.getElementById('scanner-container');
        const startBtn = document.getElementById('start-scanner');
        const stopBtn = document.getElementById('stop-scanner');
        const permissionMsg = document.getElementById('camera-permission');

        // Show loading state
        startBtn.innerHTML = '<span class="loading-spinner"></span> Membuka Kamera...';
        startBtn.disabled = true;

        try {
            permissionMsg.style.display = 'none';

            const constraints = {
                video: {
                    facingMode: "environment",
                    width: { min: 320, ideal: 1280, max: 1920 },
                    height: { min: 240, ideal: 720, max: 1080 },
                    aspectRatio: { ideal: 4 / 3 }
                },
                audio: false
            };

            this.videoStream = await navigator.mediaDevices.getUserMedia(constraints);
            console.log('Camera access granted');

            await this.setupVideoStream();

            // Update UI
            startBtn.style.display = 'none';
            container.style.display = 'block';
            stopBtn.style.display = 'block';
            this.showScannerStatus('Kamera aktif - Arahkan ke QR Code', 'success');

        } catch (err) {
            console.error("Camera error:", err);
            this.handleCameraError(err);
        } finally {
            startBtn.disabled = false;
            startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';
        }
    }

    async setupVideoStream() {
        const video = document.createElement('video');
        video.srcObject = this.videoStream;
        video.setAttribute("playsinline", true);
        video.setAttribute("autoplay", true);
        video.setAttribute("muted", true);
        video.style.width = "100%";
        video.style.height = "100%";
        video.style.objectFit = "cover";

        const reader = document.getElementById('reader');
        reader.innerHTML = '<div class="scan-line"></div>';
        reader.appendChild(video);

        // Wait for video to be ready
        await new Promise((resolve) => {
            video.addEventListener('loadeddata', resolve, { once: true });
        });

        await video.play();
        this.startQRScanning(video);
    }

    startQRScanning(video) {
        this.scannerActive = true;
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        const scanFrame = () => {
            if (!this.scannerActive) return;

            try {
                if (video.readyState === video.HAVE_ENOUGH_DATA) {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    
                    // Use jsQR if available
                    if (typeof jsQR !== 'undefined') {
                        const code = jsQR(imageData.data, imageData.width, imageData.height);
                        if (code) {
                            console.log('QR Code detected:', code.data);
                            this.verifyQRCode(code.data, 'camera');
                            this.stopCameraScanner();
                            return;
                        }
                    }
                }

                this.scanAnimationFrame = requestAnimationFrame(scanFrame);
            } catch (error) {
                console.error('Scanning error:', error);
                this.scanAnimationFrame = requestAnimationFrame(scanFrame);
            }
        };

        this.scanAnimationFrame = requestAnimationFrame(scanFrame);
    }

    stopCameraScanner() {
        console.log('Stopping camera scanner...');
        this.scannerActive = false;

        if (this.scanAnimationFrame) {
            cancelAnimationFrame(this.scanAnimationFrame);
            this.scanAnimationFrame = null;
        }

        if (this.videoStream) {
            this.videoStream.getTracks().forEach(track => track.stop());
            this.videoStream = null;
        }

        const container = document.getElementById('scanner-container');
        const stopBtn = document.getElementById('stop-scanner');
        const startBtn = document.getElementById('start-scanner');
        const permissionMsg = document.getElementById('camera-permission');

        if (container) container.style.display = 'none';
        if (stopBtn) stopBtn.style.display = 'none';
        if (startBtn) startBtn.style.display = 'block';
        if (permissionMsg) permissionMsg.style.display = 'block';
        
        this.showScannerStatus('Scanner kamera dihentikan', 'info');
    }

    handleCameraError(err) {
        let errorMessage = "Tidak dapat mengakses kamera: ";

        const errorMap = {
            'NotAllowedError': "Izin kamera ditolak. Silakan izinkan akses kamera di browser Anda",
            'PermissionDeniedError': "Izin kamera ditolak. Silakan izinkan akses kamera di browser Anda",
            'NotFoundError': "Kamera tidak ditemukan. Pastikan perangkat memiliki kamera belakang.",
            'DevicesNotFoundError': "Kamera tidak ditemukan. Pastikan perangkat memiliki kamera belakang.",
            'NotSupportedError': "Browser tidak mendukung akses kamera. Gunakan Chrome, Firefox, atau Safari versi terbaru.",
            'NotReadableError': "Kamera sedang digunakan oleh aplikasi lain. Tutup aplikasi lain yang menggunakan kamera.",
            'TrackStartError': "Kamera sedang digunakan oleh aplikasi lain. Tutup aplikasi lain yang menggunakan kamera.",
            'OverconstrainedError': "Kamera tidak mendukung mode yang diminta. Coba gunakan browser lain."
        };

        errorMessage = errorMap[err.name] || errorMessage + err.message;
        this.showErrorResult(errorMessage);
    }

    showSuccessResult(data, message) {
        if (!data) data = {};

        const now = new Date();
        const waktuReal = now.toLocaleTimeString('id-ID');

        const infoHTML = `
            <div class="participant-details check-in-success">
                <p><strong>No. Tiket:</strong> ${data.kode || data.qr_code || 'Tidak ada'}</p>
                <p><strong>Nama:</strong> ${data.nama || data.name || 'Tidak ada'}</p>
                <p><strong>Email:</strong> ${data.email || 'Tidak ada'}</p>
                <p><strong>Posisi/Jabatan:</strong> ${data.position || 'Tidak ada'}</p>
                <p><strong>Event:</strong> ${data.event || 'Tidak ada'}</p>
                <p><strong>Telepon:</strong> ${data.telepon || data.phone || '-'}</p>
                <p><strong>Status:</strong> <span style="color: #28a745;">✓ SUDAH CHECK-IN</span></p>
                <p><strong>Waktu Check-in:</strong> ${waktuReal}</p>
            </div>
        `;

        document.getElementById('participant-info').innerHTML = infoHTML;
        document.getElementById('success-result').style.display = 'block';
        document.getElementById('error-result').style.display = 'none';
        document.getElementById('result-container').style.display = 'block';

        // Auto hide success after 5 seconds
        setTimeout(() => {
            if (document.getElementById('result-container').style.display !== 'none') {
                document.getElementById('result-container').style.display = 'none';
            }
        }, 5000);
    }

    showErrorResult(message) {
        document.getElementById('error-message').innerHTML = message;
        document.getElementById('success-result').style.display = 'none';
        document.getElementById('error-result').style.display = 'block';
        document.getElementById('result-container').style.display = 'block';

        // Add retry button
        this.addRetryButton();
        
        // Auto hide error after 8 seconds
        setTimeout(() => {
            if (document.getElementById('result-container').style.display !== 'none') {
                document.getElementById('result-container').style.display = 'none';
            }
        }, 8000);
    }

    addRetryButton() {
        const existingBtn = document.querySelector('.restart-scanner-btn');
        if (existingBtn) existingBtn.remove();

        const errorResult = document.getElementById('error-result');
        const retryBtn = document.createElement('button');
        retryBtn.className = 'btn btn-admin-primary mt-3 restart-scanner-btn';
        retryBtn.innerHTML = '<i class="fas fa-redo me-2"></i>Coba Lagi';
        retryBtn.onclick = () => {
            document.getElementById('result-container').style.display = 'none';
            this.focusScannerInput();
        };
        errorResult.appendChild(retryBtn);
    }

    showScannerStatus(message, type = 'info') {
        const statusEl = document.getElementById('scanner-status');
        const statusText = document.getElementById('scanner-status-text');

        if (!statusEl || !statusText) return;

        statusText.innerHTML = message;
        statusEl.className = `alert alert-${type} mb-4 scanner-status-pulse`;
        statusEl.style.display = 'block';
    }

    updateStats() {
        document.getElementById('total-scans').textContent = this.totalScans;
        document.getElementById('successful-scans').textContent = this.successfulScans;
        document.getElementById('failed-scans').textContent = this.failedScans;
    }
}

// Initialize scanner when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.qrScanner = new QRScanner();
});