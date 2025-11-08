<?php $__env->startSection('content'); ?>
    <div class="ticket-page">
        <div class="container ticket-container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 ticket-col">
                    <!-- Success Alert -->
                    <div class="ticket-alert-success text-center mb-4 py-2">
                        <i class="fas fa-check-circle me-2"></i>
                        Pendaftaran Berhasil!
                    </div>

                    <!-- Main Ticket Card -->
                    <div class="ticket-card">
                        <!-- Ticket Content for Download (without buttons) -->
                        <div id="ticket-content">
                            <!-- Header -->
                            <div class="ticket-header">
                                <h4 class="ticket-title">
                                    <i class="fas fa-qrcode me-2"></i>E-Ticket QR Code
                                </h4>
                                <small class="text-muted">Scan QR code berikut untuk check-in di venue</small>
                            </div>

                            <!-- QR Code Section -->
                            <div class="qr-section text-center py-4">
                                <?php echo $qrImage; ?>

                            </div>

                            <!-- Ticket Details -->
                            <div class="ticket-details">
                                <div class="detail-item">
                                    <span class="label">Kode Tiket</span>
                                    <span class="value ticket-code"><?php echo e($registration->qr_code); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="label">Tanggal Event</span>
                                    <span class="value">28 - 30 November 2025</span>
                                </div>
                                <div class="detail-item">
                                    <span class="label">Lokasi</span>
                                    <span class="value">HARRIS Hotel & Residence Riverview Kuta Bali</span>
                                </div>
                                <div class="detail-item">
                                    <span class="label">Nama Peserta</span>
                                    <span class="value"><?php echo e($registration->name); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="label">Posisi/Jabatan</span>
                                    <span class="value"><?php echo e($registration->position); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="ticket-actions" id="ticket-actions">
                            <a href="<?php echo e(route('home')); ?>" class="btn btn-sm btn-outline-primary ticket-btn">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                            <button onclick="downloadQRCodeOnly()" class="btn btn-sm btn-gold ticket-btn">
                                <i class="fas fa-qrcode me-2"></i> Download QR
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="text-center">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <script>
        // Simple QR Code only download
        function downloadQRCodeOnly() {
            const qrImage = document.querySelector('.qr-section img');
            if (qrImage) {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                // Canvas size disesuaikan
                canvas.width = 400;
                canvas.height = 450;

                // Background putih
                ctx.fillStyle = '#ffffff';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                const img = new Image();
                img.crossOrigin = 'Anonymous';
                img.onload = function () {
                    // Teks di ATAS QR code
                    ctx.fillStyle = '#000000';
                    ctx.textAlign = 'center';

                    // Judul di atas
                    ctx.font = 'bold 18px Arial';
                    ctx.fillText('QR EVENT ICA', canvas.width / 2, 30);

                    // Tanggal
                    ctx.font = '14px Arial';
                    ctx.fillText('28 - 30 November 2025', canvas.width / 2, 55);

                    // Tempat
                    ctx.font = '12px Arial';
                    ctx.fillText('HARRIS Hotel & Residence Riverview Kuta Bali', canvas.width / 2, 75);

                    // Draw QR code di bawah teks
                    ctx.drawImage(img, 75, 90, 250, 250);

                    canvas.toBlob(function (blob) {
                        const url = URL.createObjectURL(blob);
                        const link = document.createElement('a');
                        link.download = `QRCode-<?php echo e($registration->qr_code); ?>.png`;
                        link.href = url;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        URL.revokeObjectURL(url);
                    }, 'image/png', 1.0);
                };
                img.onerror = function () {
                    alert('Gagal memuat QR code');
                };
                img.src = qrImage.src;
            } else {
                alert('QR Code tidak ditemukan');
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-registration', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ica_landingpage\resources\views/registrations/success.blade.php ENDPATH**/ ?>