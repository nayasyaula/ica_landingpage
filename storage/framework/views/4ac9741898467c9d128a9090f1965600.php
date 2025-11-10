<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-ICA.png')); ?>">
    <title>QR Scanner - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>
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
            transition: all 0.3s ease;
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
            background: rgba(255, 152, 0, 0.1);
            border: 1px solid rgba(255, 152, 0, 0.3);
            color: white;
        }

        .alert-already-checked-in {
            background: rgba(255, 152, 0, 0.15);
            border: 1px solid rgba(255, 152, 0, 0.4);
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

        /* Style untuk info check-in sebelumnya */
        .previous-checkin-info {
            background: rgba(255, 152, 0, 0.05);
            border: 1px solid rgba(255, 152, 0, 0.2);
            border-radius: 6px;
            padding: 15px;
            margin-top: 10px;
        }

        .previous-checkin-info p {
            margin: 5px 0;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .previous-checkin-info strong {
            color: #FF9800;
            min-width: 100px;
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

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, .3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
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

        /* Scanner Container */
        #scanner-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            border: 2px solid rgba(212, 175, 55, 0.3);
        }

        #reader {
            position: relative;
            width: 100%;
            height: 300px;
            background: #000;
        }

        .scan-line {
            position: absolute;
            height: 2px;
            width: 100%;
            background: #D4AF37;
            top: 50%;
            animation: scanLine 2s linear infinite;
            z-index: 10;
        }

        @keyframes scanLine {

            0%,
            100% {
                top: 10%;
            }

            50% {
                top: 90%;
            }
        }

        /* Camera Video Styling */
        #camera-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        /* Input Field Styling */
        #scanner-input {
            color: #fff !important;
            background-color: #1a1a1a;
        }

        #scanner-input::placeholder {
            color: #bbb;
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

            #reader {
                height: 250px;
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

            .stat-card {
                margin-bottom: 10px;
            }

            #reader {
                height: 200px;
            }
        }
    </style>
</head>

<body class="antialiased">
    <!-- Admin Top Header -->
    <div class="admin-top-header">
        <div class="admin-header-content">
            <div class="admin-logo">
                <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="ICA Logo" class="admin-logo-img">
                <span class="admin-logo-text">Admin Dashboard</span>
            </div>
            <div class="admin-user-menu">
                <span class="admin-welcome">Welcome, Administrator</span>
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
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
                                    <button id="stop-scanner" class="btn btn-admin-secondary mt-3"
                                        style="display: none;">
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
    </main>

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
                    this.clearScannerInput();
                }
            }

            handleVerificationResponse(data, qrCode, source) {
                if (data.success === true) {
                    this.successfulScans++;
                    this.updateStats();

                    const participantData = data.data || {};

                    if (data.is_duplicate === true) {
                        this.showAlreadyCheckedInResult(participantData, data.message ||
                            'Peserta sudah check-in sebelumnya');
                        this.showScannerStatus('⚠ Peserta sudah check-in sebelumnya', 'warning');
                    } else {
                        this.showSuccessResult(participantData, data.message || 'Check-in berhasil!');
                        this.showScannerStatus('✅ Check-in berhasil! Scanner siap untuk scan berikutnya', 'success');
                    }

                    this.lastScanData = {
                        qrCode: qrCode,
                        name: participantData.nama || participantData.name || 'Tidak ada nama',
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

            getCurrentJakartaShortDate() {
                const now = new Date();
                return now.toLocaleDateString('id-ID', {
                    timeZone: 'Asia/Jakarta',
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
            }

            showAlreadyCheckedInResult(data, message) {
                if (!data) data = {};

                const waktuSekarang = this.getCurrentJakartaTime();
                const tanggalSekarang = this.getCurrentJakartaDate();

                // Format waktu check-in sebelumnya
                let previousCheckinTime = 'Tidak diketahui';
                let previousCheckinDate = 'Tidak diketahui';
                let checkedInBy = data.checked_in_by || 'Tidak diketahui';

                if (message && typeof message === 'string') {
                    const dateMatch = message.match(/pada:\s*(\d{2}\/\d{2}\/\d{4})\s*(\d{2}:\d{2})/i);
                    const byMatch = message.match(/oleh:\s*(.+)$/i);

                    if (dateMatch) {
                        const [day, month, year] = dateMatch[1].split('/');
                        const time = dateMatch[2];

                        // Format tanggal ke Indonesia
                        const checkinDate = new Date(`${year}-${month}-${day}`);
                        previousCheckinDate = checkinDate.toLocaleDateString('id-ID', {
                            timeZone: 'Asia/Jakarta',
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });

                        // Format waktu
                        previousCheckinTime = `${time}`;
                    }

                    if (byMatch && !data.checked_in_by) {
                        checkedInBy = byMatch[1].trim();
                    }
                }

                else if (data.checked_in_at) {
                    const checkinDate = new Date(data.checked_in_at);
                    previousCheckinTime = checkinDate.toLocaleTimeString('id-ID', {
                        timeZone: 'Asia/Jakarta',
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });

                    previousCheckinDate = checkinDate.toLocaleDateString('id-ID', {
                        timeZone: 'Asia/Jakarta',
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                } else if (data.waktu_checkin) {
                    previousCheckinTime = data.waktu_checkin;
                    const today = new Date();
                    previousCheckinDate = today.toLocaleDateString('id-ID', {
                        timeZone: 'Asia/Jakarta',
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                }

                const infoHTML = `
                    <div class="participant-details">
                        <p><strong>No. Tiket:</strong> ${data.kode || data.qr_code || 'Tidak ada'}</p>
                        <p><strong>Nama:</strong> ${data.nama || data.name || 'Tidak ada'}</p>
                        <p><strong>Email:</strong> ${data.email || 'Tidak ada'}</p>
                        <p><strong>Posisi/Jabatan:</strong> ${data.position || 'Tidak ada'}</p>
                        <p><strong>Telepon:</strong> ${data.telepon || data.phone || '-'}</p>
                        <p><strong>Status:</strong> <span style="color: #ff9800; font-weight: bold;">⚠ SUDAH CHECK-IN SEBELUMNYA</span></p>
                        
                        <div class="previous-checkin-info">
                            <p style="color: #ff9800; font-weight: bold; margin-bottom: 10px;">
                                <i class="fas fa-exclamation-triangle me-2"></i>INFORMASI CHECK-IN SEBELUMNYA:
                            </p>
                            <p><strong>Waktu Check-in:</strong> ${previousCheckinTime} WIB</p>
                            <p><strong>Tanggal Check-in:</strong> ${previousCheckinDate}</p>
                            <p><strong>Checked-in oleh:</strong> ${checkedInBy}</p>
                            <p><strong>Waktu Pengecekan:</strong> ${waktuSekarang} WIB</p>
                            <p><strong>Tanggal Pengecekan:</strong> ${tanggalSekarang}</p>
                        </div>
                    </div>             
                `;
                // Sembunyikan semua result terlebih dahulu
                this.hideAllResults();

                // Tampilkan alert already checked-in
                const alreadyCheckedInInfo = document.getElementById('already-checked-in-info');
                const alreadyCheckedInResult = document.getElementById('already-checked-in-result');
                const resultContainer = document.getElementById('result-container');

                if (alreadyCheckedInInfo) alreadyCheckedInInfo.innerHTML = infoHTML;
                if (alreadyCheckedInResult) alreadyCheckedInResult.style.display = 'block';
                if (resultContainer) resultContainer.style.display = 'block';

                // Auto hide setelah 10 detik (lebih lama karena info penting)
                setTimeout(() => {
                    if (resultContainer && resultContainer.style.display !== 'none') {
                        resultContainer.style.display = 'none';
                    }
                }, 10000);
            }

            // Method untuk menyembunyikan semua result
            hideAllResults() {
                const successResult = document.getElementById('success-result');
                const errorResult = document.getElementById('error-result');
                const alreadyCheckedInResult = document.getElementById('already-checked-in-result');
                const resultContainer = document.getElementById('result-container');

                if (successResult) successResult.style.display = 'none';
                if (errorResult) errorResult.style.display = 'none';
                if (alreadyCheckedInResult) alreadyCheckedInResult.style.display = 'none';
                if (resultContainer) resultContainer.style.display = 'none';
            }

            showSuccessResult(data, message) {
                if (!data) data = {};

                const waktuReal = this.getCurrentJakartaTime();
                const tanggalReal = this.getCurrentJakartaDate();

                const infoHTML = `
                <div class="participant-details check-in-success">
                    <p><strong>No. Tiket:</strong> ${data.kode || data.qr_code || 'Tidak ada'}</p>
                    <p><strong>Nama:</strong> ${data.nama || data.name || 'Tidak ada'}</p>
                    <p><strong>Email:</strong> ${data.email || 'Tidak ada'}</p>
                    <p><strong>Posisi/Jabatan:</strong> ${data.position || 'Tidak ada'}</p>
                    <p><strong>Telepon:</strong> ${data.telepon || data.phone || '-'}</p>
                    <p><strong>Status:</strong> <span style="color: #28a745;">✓ CHECK-IN BERHASIL</span></p>
                    <p><strong>Waktu Check-in:</strong> ${waktuReal} WIB</p>
                    <p><strong>Tanggal Check-in:</strong> ${tanggalReal}</p>
                    <p><strong>Checked-in oleh:</strong> ${data.checked_in_by || 'System'}</p>
                    <p><strong>Metode Check-in:</strong> ${data.checkin_method || 'QR Scanner'}</p>
                </div>
            `;

                // Sembunyikan semua result terlebih dahulu
                this.hideAllResults();

                const participantInfo = document.getElementById('participant-info');
                const successResult = document.getElementById('success-result');
                const resultContainer = document.getElementById('result-container');

                if (participantInfo) participantInfo.innerHTML = infoHTML;
                if (successResult) successResult.style.display = 'block';
                if (resultContainer) resultContainer.style.display = 'block';

                // Auto hide success after 5 seconds
                setTimeout(() => {
                    if (resultContainer && resultContainer.style.display !== 'none') {
                        resultContainer.style.display = 'none';
                    }
                }, 5000);
            }

            showErrorResult(message) {
                // Sembunyikan semua result terlebih dahulu
                this.hideAllResults();

                const errorMessageEl = document.getElementById('error-message');
                const errorResult = document.getElementById('error-result');
                const resultContainer = document.getElementById('result-container');

                if (errorMessageEl) errorMessageEl.innerHTML = message;
                if (errorResult) errorResult.style.display = 'block';
                if (resultContainer) resultContainer.style.display = 'block';

                // Add retry button
                this.addRetryButton();

                // Auto hide error after 8 seconds
                setTimeout(() => {
                    if (resultContainer && resultContainer.style.display !== 'none') {
                        resultContainer.style.display = 'none';
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
                    startBtn.innerHTML = '<span class="loading-spinner"></span> Membuka Kamera...';
                    startBtn.disabled = true;
                }

                try {
                    if (permissionMsg) permissionMsg.style.display = 'none';

                    const constraints = {
                        video: {
                            facingMode: "environment",
                            width: {
                                min: 320,
                                ideal: 1280,
                                max: 1920
                            },
                            height: {
                                min: 240,
                                ideal: 720,
                                max: 1080
                            },
                            aspectRatio: {
                                ideal: 4 / 3
                            }
                        },
                        audio: false
                    };

                    this.videoStream = await navigator.mediaDevices.getUserMedia(constraints);
                    console.log('Camera access granted');

                    await this.setupVideoStream();

                    // Update UI
                    if (startBtn) startBtn.style.display = 'none';
                    if (container) container.style.display = 'block';
                    if (stopBtn) stopBtn.style.display = 'block';
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

                // Wait for video to be ready
                await new Promise((resolve) => {
                    video.addEventListener('loadeddata', resolve, {
                        once: true
                    });
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

                            // Use jsQR library
                            if (typeof jsQR !== 'undefined') {
                                const code = jsQR(imageData.data, imageData.width, imageData.height, {
                                    inversionAttempts: "dontInvert",
                                });

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
                    if (scannerInput) {
                        scannerInput.value = '';
                        scannerInput.classList.remove('scanner-input-active');
                        this.focusScannerInput();
                    }
                }, 100);
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
    </script>
</body>

</html>
<?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/admin/scan-qr.blade.php ENDPATH**/ ?>