<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-ICA.png') }}">
    <title>QR Scanner - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gold: #D4AF37;
            --dark-gold: #B8860B;
            --light-gold: #F5E8C8;
            --black: #0A0A0A;
            --dark-gray: #1A1A1A;
            --medium-gray: #2A2A2A;
        }

        body {
            font-family: 'Montserrat', serif;
            background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
            color: #fff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Montserrat', serif;
            font-weight: 600;
        }

        /* Admin Header */
        .admin-top-header {
            background: linear-gradient(135deg, #1A1A1A, #2A2A2A);
            border-bottom: 2px solid #D4AF37;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .admin-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .admin-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-logo-img {
            height: 40px;
            width: auto;
            filter: brightness(1.1) saturate(1.2) sepia(0.3) hue-rotate(-5deg);
        }

        .admin-logo-text {
            font-family: 'Montserrat', serif;
            font-size: 1.3rem;
            color: #D4AF37;
            font-weight: 700;
        }

        .admin-user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-welcome {
            color: rgba(255, 255, 255, 0.8);
            font-family: 'Montserrat', serif;
            font-size: 1rem;
        }

        .btn-admin-logout {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Montserrat', serif;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-admin-logout:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: #D4AF37;
            color: #F5E8C8;
            transform: translateY(-1px);
        }

        /* Main content spacing for fixed header */
        .admin-main-content {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
            padding: 20px 0;
        }

        /* Container */
        .admin-dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
        }

        /* Back Button */
        .back-button {
            position: absolute;
            top: 0;
            left: 20px;
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 10px 16px;
            font-family: 'Montserrat', serif;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .back-button:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: #D4AF37;
            color: #F5E8C8;
            transform: translateY(-1px);
            text-decoration: none;
        }

        /* Header */
        .admin-header {
            text-align: center;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-title {
            font-family: 'Montserrat', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #D4AF37;
            margin-bottom: 0.5rem;
            letter-spacing: 0.3px;
        }

        .admin-subtitle {
            font-family: 'Montserrat', serif;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* Card Styling */
        .admin-table-card {
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            max-width: 800px;
        }

        .card-header-luxury {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 20px 25px;
        }

        .card-title-luxury {
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 1.3rem;
            color: #D4AF37;
            margin: 0;
        }

        .card-body-luxury {
            padding: 30px;
        }

        /* Button Styles */
        .btn-admin-primary,
        .btn-admin-secondary {
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-family: 'Montserrat', serif;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            touch-action: manipulation;
            -webkit-tap-highlight-color: transparent;
        }

        .btn-admin-primary {
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            color: #1A1A1A;
        }

        .btn-admin-primary:hover {
            background: linear-gradient(135deg, #B8860B, #D4AF37);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #1A1A1A;
        }

        .btn-admin-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-admin-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #D4AF37;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 8px;
            color: white;
            font-family: 'Montserrat', serif;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-align: center;
        }

        .form-control:focus {
            outline: none;
            border-color: #D4AF37;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Scanner Input Focus Effect */
        .scanner-input-active {
            border-color: #D4AF37 !important;
            background: rgba(212, 175, 55, 0.1) !important;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4) !important;
            transform: scale(1.02);
        }

        /* Input Group Styles */
        .input-group {
            position: relative;
            display: flex;
            align-items: stretch;
            width: 100%;
        }

        .input-group .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            flex: 1 1 auto;
            width: 1%;
            min-width: 0;
        }

        .input-group .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            margin-left: -1px;
            position: relative;
            z-index: 2;
            white-space: nowrap;
        }

        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
            max-width: 500px;
            margin: 0 auto;
            padding: 15px 20px;
        }

        .alert-info {
            background: rgba(23, 162, 184, 0.1);
            border: 1px solid rgba(23, 162, 184, 0.3);
            color: white;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: white;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: white;
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.1);
            border: 1px solid rgba(255, 193, 7, 0.3);
            color: white;
        }

        /* Participant Details */
        .participant-details {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 20px;
            margin-top: 15px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .participant-details p {
            margin: 10px 0;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        .participant-details strong {
            color: #D4AF37;
            min-width: 120px;
            display: inline-block;
        }

        /* Scanner Status */
        .scanner-status-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        /* Success Check-in Animation */
        @keyframes checkInSuccess {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .check-in-success {
            animation: checkInSuccess 0.5s ease-in-out;
        }

        /* Stats Cards */
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 15px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        /* Icon Fixes */
        .fa,
        .fas,
        .far,
        .fal,
        .fab {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        }

        .btn i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {

            .btn-admin-primary,
            .btn-admin-secondary {
                padding: 12px 20px;
                font-size: 16px;
            }

            .participant-details p {
                font-size: 0.9rem;
            }

            .participant-details strong {
                min-width: 100px;
            }

            .form-control {
                padding: 12px;
                font-size: 1rem;
            }

            .input-group {
                flex-direction: column;
            }

            .input-group .form-control {
                border-radius: 8px;
                margin-bottom: 10px;
            }

            .input-group .btn {
                border-radius: 8px;
                margin-left: 0;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-header-content {
                padding: 0 15px;
            }

            .admin-logo-text {
                font-size: 1.1rem;
            }

            .admin-welcome {
                display: none;
            }

            .admin-title {
                font-size: 1.6rem;
            }

            .back-button {
                position: relative;
                left: 0;
                margin-bottom: 20px;
            }

            .admin-dashboard-container {
                padding: 0 15px;
            }

            .card-body-luxury {
                padding: 20px;
            }
        }

        #scanner-input {
            color: #fff !important;
            background-color: #1a1a1a;
        }

        #scanner-input::placeholder {
            color: #bbb;
        }

        @media (max-width: 576px) {
            .admin-top-header {
                padding: 12px 0;
            }

            .admin-main-content {
                margin-top: 70px;
            }

            .admin-logo-text {
                font-size: 1rem;
            }

            .admin-logo-img {
                height: 35px;
            }

            .admin-title {
                font-size: 1.4rem;
            }

            .btn-admin-primary,
            .btn-admin-secondary {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .form-control {
                padding: 10px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body class="antialiased">
    <!-- Admin Top Header -->
    <div class="admin-top-header">
        <div class="admin-header-content">
            <div class="admin-logo">
                <img src="{{ asset('images/logo-ICA.png') }}" alt="ICA Logo" class="admin-logo-img">
                <span class="admin-logo-text">Admin Dashboard</span>
            </div>
            <div class="admin-user-menu">
                <span class="admin-welcome">Welcome, Administrator</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-admin-logout">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="admin-main-content">
        <div class="admin-dashboard-container">
            <!-- Tombol Kembali -->
            <a href="{{ route('admin.dashboard') }}" class="back-button">
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

                            <!-- Scanner Input Area -->
                            <div class="text-center mb-4">
                                <div class="form-group">
                                    <label for="scanner-input" class="form-label">
                                        <i class="fas fa-barcode me-2"></i>SCAN ATAU INPUT KODE TIKET
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="qr_code" id="scanner-input"
                                            class="form-control form-control-lg"
                                            placeholder="SCAN QR CODE ATAU KETIK MANUAL (ICA-XXX-XXXX)" required
                                            autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                                            autofocus>
                                        <button type="button" class="btn-admin-primary" id="verify-btn">
                                            <i class="fas fa-search me-2"></i>Verifikasi
                                        </button>
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
                                <div class="alert alert-success" id="success-result">
                                    <h5><i class="fas fa-check-circle me-2"></i>Check-in Berhasil!</h5>
                                    <div id="participant-info"></div>
                                </div>
                                <div class="alert alert-danger" id="error-result" style="display: none;">
                                    <h5><i class="fas fa-times-circle me-2"></i>Check-in Gagal</h5>
                                    <p id="error-message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let lastKeyTime = 0;
        let scannerBuffer = '';
        let totalScans = 0;
        let successfulScans = 0;
        let failedScans = 0;
        let lastScanData = null;
        let isManualInput = false;

        // ✅ FUNCTION VALIDASI FORMAT ICA
        function validateICAQrFormat(qrData) {
            // Format ICA: ICA-XXX-XXXX (case insensitive)
            const icaPattern = /^ICA-[A-Z0-9]{3}-[A-Z0-9]{4,}$/i;
            return icaPattern.test(qrData.trim());
        }

        // ✅ HARDWARE SCANNER DETECTION (ScanLogic CS-700)
        document.addEventListener('keydown', function(event) {
            const scannerInput = document.getElementById('scanner-input');
            const now = Date.now();
            const timeSinceLastKey = now - lastKeyTime;

            // Reset buffer jika waktu antara input terlalu lama
            if (timeSinceLastKey > 100) {
                scannerBuffer = '';
                isManualInput = false;
            }

            lastKeyTime = now;

            // Handle Enter key (end of scan)
            if (event.key === 'Enter' && scannerBuffer.length > 0) {
                event.preventDefault();

                console.log('🔍 HARDWARE SCANNER DETECTED:', scannerBuffer);

                const processedCode = scannerBuffer.trim().toUpperCase();
                totalScans++;
                updateStats();

                // Validasi format ICA
                if (validateICAQrFormat(processedCode)) {
                    showScannerStatus('✅ QR Code ICA terdeteksi: ' + processedCode, 'success');
                    scannerInput.classList.add('scanner-input-active');
                    verifyQRCode(processedCode, 'hardware');
                } else {
                    // Jika bukan format ICA, tampilkan error jelas
                    failedScans++;
                    updateStats();
                    showErrorResult('❌ Format tidak valid: <strong>' + processedCode + '</strong><br>❌ Ini adalah <strong>barcode produk</strong>, bukan QR Code ICA!<br>✅ Silakan scan <strong>QR Code ICA</strong> dengan format: <strong>ICA-XXX-XXXX</strong>');
                    scannerInput.classList.add('scanner-input-active');
                }

                scannerBuffer = '';
                // Clear input field
                setTimeout(() => {
                    scannerInput.value = '';
                    scannerInput.classList.remove('scanner-input-active');
                    scannerInput.focus();
                }, 100);
                return;
            }

            // Accumulate characters (kecuali modifier keys)
            if (event.key.length === 1 && !event.ctrlKey && !event.altKey && !event.metaKey) {
                scannerBuffer += event.key;
                // Jika user mengetik manual, set flag
                if (!isManualInput && scannerBuffer.length > 2) {
                    isManualInput = true;
                }
            }
        });

        // Manual Verify Button
        document.getElementById('verify-btn').addEventListener('click', function() {
            const scannerInput = document.getElementById('scanner-input');
            const qrData = scannerInput.value.trim();

            if (!qrData) {
                showErrorResult('Silakan masukkan atau scan kode QR terlebih dahulu');
                scannerInput.focus();
                return;
            }

            // Untuk input manual, langsung ambil dari value input, bukan dari buffer
            processQRCode(qrData, 'manual');
        });

        // Enter key support untuk input manual
        document.getElementById('scanner-input').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                // Untuk Enter, gunakan value dari input field langsung
                const qrData = this.value.trim();

                if (!qrData) {
                    showErrorResult('Silakan masukkan atau scan kode QR terlebih dahulu');
                    this.focus();
                    return;
                }

                // Jika ada data di buffer, kemungkinan hardware scanner
                if (scannerBuffer.length > 0 && !isManualInput) {
                    // Biarkan event keydown yang handle hardware scanner
                    return;
                }

                // Jika manual input, proses langsung
                processQRCode(qrData, 'manual');
            }
        });

        // Process QR Code
        function processQRCode(qrData, source) {
            const normalizedQrCode = qrData.trim().toUpperCase();
            totalScans++;
            updateStats();

            // Validasi format ICA
            if (!validateICAQrFormat(normalizedQrCode)) {
                failedScans++;
                updateStats();
                showErrorResult('❌ Format QR Code tidak valid: "' + normalizedQrCode + '"<br><strong>Format yang diharapkan: ICA-XXX-XXXX</strong><br>Contoh: <strong>ICA-ABC-1234</strong>');
                return;
            }

            showScannerStatus('✅ QR Code ICA terdeteksi: ' + normalizedQrCode, 'success');
            verifyQRCode(normalizedQrCode, source);
        }

        // Auto-focus ke input scanner
        document.addEventListener('DOMContentLoaded', function() {
            const scannerInput = document.getElementById('scanner-input');
            if (scannerInput) {
                scannerInput.focus();

                // Click to focus
                scannerInput.addEventListener('click', function() {
                    this.focus();
                });
            }
        });

        // Update statistics
        function updateStats() {
            document.getElementById('total-scans').textContent = totalScans;
            document.getElementById('successful-scans').textContent = successfulScans;
            document.getElementById('failed-scans').textContent = failedScans;
        }

        // Scanner Status Functions
        function showScannerStatus(message, type = 'info') {
            const statusEl = document.getElementById('scanner-status');
            const statusText = document.getElementById('scanner-status-text');

            if (!statusEl) return;

            statusText.innerHTML = message;
            statusEl.className = 'alert alert-' + type + ' mb-4 scanner-status-pulse';
            statusEl.style.display = 'block';
        }

        function showErrorResult(message) {
            document.getElementById('error-message').innerHTML = message;
            document.getElementById('success-result').style.display = 'none';
            document.getElementById('error-result').style.display = 'block';
            document.getElementById('result-container').style.display = 'block';

            document.getElementById('scanner-input').value = '';
            document.getElementById('scanner-input').focus();
        }

        function verifyQRCode(qrData, source = 'hardware') {
            if (!qrData || qrData.trim() === '') {
                showErrorResult('QR Code tidak valid atau kosong');
                return;
            }

            const normalizedQrCode = qrData.trim().toUpperCase();

            // ✅ VALIDASI FORMAT ICA
            if (!validateICAQrFormat(normalizedQrCode)) {
                failedScans++;
                updateStats();
                showErrorResult('❌ Format QR Code tidak valid: "' + normalizedQrCode + '"<br><strong>Format yang diharapkan: ICA-XXX-XXXX</strong><br>Contoh: <strong>ICA-ABC-1234</strong>');
                return;
            }

            // ✅ PERBAIKAN: Tampilkan loading state yang BENAR (bukan error)
            document.getElementById('result-container').style.display = 'block';
            document.getElementById('success-result').style.display = 'none';
            document.getElementById('error-result').style.display = 'none'; // Sembunyikan keduanya dulu

            // Tampilkan status loading di scanner status
            showScannerStatus('⏳ Memverifikasi QR Code...', 'info');

            const requestData = {
                qr_code: normalizedQrCode,
                source: source
            };

            console.log('Sending request:', requestData);

            fetch('{{ route('admin.checkin') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(requestData)
                })
                .then(async response => {
                    console.log('Response status:', response.status);
                    const data = await response.json();
                    console.log('Response data:', data);

                    if (!response.ok) {
                        throw new Error(data.message || 'HTTP error! status: ' + response.status);
                    }
                    return data;
                })
                .then(data => {
                    console.log('Processing data:', data);

                    // ✅ PERBAIKAN: Handle response dengan benar
                    if (data.success === true) {
                        successfulScans++;
                        updateStats();

                        const participantData = data.data || {};

                        // Handle duplicate check-in
                        if (data.is_duplicate === true) {
                            showSuccessResult(participantData, data.message || 'Peserta sudah check-in sebelumnya');
                            showScannerStatus('⚠ Peserta sudah check-in sebelumnya', 'warning');
                        }
                        // Handle successful check-in
                        else {
                            showSuccessResult(participantData, data.message || 'Check-in berhasil!');
                            showScannerStatus('✅ Check-in berhasil! Scanner siap untuk scan berikutnya', 'success');
                        }

                        // Simpan data scan terakhir
                        lastScanData = {
                            qrCode: normalizedQrCode,
                            name: participantData.nama || participantData.name || 'Tidak ada nama',
                            time: new Date().toLocaleTimeString('id-ID'),
                            method: source
                        };

                    } else {
                        // Handle case where success = false
                        failedScans++;
                        updateStats();
                        showErrorResult(data.message || 'Verifikasi gagal');
                        showScannerStatus('❌ Check-in gagal', 'danger');
                    }
                })
                .catch(err => {
                    console.error('Fetch Error:', err);
                    failedScans++;
                    updateStats();
                    showErrorResult(err.message || 'Terjadi kesalahan saat memverifikasi QR Code');
                    showScannerStatus('❌ Error: ' + err.message, 'danger');
                });
        }

        // ✅ PERBAIKAN: Fungsi showSuccessResult TANPA auto-hide
        function showSuccessResult(data, message) {
            if (!data) {
                data = {};
            }

            // ✅ PERBAIKAN: SELALU gunakan waktu BROWSER (seperti last scan), jangan waktu server
            const now = new Date();
            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');
            const detik = String(now.getSeconds()).padStart(2, '0');
            const waktuReal = jam + ':' + menit + ':' + detik;

            const info = '<div class="participant-details check-in-success">' +
                '<p><strong>No. Tiket:</strong> ' + (data.kode || data.qr_code || 'Tidak ada') + '</p>' +
                '<p><strong>Nama:</strong> ' + (data.nama || data.name || 'Tidak ada') + '</p>' +
                '<p><strong>Email:</strong> ' + (data.email || 'Tidak ada') + '</p>' +
                '<p><strong>Posisi/Jabatan:</strong> ' + (data.position || 'Tidak ada') + '</p>' +
                '<p><strong>Event:</strong> ' + (data.event || 'Tidak ada') + '</p>' +
                '<p><strong>Telepon:</strong> ' + (data.telepon || data.phone || '-') + '</p>' +
                '<p><strong>Status:</strong> <span style="color: #28a745;">✓ SUDAH CHECK-IN</span></p>' +
                '<p><strong>Waktu Check-in:</strong> ' + waktuReal + '</p>' +
                '<p><strong>Checked-in oleh:</strong> ' + (data.checked_in_by || 'System') + '</p>' +
                (message ? '<p><strong>Pesan:</strong> ' + message + '</p>' : '') +
                '</div>';

            document.getElementById('participant-info').innerHTML = info;
            document.getElementById('success-result').style.display = 'block';
            document.getElementById('error-result').style.display = 'none';
            document.getElementById('result-container').style.display = 'block';

            document.getElementById('scanner-input').value = '';
            document.getElementById('scanner-input').focus();
        }

        // Initial scanner status
        showScannerStatus('Scanner siap - Gunakan hardware scanner atau input manual', 'info');

        // Focus management
        document.addEventListener('click', function() {
            document.getElementById('scanner-input').focus();
        });
    </script>
</body>

</html>