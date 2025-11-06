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
                        <!-- Header -->
                        <div class="ticket-header">
                            <small>QR Code ini diperlukan untuk proses check-in di venue.</small>
                        </div>

                        <!-- QR Code Section -->
                        <div class="qr-section">
                            <div class="qr-container">
                                <?php echo $qrImage; ?>

                            </div>
                        </div>

                        <!-- Ticket Details -->
                        <div class="ticket-details">
                            <div class="detail-item">
                                <span class="label">No. Tiket</span>
                                <span class="value"><?php echo e($registration->qr_code); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Nama</span>
                                <span class="value"><?php echo e($registration->name); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="label">Jabatan</span>
                                <span class="value"><?php echo e($registration->position); ?></span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="ticket-actions">
                            <button onclick="window.print()" class="btn btn-sm btn-outline-primary ticket-btn">
                                <i class="fas fa-print me-2"></i> Print
                            </button>
                            <button onclick="downloadQRCode()" class="btn btn-sm btn-success ticket-btn">
                                <i class="fas fa-download me-2"></i> Download
                            </button>
                            <button onclick="window.location.href='<?php echo e(route('home')); ?>'"
                                class="btn btn-sm btn-success ticket-btn">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function downloadQRCode() {
            // Ambil SVG dari QR code
            const svgElement = document.querySelector('.qr-container svg');
            const svgData = new XMLSerializer().serializeToString(svgElement);

            // Convert SVG ke PNG
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);

                // Download sebagai PNG
                const pngFile = canvas.toDataURL('image/png');
                const downloadLink = document.createElement('a');
                downloadLink.download = 'QR-Code-<?php echo e($registration->qr_code); ?>.png';
                downloadLink.href = pngFile;
                downloadLink.click();
            };

            // Convert SVG ke data URL
            const svgBlob = new Blob([svgData], {
                type: 'image/svg+xml;charset=utf-8'
            });
            const url = URL.createObjectURL(svgBlob);
            img.src = url;
        }
    </script>

    <style>
        /* Copy CSS di atas ke sini */
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/registrations/success.blade.php ENDPATH**/ ?>