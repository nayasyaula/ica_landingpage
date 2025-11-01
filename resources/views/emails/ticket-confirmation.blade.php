<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ICA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .content {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }

        .ticket-info {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Pendaftaran Berhasil!</h1>
        </div>

        <div class="content">
            <p>Halo <strong>{{ $registration->name }}</strong>,</p>
            <p>Terima kasih telah mendaftar event <strong>{{ $registration->event->name }}</strong>.</p>

            <!-- ✅ LANGSUNG PAKAI QR CODE TEXT -->
            <div class="qr-code">
                <h3>QR Code Anda:</h3>
                <p>
                    <strong>Lihat file QR Code yang di-attach dalam email ini!</strong><br>
                    File: <code>{{ $registration->qr_code }}.png</code>
                </p>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center;">
                    <strong>Kode Tiket: {{ $registration->qr_code }}</strong><br>
                    <small>Gunakan kode ini atau scan QR Code yang di-attach</small>
                </div>
                <p><small>QR Code telah dilampirkan sebagai file gambar dalam email ini</small></p>
            </div>

            <div class="ticket-info">
                <h3> Detail Tiket:</h3>
                <ul>
                    <!-- ✅ LANGSUNG PAKAI $registration->qr_code -->
                    <li><strong>No. Tiket:</strong> {{ $registration->qr_code }}</li>
                    <li><strong>Tanggal Event:</strong>
                        {{ \Carbon\Carbon::parse($registration->event->event_date)->format('d M Y H:i') }}
                    </li>
                    <li><strong>Lokasi:</strong> {{ $registration->event->location }}</li>
                </ul>
            </div>

            <p>Bawa kode tiket ini saat event untuk check-in.</p>
            <p>Jika ada pertanyaan, hubungi kami di email ini.</p>

            <hr>
            <p><small>Indonesian Cat Association<br>Email: indonesiancatassociation2@gmail.com</small></p>
        </div>
    </div>
</body>

</html>