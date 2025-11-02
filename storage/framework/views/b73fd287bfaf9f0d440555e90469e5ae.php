<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran ICA 2025</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #ffffff;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #1a1a1a;
        }

        .header {
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            padding: 40px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="20" cy="20" r="8"/><circle cx="80" cy="30" r="6"/><circle cx="40" cy="70" r="10"/><circle cx="70" cy="80" r="7"/></g></svg>');
        }

        .logo {
            max-width: 120px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        .header p {
            font-size: 1.2rem;
            color: #1a1a1a;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #d4af37;
        }

        .ticket-card {
            background: linear-gradient(135deg, #2d2d2d 0%, #3d3d3d 100%);
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            border: 2px solid #d4af37;
            position: relative;
            overflow: hidden;
        }

        .ticket-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #d4af37, #f4d03f, #d4af37);
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .ticket-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #d4af37;
            margin-bottom: 10px;
        }

        .ticket-details {
            display: grid;
            gap: 15px;
            margin-bottom: 25px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #444;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            background: #d4af37;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .detail-icon i {
            color: #1a1a1a;
            font-size: 1.1rem;
        }

        .detail-text {
            flex: 1;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #ccc;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ffffff;
        }

        .qr-section {
            text-align: center;
            padding: 25px;
            background: #1a1a1a;
            border-radius: 15px;
            margin: 25px 0;
            border: 2px dashed #d4af37;
        }

        .qr-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #d4af37;
        }

        .qr-code {
            max-width: 250px;
            margin: 0 auto 15px;
            padding: 15px;
            background: white;
            border-radius: 10px;
        }

        .qr-code img {
            width: 100%;
            height: auto;
            display: block;
        }

        .ticket-code {
            font-family: 'Courier New', monospace;
            font-size: 1.4rem;
            font-weight: 700;
            color: #d4af37;
            letter-spacing: 2px;
            margin: 10px 0;
        }

        .instructions {
            background: #2d2d2d;
            padding: 25px;
            border-radius: 15px;
            margin: 25px 0;
        }

        .instructions h3 {
            color: #d4af37;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .instructions ol {
            padding-left: 20px;
        }

        .instructions li {
            margin-bottom: 10px;
            color: #ccc;
        }

        .footer {
            text-align: center;
            padding: 30px 20px;
            background: #2d2d2d;
            border-top: 1px solid #444;
        }

        .footer-logo {
            max-width: 80px;
            margin-bottom: 15px;
        }

        .contact-info {
            margin: 20px 0;
            color: #ccc;
        }

        .social-links {
            margin: 20px 0;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #d4af37;
            text-decoration: none;
            font-weight: 500;
        }

        .copyright {
            color: #888;
            font-size: 0.9rem;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .ticket-card {
                padding: 20px;
            }

            .detail-item {
                flex-direction: column;
                text-align: center;
            }

            .detail-icon {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Pendaftaran Berhasil!</h1>
            <p>Indonesian Cat Association 2025</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Halo, <strong><?php echo e($registration->name); ?></strong>!
            </div>

            <p style="margin-bottom: 25px; color: #ccc; font-size: 1.1rem;">
                Terima kasih telah mendaftar untuk <strong>Indonesian Cat Association 2025</strong>.
                Kami sangat menantikan kehadiran Anda dalam acara ini!
            </p>

            <!-- QR Code Section -->
            <div class="qr-section">
                <div class="qr-title"> QR Code Check-in</div>
                <div class="ticket-code"><?php echo e($registration->qr_code); ?></div>
                <p style="color: #ccc; margin-bottom: 20px;">
                    Tunjukkan QR code ini saat check-in di lokasi acara
                </p>

                <?php if(isset($isFallback) && $isFallback): ?>
                    <!-- Fallback: QR dari external API -->
                    <div class="qr-code">
                        <img src="<?php echo e($qrImageUrl); ?>" alt="QR Code" style="width: 100%; height: auto;">
                    </div>
                    <p style="color: #ccc; font-size: 0.9rem; margin-top: 10px;">
                        Scan QR code di atas untuk check-in
                    </p>
                <?php else: ?>
                    <!-- Primary: QR sebagai attachment -->
                    <p style="color: #d4af37; font-weight: 600;">
                        ⬇️ QR Code tersedia sebagai lampiran email
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\ica_landingpage\resources\views/emails/ticket-confirmation.blade.php ENDPATH**/ ?>