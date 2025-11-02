<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-ICA.png')); ?>">
    <title>QR Scanner - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
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
            font-family: 'Cormorant Garamond', serif;
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
            font-family: 'Cinzel', serif;
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
            font-family: 'Cinzel', serif;
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
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
        }

        .btn-admin-logout {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Cinzel', serif;
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
            font-family: 'Cinzel', serif;
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
            font-family: 'Cinzel', serif;
            font-weight: 700;
            font-size: 2rem;
            color: #D4AF37;
            margin-bottom: 0.5rem;
            letter-spacing: 0.3px;
        }

        .admin-subtitle {
            font-family: 'Cormorant Garamond', serif;
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
            font-family: 'Cinzel', serif;
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
            font-family: 'Cinzel', serif;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            /* Minimum touch target size untuk mobile */
            touch-action: manipulation;
            /* Improve touch responsiveness */
            -webkit-tap-highlight-color: transparent;
            /* Remove blue tap highlight on iOS */
        }

        #start-scanner,
        #stop-scanner {
            min-height: 44px;
            /* Minimum touch target size untuk mobile */
            touch-action: manipulation;
            /* Improve touch responsiveness */
            -webkit-tap-highlight-color: transparent;
            /* Remove blue tap highlight on iOS */
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
            font-family: 'Cinzel', serif;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            color: white;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #D4AF37;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* Loading spinner */
        .fa-spinner {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Better button states for mobile */
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Improve scanner container for mobile */
        #scanner-container {
            position: relative;
            margin: 20px 0;
            min-height: 300px;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }

        /* Scanner Area */
        #scanner-container {
            position: relative;
            margin: 20px 0;
            min-height: 300px;
            /* Ensure enough space for scanner */

        }

        #reader {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(212, 175, 55, 0.3);
            background: #000;
            /* Fallback background */
            aspect-ratio: 4/3;
            /* Maintain aspect ratio */
        }

        #reader video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensure video fills container */
            border-radius: 10px;
        }

        /* Scan Line Effect */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, transparent, #D4AF37, transparent);
            animation: scan 2.5s infinite linear;
            border-radius: 2px;
            z-index: 10;
        }

        @keyframes scan {
            0% {
                top: 0;
            }

            50% {
                top: calc(100% - 3px);
            }

            100% {
                top: 0;
            }
        }

        /* Tab Styles */
        .verification-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .tab-button {
            background: none;
            border: none;
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.7);
            font-family: 'Cinzel', serif;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }

        .tab-button.active {
            color: #D4AF37;
            border-bottom-color: #D4AF37;
        }

        .tab-button:hover {
            color: #D4AF37;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
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

        /* Participant Details */
        .participant-details {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }

        .participant-details p {
            margin: 8px 0;
            color: rgba(255, 255, 255, 0.9);
        }

        .participant-details strong {
            color: #D4AF37;
        }

        @media (max-width: 768px) {

            .btn-admin-primary,
            .btn-admin-secondary {
                padding: 12px 20px;
                font-size: 16px;
                /* Prevent zoom on iOS */
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

            #reader {
                max-width: 100%;
            }

            .verification-tabs {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .tab-button {
                width: 100%;
                max-width: 250px;
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
                <p class="admin-subtitle">Verifikasi peserta dengan scan QR Code atau input manual</p>
            </div>

            <!-- Kartu Scanner -->
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="admin-table-card">
                        <div class="card-header-luxury text-center">
                            <h5 class="card-title-luxury">
                                <i class="fas fa-check-circle me-2"></i>Verifikasi Peserta
                            </h5>
                        </div>

                        <div class="card-body-luxury">
                            <!-- Tabs untuk pilihan verifikasi -->
                            <div class="verification-tabs">
                                <button class="tab-button active" data-tab="scan-tab">
                                    <i class="fas fa-camera me-2"></i>Scan QR Code
                                </button>
                                <button class="tab-button" data-tab="manual-tab">
                                    <i class="fas fa-keyboard me-2"></i>Input Manual
                                </button>
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

                            <!-- Tab Input Manual -->
                            <div id="manual-tab" class="tab-content">
                                <form id="manual-verification-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="qr-code-input">Kode QR Tiket</label>
                                        <input type="text" name="qr_code" id="qr-code-input" class="form-control"
                                            placeholder="Masukkan kode QR (contoh: ICA-XXXXX-XXXXX)" required>
                                    </div>
                                    <button type="submit" class="btn btn-admin-primary w-100 mt-2">
                                        <i class="fas fa-check me-2"></i> Verifikasi & Check In
                                    </button>
                                </form>
                            </div>

                            <!-- Hasil Scan/Verifikasi -->
                            <div id="result-container" class="mt-4" style="display: none;">
                                <div class="alert alert-success" id="success-result">
                                    <h5><i class="fas fa-check-circle me-2"></i>QR Code Valid!</h5>
                                    <div id="participant-info"></div>
                                </div>
                                <div class="alert alert-danger" id="error-result" style="display: none;">
                                    <h5><i class="fas fa-times-circle me-2"></i>QR Code Tidak Valid</h5>
                                    <p id="error-message"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>

    <script>
        let scannerActive = false;
        let videoStream = null;
        let scanAnimationFrame = null;

        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function () {
                // Remove active class from all tabs
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');

                // Stop scanner if switching to manual tab
                if (tabId === 'manual-tab') {
                    stopCameraScanner();
                }
            });
        });

        // Scanner functionality - tambahkan touch event untuk mobile
        document.getElementById('start-scanner').addEventListener('click', startCameraScanner);
        document.getElementById('start-scanner').addEventListener('touchend', startCameraScanner); // untuk touch devices
        document.getElementById('stop-scanner').addEventListener('click', stopCameraScanner);
        document.getElementById('stop-scanner').addEventListener('touchend', stopCameraScanner); // untuk touch devices

        // Manual verification form
        document.getElementById('manual-verification-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const qrCode = document.getElementById('qr-code-input').value.trim();
            if (qrCode) {
                verifyQRCode(qrCode);
            }
        });

        async function startCameraScanner() {
            console.log('Starting camera scanner...');

            const container = document.getElementById('scanner-container');
            const startBtn = document.getElementById('start-scanner');
            const stopBtn = document.getElementById('stop-scanner');
            const permissionMsg = document.getElementById('camera-permission');

            // Show loading state
            startBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Membuka Kamera...';
            startBtn.disabled = true;

            try {
                permissionMsg.style.display = 'none';

                // Konfigurasi kamera untuk mobile
                const constraints = {
                    video: {
                        facingMode: "environment",
                        width: { min: 320, ideal: 1280, max: 1920 },
                        height: { min: 240, ideal: 720, max: 1080 },
                        aspectRatio: { ideal: 4 / 3 }
                    },
                    audio: false
                };

                videoStream = await navigator.mediaDevices.getUserMedia(constraints);
                console.log('Camera access granted');

                const video = document.createElement('video');
                video.srcObject = videoStream;
                video.setAttribute("playsinline", true); // Critical for iOS
                video.setAttribute("autoplay", true);
                video.setAttribute("muted", true);
                video.style.width = "100%";
                video.style.height = "100%";
                video.style.objectFit = "cover";

                const reader = document.getElementById('reader');
                reader.innerHTML = '<div class="scan-line"></div>';
                reader.appendChild(video);

                // Tunggu video ready
                await new Promise((resolve) => {
                    video.addEventListener('loadeddata', resolve, { once: true });
                });

                // Play video
                await video.play();

                // Update UI
                startBtn.style.display = 'none';
                container.style.display = 'block';
                stopBtn.style.display = 'block';
                startBtn.disabled = false;
                startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';

                // Start QR scanning
                startQRScanning(video);

            } catch (err) {
                console.error("Camera error:", err);
                handleCameraError(err);
                startBtn.disabled = false;
                startBtn.innerHTML = '<i class="fas fa-camera me-2"></i>Mulai Scanner Kamera';
            }
        }

        function startQRScanning(video) {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            scannerActive = true;

            function scanFrame() {
                if (!scannerActive) return;

                try {
                    if (video.readyState === video.HAVE_ENOUGH_DATA) {
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height);

                        if (code) {
                            console.log('QR Code detected:', code.data);
                            verifyQRCode(code.data);
                            stopCameraScanner();
                            return;
                        }
                    }

                    scanAnimationFrame = requestAnimationFrame(scanFrame);
                } catch (error) {
                    console.error('Scanning error:', error);
                    scanAnimationFrame = requestAnimationFrame(scanFrame);
                }
            }

            scanAnimationFrame = requestAnimationFrame(scanFrame);
        }

        function stopCameraScanner() {
            console.log('Stopping camera scanner...');
            scannerActive = false;

            if (scanAnimationFrame) {
                cancelAnimationFrame(scanAnimationFrame);
                scanAnimationFrame = null;
            }

            if (videoStream) {
                videoStream.getTracks().forEach(track => {
                    track.stop();
                });
                videoStream = null;
            }

            document.getElementById('scanner-container').style.display = 'none';
            document.getElementById('stop-scanner').style.display = 'none';
            document.getElementById('start-scanner').style.display = 'block';
            document.getElementById('camera-permission').style.display = 'block';
        }

        function handleCameraError(err) {
            let errorMessage = "Tidak dapat mengakses kamera: ";

            if (err.name === 'NotAllowedError' || err.name === 'PermissionDeniedError') {
                errorMessage = "Izin kamera ditolak. Silakan: \n\n1. Izinkan akses kamera di browser Anda\n2. Pastikan website menggunakan HTTPS\n3. Refresh halaman dan coba lagi";
            } else if (err.name === 'NotFoundError' || err.name === 'DevicesNotFoundError') {
                errorMessage = "Kamera tidak ditemukan. Pastikan perangkat memiliki kamera belakang.";
            } else if (err.name === 'NotSupportedError') {
                errorMessage = "Browser tidak mendukung akses kamera. Gunakan Chrome, Firefox, atau Safari versi terbaru.";
            } else if (err.name === 'NotReadableError' || err.name === 'TrackStartError') {
                errorMessage = "Kamera sedang digunakan oleh aplikasi lain. Tutup aplikasi lain yang menggunakan kamera.";
            } else if (err.name === 'OverconstrainedError') {
                errorMessage = "Kamera tidak mendukung mode yang diminta. Coba gunakan browser lain.";
            } else {
                errorMessage += err.message;
            }

            showErrorResult(errorMessage);
        }

        function verifyQRCode(qrData) {
            if (!qrData || qrData.trim() === '') {
                showErrorResult('QR Code tidak valid atau kosong');
                return;
            }

            // Show loading state
            document.getElementById('result-container').style.display = 'block';
            document.getElementById('success-result').style.display = 'none';
            document.getElementById('error-result').style.display = 'block';
            document.getElementById('error-message').textContent = 'Memverifikasi dan melakukan check-in...';

            fetch('<?php echo e(route("checkin")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    qr_code: qrData.trim(),
                    source: 'scanner'
                })
            })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        throw new Error(data.message || 'Network error');
                    }
                    return data;
                })
                .then(data => {
                    if (data.success) {
                        showSuccessResult(data.registration, data.message);
                    } else {
                        showErrorResult(data.message || 'Verifikasi gagal');
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    showErrorResult(err.message || 'Terjadi kesalahan saat memverifikasi QR Code');
                });
        }

        function showSuccessResult(reg, message) {
            const info = `
            <div class="participant-details">
                <p><strong>No. Tiket:</strong> ${reg.qr_code}</p>
                <p><strong>Nama:</strong> ${reg.name}</p>
                <p><strong>Email:</strong> ${reg.email}</p>
                <p><strong>Event:</strong> ${reg.event.name}</p>
                <p><strong>Telepon:</strong> ${reg.phone || '-'}</p>
                <p><strong>Status:</strong> <span style="color: #28a745;">✓ SUDAH CHECK-IN</span></p>
                <p><strong>Waktu Check-in:</strong> ${reg.checked_in_at ? new Date(reg.checked_in_at).toLocaleString('id-ID') : new Date().toLocaleString('id-ID')}</p>
                ${message ? `<p><strong>Pesan:</strong> ${message}</p>` : ''}
            </div>`;

            document.getElementById('participant-info').innerHTML = info;
            document.getElementById('success-result').style.display = 'block';
            document.getElementById('error-result').style.display = 'none';
            document.getElementById('result-container').style.display = 'block';

            // Clear manual input form
            document.getElementById('qr-code-input').value = '';

            // Auto restart scanner setelah 5 detik
            setTimeout(() => {
                document.getElementById('result-container').style.display = 'none';
                // Restart scanner hanya jika di tab scan
                if (document.getElementById('scan-tab').classList.contains('active')) {
                    startCameraScanner();
                }
            }, 5000);
        }

        function showErrorResult(msg) {
            // Remove existing restart button
            const existingBtn = document.querySelector('.restart-scanner-btn');
            if (existingBtn) {
                existingBtn.remove();
            }

            document.getElementById('error-message').textContent = msg;
            document.getElementById('success-result').style.display = 'none';
            document.getElementById('error-result').style.display = 'block';
            document.getElementById('result-container').style.display = 'block';

            // Clear manual input form
            document.getElementById('qr-code-input').value = '';

            // Add restart button untuk error
            const errorResult = document.getElementById('error-result');
            const restartBtn = document.createElement('button');
            restartBtn.className = 'btn btn-admin-primary mt-3 restart-scanner-btn';
            restartBtn.innerHTML = '<i class="fas fa-redo me-2"></i>Coba Lagi';
            restartBtn.onclick = function () {
                document.getElementById('result-container').style.display = 'none';
                if (document.getElementById('scan-tab').classList.contains('active')) {
                    startCameraScanner();
                }
            };
            errorResult.appendChild(restartBtn);

            // Auto hide error setelah 8 detik
            setTimeout(() => {
                if (document.getElementById('result-container').style.display !== 'none') {
                    document.getElementById('result-container').style.display = 'none';
                }
            }, 8000);
        }

        // Handle page visibility changes
        document.addEventListener('visibilitychange', function () {
            if (document.hidden && scannerActive) {
                stopCameraScanner();
            }
        });

        // Cleanup on page unload
        window.addEventListener('beforeunload', stopCameraScanner);
        window.addEventListener('pagehide', stopCameraScanner);
    </script>
</body>

</html><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/admin/scan-qr.blade.php ENDPATH**/ ?>