<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Verifikasi Tiket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.3.8/minified/html5-qrcode.min.js"></script>
    <style>
        :root {
            --luxury-gold: #D4AF37;
            --luxury-dark: #1a1a1a;
            --luxury-darker: #0d0d0d;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        body {
            background-color: var(--luxury-darker);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .admin-dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            color: var(--luxury-gold);
            text-decoration: none;
            margin-bottom: 20px;
            transition: color 0.3s;
        }
        
        .back-button:hover {
            color: #f1c40f;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .admin-title {
            color: var(--luxury-gold);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .admin-subtitle {
            color: #aaa;
            font-size: 1.1rem;
        }
        
        .admin-table-card {
            background: linear-gradient(145deg, #2a2a2a, #1f1f1f);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
            border: 1px solid #333;
        }
        
        .card-header-luxury {
            background: linear-gradient(135deg, var(--luxury-gold), #b8941f);
            color: #000;
            padding: 15px 20px;
            border-bottom: 1px solid #333;
        }
        
        .card-title-luxury {
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }
        
        .card-body-luxury {
            padding: 25px;
        }
        
        .btn-admin-primary {
            background: linear-gradient(135deg, var(--luxury-gold), #b8941f);
            border: none;
            color: #000;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-admin-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }
        
        .btn-admin-secondary {
            background: #444;
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-admin-secondary:hover {
            background: #555;
        }
        
        .form-control {
            background-color: #333;
            border: 1px solid #555;
            color: #fff;
            border-radius: 6px;
            padding: 12px 15px;
        }
        
        .form-control:focus {
            background-color: #333;
            border-color: var(--luxury-gold);
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #ddd;
        }
        
        .form-text {
            color: #aaa;
            font-size: 0.85rem;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            padding: 15px 20px;
        }
        
        .alert-info {
            background-color: rgba(23, 162, 184, 0.2);
            color: #17a2b8;
            border-left: 4px solid #17a2b8;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border-left: 4px solid #28a745;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }
        
        .alert-already-checked-in {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border-left: 4px solid #ffc107;
        }
        
        /* Tabs Styling */
        .verification-tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #444;
        }
        
        .tab-button {
            flex: 1;
            background: transparent;
            border: none;
            color: #aaa;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s;
            border-bottom: 3px solid transparent;
        }
        
        .tab-button.active {
            color: var(--luxury-gold);
            border-bottom: 3px solid var(--luxury-gold);
        }
        
        .tab-button:hover:not(.active) {
            color: #ddd;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Scanner Styling */
        #scanner-container {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }
        
        #reader {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            border-radius: 8px;
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #reader video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .scan-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background: var(--luxury-gold);
            box-shadow: 0 0 10px var(--luxury-gold);
            animation: scan 2s infinite linear;
            z-index: 10;
        }
        
        @keyframes scan {
            0% {
                top: 0;
            }
            50% {
                top: 100%;
            }
            100% {
                top: 0;
            }
        }
        
        /* Stats Cards */
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        
        .text-gold {
            color: var(--luxury-gold);
        }
        
        /* Participant Details */
        .participant-details {
            margin-top: 15px;
        }
        
        .participant-details p {
            margin-bottom: 8px;
        }
        
        .check-in-success {
            background: rgba(40, 167, 69, 0.1);
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }
        
        .previous-checkin-info {
            background: rgba(255, 152, 0, 0.1);
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #ff9800;
        }
        
        /* Html5Qrcode Custom Styling */
        #html5-qrcode-anchor-scan-type-change {
            display: none !important;
        }
        
        #html5qr-code-full-region {
            border: none !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .verification-tabs {
                flex-direction: column;
            }
            
            .tab-button {
                text-align: center;
                border-bottom: 1px solid #444;
                border-right: none;
            }
            
            .tab-button.active {
                border-bottom: 3px solid var(--luxury-gold);
                border-right: none;
            }
            
            #reader {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-dashboard-container">
        <!-- Tombol Kembali -->
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="back-button">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
        </a>

        <!-- Header Halaman -->
        <div class="admin-header">
            <!-- Tabs untuk pilihan verifikasi -->
            <div class="verification-tabs">
                <button class="tab-button active" data-tab="scan-tab">
                    <i class="fas fa-camera me-2"></i>Scan QR Code
                </button>
                <button class="tab-button" data-tab="manual-tab">
                    <i class="fas fa-keyboard me-2"></i>Input Manual
                </button>
            </div>
        </div>

        <!-- Kartu Scanner -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="admin-table-card">
                    <div class="card-header-luxury text-center">
                        <h5 class="card-title-luxury">
                            <i class="fas fa-barcode me-2"></i>Verifikasi Tiket
                        </h5>
                    </div>

                    <div class="card-body-luxury">
                        <!-- Scanner Status Indicator -->
                        <div id="scanner-status" class="alert alert-info mb-4">
                            <i class="fas fa-plug me-2"></i>
                            <span id="scanner-status-text">Scanner siap - Pilih metode verifikasi</span>
                        </div>

                        <!-- Tab Scan QR Code -->
                        <div id="scan-tab" class="tab-content active">
                            <!-- Pesan Izin Kamera -->
                            <div id="camera-permission" class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i>
                                Izinkan akses kamera untuk menggunakan scanner QR Code
                            </div>

                            <!-- Area Scanner -->
                            <div id="scanner-container" class="mb-4" style="display: none;">
                                <div id="reader">
                                    <div class="scan-line"></div>
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

                        <!-- Tab Input Manual -->
                        <div id="manual-tab" class="tab-content">
                            <form id="manual-verification-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="qr-code-input" class="form-label">Kode QR Tiket</label>
                                    <input type="text" name="qr_code" id="qr-code-input" class="form-control"
                                        placeholder="Masukkan kode QR (contoh: ICA-ABC-1234)" required>
                                    <div class="form-text">
                                        Format: ICA-XXX-XXXX (contoh: ICA-ABC-1234)
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-admin-primary w-100 mt-2">
                                    <i class="fas fa-check me-2"></i> Verifikasi & Check In
                                </button>
                            </form>
                        </div>

                        <!-- Quick Stats -->
                        <div class="row text-center mb-4">
                            <div class="col-4">
                                <div class="stat-card">
                                    <div class="text-gold">
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
                            <div class="alert alert-already-checked-in" id="already-checked-in-result" style="display: none;">
                                <h5><i class="fas fa-exclamation-triangle me-2"></i>Peserta Sudah Check-in</h5>
                                <div id="already-checked-in-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // SUPER FAST QR Scanner dengan Html5Qrcode
    class FastQRScanner {
        constructor() {
            this.totalScans = 0;
            this.successfulScans = 0;
            this.failedScans = 0;
            this.isProcessing = false;
            this.html5QrCode = null;
            this.scannerActive = false;

            this.init();
        }

        init() {
            this.initializeTabs();
            this.initializeEventListeners();
            this.showScannerStatus('Scanner siap - Pilih metode verifikasi', 'info');
        }

        initializeTabs() {
            document.querySelectorAll('.tab-button').forEach(button => {
                button.addEventListener('click', () => {
                    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                    button.classList.add('active');
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');

                    if (tabId === 'manual-tab') {
                        this.stopFastScanner();
                    } else {
                        setTimeout(() => {
                            this.focusScannerInput();
                        }, 100);
                    }
                });
            });
        }

        initializeEventListeners() {
            this.addEventListener('start-scanner', 'click', this.startFastScanner.bind(this));
            this.addEventListener('stop-scanner', 'click', this.stopFastScanner.bind(this));
            this.addEventListener('manual-verification-form', 'submit', this.handleManualVerification.bind(this));
        }

        addEventListener(elementId, event, handler) {
            const element = document.getElementById(elementId);
            if (element) {
                element.addEventListener(event, handler);
            }
        }

        async startFastScanner() {
            if (this.scannerActive) return;

            console.log('🚀 Starting SUPER FAST scanner...');
            this.showScannerStatus('Menyiapkan kamera...', 'info');

            const container = document.getElementById('scanner-container');
            const startBtn = document.getElementById('start-scanner');
            const stopBtn = document.getElementById('stop-scanner');
            const permissionMsg = document.getElementById('camera-permission');
            const reader = document.getElementById('reader');

            if (startBtn) {
                startBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Membuka Kamera...';
                startBtn.disabled = true;
            }

            try {
                if (permissionMsg) permissionMsg.style.display = 'none';
                
                // Clear previous scanner
                reader.innerHTML = '<div class="scan-line"></div>';
                
                if (container) container.style.display = 'block';

                // Initialize Html5Qrcode
                this.html5QrCode = new Html5Qrcode("reader");
                
                // 🚀 OPTIMIZED CONFIGURATION
                const config = {
                    fps: 15,                    // Balanced frame rate
                    qrbox: { width: 250, height: 150 }, // Focused scan area
                    aspectRatio: 4/3
                };

                console.log('📷 Starting camera with config:', config);

                // Start camera
                await this.html5QrCode.start(
                    { facingMode: "environment" },
                    config,
                    (decodedText) => {
                        this.onScanSuccess(decodedText);
                    },
                    (error) => {
                        // Silent failure - ignore scanning errors
                    }
                );

                this.scannerActive = true;
                
                if (startBtn) startBtn.style.display = 'none';
                if (stopBtn) stopBtn.style.display = 'inline-block';
                
                this.showScannerStatus('✅ Kamera aktif - Arahkan ke QR Code', 'success');
                console.log('🎬 FAST Scanner started successfully!');

            } catch (err) {
                console.error("❌ Scanner error:", err);
                this.handleCameraError(err);
            } finally {
                if (startBtn) {
                    startBtn.disabled = false;
                    startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';
                }
            }
        }

        async onScanSuccess(decodedText) {
            if (this.isProcessing) {
                console.log('⚠️ Masih memproses scan sebelumnya...');
                return;
            }

            console.log('🔍 QR Detected:', decodedText);
            
            // Validasi format ICA
            if (!this.validateICAQrFormat(decodedText)) {
                console.log('❌ Format tidak valid:', decodedText);
                this.showErrorResult('Format QR tidak valid: ' + decodedText);
                return;
            }

            this.stopFastScanner(); // Stop scanner sementara
            await this.verifyQRCode(decodedText, 'camera');
        }

        stopFastScanner() {
            console.log('🛑 Stopping fast scanner...');
            
            if (this.html5QrCode && this.scannerActive) {
                this.html5QrCode.stop().then(() => {
                    console.log('📹 Scanner stopped successfully');
                    this.html5QrCode.clear();
                }).catch(err => {
                    console.error('Error stopping scanner:', err);
                });
            }

            this.scannerActive = false;
            this.html5QrCode = null;

            const container = document.getElementById('scanner-container');
            const stopBtn = document.getElementById('stop-scanner');
            const startBtn = document.getElementById('start-scanner');
            const permissionMsg = document.getElementById('camera-permission');

            if (container) container.style.display = 'none';
            if (stopBtn) stopBtn.style.display = 'none';
            if (startBtn) {
                startBtn.style.display = 'inline-block';
                startBtn.disabled = false;
                startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';
            }
            if (permissionMsg) permissionMsg.style.display = 'block';

            this.showScannerStatus('Scanner dihentikan', 'info');
        }

        handleCameraError(err) {
            console.error('📹 Camera Error:', err);
            
            const errorMap = {
                'NotAllowedError': "Izin kamera ditolak. Silakan izinkan akses kamera di browser settings",
                'NotFoundError': "Kamera tidak ditemukan. Pastikan perangkat memiliki kamera belakang",
                'NotSupportedError': "Browser tidak mendukung akses kamera",
                'NotReadableError': "Kamera sedang digunakan aplikasi lain",
                'OverconstrainedError': "Kamera tidak mendukung mode yang diminta"
            };

            const errorMessage = errorMap[err.name] || `Error kamera: ${err.message}`;
            this.showErrorResult(errorMessage);
            this.showScannerStatus('❌ ' + errorMessage, 'danger');
        }

        handleManualVerification(event) {
            event.preventDefault();
            
            if (this.isProcessing) {
                this.showScannerStatus('⏳ Sedang memproses...', 'warning');
                return;
            }

            const scannerInput = document.getElementById('qr-code-input');
            const qrData = scannerInput.value.trim();

            if (!qrData) {
                this.showErrorResult('Silakan masukkan kode QR terlebih dahulu');
                this.focusScannerInput();
                return;
            }

            this.processQRCode(qrData, 'manual');
        }

        processQRCode(qrData, source = 'manual') {
            if (this.isProcessing) return;

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

        async verifyQRCode(qrData, source = 'manual') {
            if (this.isProcessing) return;

            this.isProcessing = true;
            const normalizedQrCode = qrData.trim().toUpperCase();

            this.showLoadingState();
            this.showScannerStatus('⏳ Memverifikasi QR Code...', 'info');

            try {
                const requestData = {
                    qr_code: normalizedQrCode,
                    source: source,
                    timestamp: Date.now()
                };

                console.log('📤 Sending verification request:', requestData);

                const response = await fetch('<?php echo e(route('admin.checkin')); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(requestData)
                });

                console.log('📥 Response status:', response.status);
                const data = await response.json();
                console.log('✅ Verification response:', data);

                if (!response.ok) {
                    throw new Error(data.message || `HTTP error! status: ${response.status}`);
                }

                this.handleVerificationResponse(data, normalizedQrCode, source);

            } catch (error) {
                console.error('❌ Verification Error:', error);
                this.failedScans++;
                this.updateStats();
                
                let userMessage = error.message || 'Terjadi kesalahan saat memverifikasi QR Code';
                if (error.message.includes('Failed to fetch')) {
                    userMessage = 'Koneksi internet terputus. Periksa koneksi Anda.';
                } else if (error.message.includes('Network')) {
                    userMessage = 'Masalah jaringan. Silakan coba lagi.';
                }
                
                this.showErrorResult(userMessage);
                this.showScannerStatus('❌ Error: ' + userMessage, 'danger');
            } finally {
                this.isProcessing = false;
                this.hideLoadingState();
                
                // Auto-restart scanner jika di tab scan
                if (source === 'camera') {
                    setTimeout(() => {
                        if (document.getElementById('scan-tab').classList.contains('active')) {
                            this.startFastScanner();
                        }
                    }, 1500);
                } else {
                    setTimeout(() => this.clearScannerInput(), 1500);
                }
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
                    this.showScannerStatus('✅ Check-in berhasil!', 'success');
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
                    
                    <div class="previous-checkin-info mt-3 p-3">
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

        retryScan() {
            this.hideAllResults();
            this.focusScannerInput();
        }

        showLoadingState() {
            const verifyBtn = document.querySelector('#manual-verification-form button[type="submit"]');
            if (verifyBtn) {
                verifyBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
                verifyBtn.disabled = true;
            }
        }

        hideLoadingState() {
            const verifyBtn = document.querySelector('#manual-verification-form button[type="submit"]');
            if (verifyBtn) {
                verifyBtn.innerHTML = '<i class="fas fa-check me-2"></i> Verifikasi & Check In';
                verifyBtn.disabled = false;
            }
        }

        clearScannerInput() {
            const scannerInput = document.getElementById('qr-code-input');
            if (scannerInput) {
                scannerInput.value = '';
                this.focusScannerInput();
            }
        }

        focusScannerInput() {
            const scannerInput = document.getElementById('qr-code-input');
            if (scannerInput) {
                scannerInput.focus();
                scannerInput.select();
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

    // Initialize FAST scanner
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🚀 Initializing SUPER FAST QR Scanner...');
        window.qrScanner = new FastQRScanner();
    });
    </script>
</body>
</html><?php /**PATH C:\ica_landingpage\resources\views\admin\scan-qr.blade.php ENDPATH**/ ?>