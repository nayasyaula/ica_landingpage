<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran ICA 2025</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #1a1a1a;
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
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
        }

        .header p {
            font-size: 1rem;
            color: #1a1a1a;
            opacity: 0.9;
        }

        .content {
            padding: 30px 25px;
        }

        .greeting {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #d4af37;
        }

        .event-details {
            background: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #d4af37;
        }

        .event-details h3 {
            color: #d4af37;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .detail-item {
            display: flex;
            margin-bottom: 10px;
            align-items: flex-start;
        }

        .detail-label {
            min-width: 80px;
            color: #d4af37;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .detail-value {
            flex: 1;
            color: #ffffff;
            font-size: 0.95rem;
        }

        .qr-section {
            text-align: center;
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            border: 2px dashed #d4af37;
        }

        .qr-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #d4af37;
        }

        .qr-code-container {
            max-width: 220px;
            margin: 15px auto;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
        }

        .qr-code-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .ticket-code {
            font-family: 'Courier New', monospace;
            font-size: 1.2rem;
            font-weight: 700;
            color: #d4af37;
            letter-spacing: 2px;
            margin: 10px 0;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background: #2d2d2d;
            border-top: 1px solid #444;
            font-size: 0.9rem;
            color: #888;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 1.6rem;
            }
            
            .detail-item {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 5px;
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

            <p style="margin-bottom: 20px; color: #ccc; font-size: 1rem;">
                Terima kasih telah mendaftar untuk <strong>Indonesian Cat Association 2025</strong>.
                Kami sangat menantikan kehadiran Anda dalam acara ini!
            </p>

            <!-- Event Details Section -->
            <div class="event-details">
                <h3>📅 Detail Acara</h3>
                <div class="detail-item">
                    <div class="detail-label">Nama:</div>
                    <div class="detail-value"><?php echo e($registration->name); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Tanggal:</div>
                    <div class="detail-value">28 - 30 November 2025</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Lokasi:</div>
                    <div class="detail-value"><?php echo e($registration->event->location); ?></div>
                </div>
            </div>

            <!-- QR Code Section -->
            <div class="qr-section">
                <div class="qr-title">QR Code Check-in</div>
                <div class="ticket-code"><?php echo e($registration->qr_code); ?></div>
                <p style="color: #ccc; margin-bottom: 15px;">
                    Tunjukkan QR code ini saat check-in di lokasi acara
                </p>
                
                <!-- QR Code dengan background putih -->
                <div class="qr-code-container">
                    <img src="cid:qrcode.png" alt="QR Code" width="220" class="qr-code-image">
                </div>
                
                <p style="color: #ccc; font-size: 0.9rem; margin-top: 10px;">
                    Scan QR code di atas untuk check-in
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Indonesian Cat Association 2025</p>
            <p style="margin-top: 10px;">© 2025 Indonesian Cat Association. All rights reserved.</p>
        </div>
    </div>
</body>

</html><?php /**PATH C:\ica_landingpage\resources\views/emails/ticket-confirmation.blade.php ENDPATH**/ ?>