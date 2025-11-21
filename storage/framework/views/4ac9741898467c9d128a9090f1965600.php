<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="admin-dashboard-container">
        <!-- Tombol Kembali -->
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-button">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
        </a>

        <!-- Header Halaman -->
        <div class="admin-header">
            <h1 class="admin-title">
                <i class="fas fa-qrcode me-2"></i>Verifikasi Tiket
            </h1>
            <p class="admin-subtitle">Scan QR Code atau input kode tiket manual</p>
        </div>

        <!-- Kartu Scanner -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="admin-table-card">
                    <div class="card-header-luxury text-center">
                        <h5 class="card-title-luxury">
                            <i class="fas fa-barcode me-2"></i>Scanner QR Code
                        </h5>
                    </div>

                    <div class="card-body-luxury">
                        <!-- Scanner Status Indicator -->
                        <div id="scanner-status" class="alert alert-info mb-4">
                            <i class="fas fa-plug me-2"></i>
                            <span id="scanner-status-text">Scanner siap - Gunakan scanner atau ketik manual</span>
                        </div>

                        <!-- Camera Scanner Section -->
                        <div class="text-center mb-4">
                            <!-- Pesan Izin Kamera -->
                            <div id="camera-permission" class="alert alert-info mb-3">
                                <i class="fas fa-info-circle me-2"></i>
                                Izinkan akses kamera untuk menggunakan scanner QR Code
                            </div>

                            <!-- Area Scanner -->
                            <div id="scanner-container" class="mb-3" style="display: none;">
                                <div id="reader">
                                    <div class="scan-line"></div>
                                    <video id="camera-video" muted playsinline></video>
                                </div>
                                <button id="stop-scanner" class="btn btn-admin-secondary mt-3" style="display: none;">
                                    <i class="fas fa-stop me-2"></i>Stop Scanner
                                </button>
                            </div>

                            <!-- Tombol Mulai Scanner -->
                            <button id="start-scanner" class="btn btn-admin-primary mb-4">
                                <i class="fas fa-camera me-2"></i>Mulai Scanner Kamera
                            </button>
                        </div>

                        <!-- Scanner Input Area -->
                        <div class="text-center mb-4">
                            <div class="form-group">
                                <label for="scanner-input" class="form-label">
                                    <i class="fas fa-barcode me-2"></i>SCAN ATAU INPUT KODE TIKET
                                </label>

                                <div class="row g-2">
                                    <div class="col-12 col-md-8">
                                        <input type="text" name="qr_code" id="scanner-input" class="form-control"
                                            placeholder="SCAN QR CODE ATAU KETIK MANUAL (ICA-XXX-XXXX)" required
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            autofocus>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button type="button" class="btn-admin-primary w-100" id="verify-btn">
                                            <i class="fas fa-search me-2"></i>Verifikasi
                                        </button>
                                    </div>
                                </div>

                                <small class="form-text text-warning mt-2">
                                    <i class="fas fa-lightbulb me-1"></i>
                                    Arahkan hardware scanner ke input ini untuk scan QR Code, atau ketik kode tiket
                                    manual lalu klik Verifikasi
                                </small>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="row text-center mb-4">
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="text-gold" style="color: #D4AF37;">
                                        <i class="fas fa-users fa-lg"></i>
                                    </div>
                                    <div class="text-white mt-2">
                                        <div class="h5 mb-0" id="total-scans">0</div>
                                        <small>Total Scan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="text-success">
                                        <i class="fas fa-check-circle fa-lg"></i>
                                    </div>
                                    <div class="text-white mt-2">
                                        <div class="h5 mb-0" id="successful-scans">0</div>
                                        <small>Berhasil</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="text-danger">
                                        <i class="fas fa-times-circle fa-lg"></i>
                                    </div>
                                    <div class="text-white mt-2">
                                        <div class="h5 mb-0" id="failed-scans">0</div>
                                        <small>Gagal</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hasil Scan/Verifikasi -->
                        <div id="result-container" class="mt-4" style="display: none;">
                            <div class="alert alert-success" id="success-result" style="display: none;">
                                <h5><i class="fas fa-check-circle me-2"></i>Check-in Berhasil!</h5>
                                <div id="participant-info"></div>
                            </div>
                            <div class="alert alert-danger" id="error-result" style="display: none;">
                                <h5><i class="fas fa-times-circle me-2"></i>Check-in Gagal</h5>
                                <p id="error-message"></p>
                            </div>
                            <div class="alert alert-already-checked-in" id="already-checked-in-result"
                                style="display: none;">
                                <h5><i class="fas fa-exclamation-triangle me-2"></i>Peserta Sudah Check-in</h5>
                                <div id="already-checked-in-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    // QR Scanner Application
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
            this.scanCooldown = 1000; // 1 second cooldown between scans

            this.init();
        }

        init() {
            this.initializeScanner();
            this.initializeEventListeners();
            this.showScannerStatus('Scanner siap - Gunakan scanner atau ketik manual', 'info');
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
        }

        addEventListener(elementId, event, handler) {
            const element = document.getElementById(elementId);
            if (element) {
                element.addEventListener(event, handler);
            }
        }

        handleHardwareScanner(event) {
            if (this.isProcessing) return;

            // Ignore modifier keys and special keys
            if (event.ctrlKey || event.altKey || event.metaKey || 
                event.key === 'Shift' || event.key === 'Control' || 
                event.key === 'Alt' || event.key === 'Meta') {
                return;
            }

            const now = Date.now();
            const timeSinceLastKey = now - this.lastKeyTime;

            // Reset buffer jika waktu antara input terlalu lama (lebih dari 200ms)
            if (timeSinceLastKey > 200) {
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

            // Accumulate characters (only alphanumeric and dash)
            if (event.key.length === 1 && /[a-zA-Z0-9\-]/.test(event.key)) {
                this.scannerBuffer += event.key;
            }
        }

        processHardwareScannerInput() {
            const processedCode = this.scannerBuffer.trim().toUpperCase();
            console.log('🔍 HARDWARE SCANNER DETECTED:', processedCode);

            if (!processedCode) return;

            this.totalScans++;
            this.updateStats();

            const scannerInput = document.getElementById('scanner-input');

            if (this.validateICAQrFormat(processedCode)) {
                this.showScannerStatus('✅ QR Code ICA terdeteksi: ' + processedCode, 'success');
                scannerInput.value = processedCode;
                scannerInput.classList.add('scanner-input-active');
                this.verifyQRCode(processedCode, 'hardware');
            } else {
                this.failedScans++;
                this.updateStats();
                this.showErrorResult(
                    '❌ Format tidak valid: <strong>' + processedCode + '</strong><br>' +
                    'Format yang diharapkan: <strong>ICA-XXX-XXXX</strong><br>' +
                    'Contoh: <strong>ICA-ABC-1234</strong>'
                );
                scannerInput.value = processedCode;
                scannerInput.classList.add('scanner-input-error');
            }

            this.scannerBuffer = '';
        }

        handleManualVerification() {
            if (this.isProcessing) {
                console.log('⚠️ Request sedang diproses, tunggu...');
                return;
            }

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
            const icaPattern = /^ICA-[A-Z0-9]{3}-[A-Z0-9]{4}$/i;
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

                const response = await fetch('<?php echo e(route('admin.checkin')); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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
                // Don't clear input immediately, wait a bit
                setTimeout(() => this.clearScannerInput(), 2000);
            }
        }

        handleVerificationResponse(data, qrCode, source) {
            if (data.success === true) {
                this.successfulScans++;
                this.updateStats();

                const participantData = data.data || {};

                if (data.is_duplicate === true) {
                    this.showAlreadyCheckedInResult(participantData, data.message);
                    this.showScannerStatus('⚠ Peserta sudah check-in sebelumnya', 'warning');
                } else {
                    this.showSuccessResult(participantData, data.message);
                    this.showScannerStatus('✅ Check-in berhasil! Scanner siap untuk scan berikutnya', 'success');
                }

                this.lastScanData = {
                    qrCode: qrCode,
                    name: participantData.nama || 'Tidak ada nama',
                    time: this.getCurrentJakartaTime(),
                    method: source
                };

            } else {
                this.failedScans++;
                this.updateStats();
                this.showErrorResult(data.message || 'Verifikasi gagal');
                this.showScannerStatus('❌ Check-in gagal', 'danger');
            }
        }

        getCurrentJakartaTime() {
            const now = new Date();
            return now.toLocaleTimeString('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }

        getCurrentJakartaDate() {
            const now = new Date();
            return now.toLocaleDateString('id-ID', {
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        showAlreadyCheckedInResult(data, message) {
            const waktuSekarang = this.getCurrentJakartaTime();
            const tanggalSekarang = this.getCurrentJakartaDate();

            let previousCheckinTime = data.waktu_checkin || 'Tidak diketahui';
            let checkedInBy = data.checked_in_by || 'Tidak diketahui';

            const infoHTML = `
                <div class="participant-details">
                    <p><strong>No. Tiket:</strong> ${data.kode || 'Tidak ada'}</p>
                    <p><strong>Nama:</strong> ${data.nama || 'Tidak ada'}</p>
                    <p><strong>Email:</strong> ${data.email || 'Tidak ada'}</p>
                    <p><strong>Posisi/Jabatan:</strong> ${data.position || 'Tidak ada'}</p>
                    <p><strong>Status:</strong> <span style="color: #ff9800; font-weight: bold;">⚠ SUDAH CHECK-IN SEBELUMNYA</span></p>
                    
                    <div class="previous-checkin-info mt-3 p-3" style="background: rgba(255,152,0,0.1); border-radius: 5px;">
                        <p style="color: #ff9800; font-weight: bold;">
                            <i class="fas fa-exclamation-triangle me-2"></i>INFORMASI CHECK-IN SEBELUMNYA:
                        </p>
                        <p><strong>Waktu Check-in:</strong> ${previousCheckinTime} WIB</p>
                        <p><strong>Checked-in oleh:</strong> ${checkedInBy}</p>
                        <p><strong>Waktu Pengecekan:</strong> ${waktuSekarang} WIB</p>
                        <p><strong>Tanggal Pengecekan:</strong> ${tanggalSekarang}</p>
                    </div>
                </div>             
            `;

            this.showResult('already-checked-in', infoHTML, 10000);
        }

        showSuccessResult(data, message) {
            const waktuReal = this.getCurrentJakartaTime();
            const tanggalReal = this.getCurrentJakartaDate();

            const infoHTML = `
                <div class="participant-details check-in-success">
                    <p><strong>No. Tiket:</strong> ${data.kode || 'Tidak ada'}</p>
                    <p><strong>Nama:</strong> ${data.nama || 'Tidak ada'}</p>
                    <p><strong>Email:</strong> ${data.email || 'Tidak ada'}</p>
                    <p><strong>Posisi/Jabatan:</strong> ${data.position || 'Tidak ada'}</p>
                    <p><strong>Status:</strong> <span style="color: #28a745;">✓ CHECK-IN BERHASIL</span></p>
                    <p><strong>Waktu Check-in:</strong> ${waktuReal} WIB</p>
                    <p><strong>Tanggal Check-in:</strong> ${tanggalReal}</p>
                    <p><strong>Checked-in oleh:</strong> ${data.checked_in_by || 'System'}</p>
                </div>
            `;

            this.showResult('success', infoHTML, 5000);
        }

        showErrorResult(message) {
            const errorHTML = `
                <p>${message}</p>
                <button class="btn btn-admin-primary mt-3" onclick="window.qrScanner.retryScan()">
                    <i class="fas fa-redo me-2"></i>Coba Lagi
                </button>
            `;
            this.showResult('error', errorHTML, 8000);
        }

        showResult(type, content, autoHideDelay) {
            // Hide all results first
            this.hideAllResults();

            const resultContainer = document.getElementById('result-container');
            const targetResult = document.getElementById(`${type}-result`);
            const targetContent = document.getElementById(
                type === 'success' ? 'participant-info' :
                type === 'error' ? 'error-message' :
                'already-checked-in-info'
            );

            if (targetContent) targetContent.innerHTML = content;
            if (targetResult) targetResult.style.display = 'block';
            if (resultContainer) resultContainer.style.display = 'block';

            // Auto hide
            if (autoHideDelay) {
                setTimeout(() => {
                    if (resultContainer && resultContainer.style.display !== 'none') {
                        resultContainer.style.display = 'none';
                    }
                }, autoHideDelay);
            }
        }

        hideAllResults() {
            const results = ['success', 'error', 'already-checked-in'];
            results.forEach(type => {
                const element = document.getElementById(`${type}-result`);
                if (element) element.style.display = 'none';
            });
            
            const resultContainer = document.getElementById('result-container');
            if (resultContainer) resultContainer.style.display = 'none';
        }

        retryScan() {
            this.hideAllResults();
            this.focusScannerInput();
        }

        async startCameraScanner() {
            if (this.scannerActive) return;

            console.log('Starting camera scanner...');
            this.showScannerStatus('Menyiapkan kamera...', 'info');

            const container = document.getElementById('scanner-container');
            const startBtn = document.getElementById('start-scanner');
            const stopBtn = document.getElementById('stop-scanner');
            const permissionMsg = document.getElementById('camera-permission');

            // Show loading state
            if (startBtn) {
                startBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Membuka Kamera...';
                startBtn.disabled = true;
            }

            try {
                if (permissionMsg) permissionMsg.style.display = 'none';

                const constraints = {
                    video: {
                        facingMode: "environment",
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    }
                };

                this.videoStream = await navigator.mediaDevices.getUserMedia(constraints);
                console.log('Camera access granted');

                await this.setupVideoStream();

                // Update UI
                if (startBtn) startBtn.style.display = 'none';
                if (container) container.style.display = 'block';
                if (stopBtn) stopBtn.style.display = 'inline-block';
                this.showScannerStatus('Kamera aktif - Arahkan ke QR Code', 'success');

            } catch (err) {
                console.error("Camera error:", err);
                this.handleCameraError(err);
            } finally {
                if (startBtn) {
                    startBtn.disabled = false;
                    startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';
                }
            }
        }

        async setupVideoStream() {
            const video = document.getElementById('camera-video');
            if (!video) {
                console.error('Video element not found');
                return;
            }

            video.srcObject = this.videoStream;

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

                        if (typeof jsQR !== 'undefined') {
                            const code = jsQR(imageData.data, imageData.width, imageData.height, {
                                inversionAttempts: "dontInvert",
                            });

                            if (code && this.validateICAQrFormat(code.data)) {
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
            if (startBtn) {
                startBtn.style.display = 'inline-block';
                startBtn.disabled = false;
            }
            if (permissionMsg) permissionMsg.style.display = 'block';

            this.showScannerStatus('Scanner kamera dihentikan', 'info');
        }

        handleCameraError(err) {
            const errorMap = {
                'NotAllowedError': "Izin kamera ditolak. Silakan izinkan akses kamera di browser Anda",
                'PermissionDeniedError': "Izin kamera ditolak. Silakan izinkan akses kamera di browser Anda",
                'NotFoundError': "Kamera tidak ditemukan. Pastikan perangkat memiliki kamera belakang.",
                'NotSupportedError': "Browser tidak mendukung akses kamera.",
                'NotReadableError': "Kamera sedang digunakan oleh aplikasi lain.",
                'OverconstrainedError': "Kamera tidak mendukung mode yang diminta."
            };

            const errorMessage = errorMap[err.name] || "Tidak dapat mengakses kamera: " + err.message;
            this.showErrorResult(errorMessage);
        }

        showLoadingState() {
            const verifyBtn = document.getElementById('verify-btn');
            if (verifyBtn) {
                verifyBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
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
            if (scannerInput) {
                scannerInput.value = '';
                scannerInput.classList.remove('scanner-input-active', 'scanner-input-error');
                this.focusScannerInput();
            }
        }

        showScannerStatus(message, type = 'info') {
            const statusEl = document.getElementById('scanner-status');
            const statusText = document.getElementById('scanner-status-text');

            if (!statusEl || !statusText) return;

            statusText.textContent = message;
            statusEl.className = `alert alert-${type} mb-4`;
        }

        updateStats() {
            const elements = {
                'total-scans': this.totalScans,
                'successful-scans': this.successfulScans,
                'failed-scans': this.failedScans
            };

            Object.entries(elements).forEach(([id, value]) => {
                const element = document.getElementById(id);
                if (element) element.textContent = value;
            });
        }
    }

    // Initialize scanner when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        window.qrScanner = new QRScanner();
    });
</script>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/admin/scan-qr.blade.php ENDPATH**/ ?>