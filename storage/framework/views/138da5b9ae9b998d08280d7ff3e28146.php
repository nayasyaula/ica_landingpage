<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #4f46e5;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            border: 2px solid #4f46e5;
            border-top: none;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .ticket-info {
            background: #f8fafc;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Pendaftaran Berhasil!</h1>
        <p>Terima kasih telah mendaftar event kami</p>
    </div>
    
    <div class="content">
        <h2>Halo <?php echo e($registration->name); ?>!</h2>
        <p>Anda telah berhasil terdaftar untuk event:</p>
        
        <div class="ticket-info">
            <h3><?php echo e($registration->event->name); ?></h3>
            <p><strong>📅 Tanggal:</strong> <?php echo e(\Carbon\Carbon::parse($registration->event->event_date)->format('d M Y H:i')); ?></p>
            <p><strong>📍 Lokasi:</strong> <?php echo e($registration->event->location); ?></p>
            <p><strong>🎫 No. Tiket:</strong> <?php echo e($registration->qr_code); ?></p>
        </div>

        <div class="qr-code">
            <p><strong>QR Code Check-in:</strong></p>
            <?php echo $qrImage; ?>

            <p style="font-size: 12px; color: #666;">Tunjukkan QR code ini saat check-in di lokasi event</p>
        </div>

        <div class="instructions">
            <h4>📋 Instruksi Check-in:</h4>
            <ol>
                <li>Datang ke lokasi event 30 menit sebelum acara dimulai</li>
                <li>Tunjukkan QR code ini kepada panitia</li>
                <li>QR code akan di-scan untuk proses check-in</li>
                <li>Simpan email ini sebagai bukti pendaftaran</li>
            </ol>
        </div>

        <div class="contact">
            <h4>📞 Kontak Panitia:</h4>
            <p>Jika ada pertanyaan, hubungi: panitia@yourevent.com</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.</p>
        <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
    </div>
</body>
</html><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/emails/event-registration.blade.php ENDPATH**/ ?>