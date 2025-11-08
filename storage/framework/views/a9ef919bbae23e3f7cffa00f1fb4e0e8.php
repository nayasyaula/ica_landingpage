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
                                    <span class="label">Nama Peserta</span>
                                    <span class="value"><?php echo e($registration->name); ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="label">Posisi/Jabatan</span>
                                    <span class="value"><?php echo e($registration->position); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Actions (Separate from download content) -->
                        <div class="ticket-actions" id="ticket-actions">
                            <a href="<?php echo e(route('home')); ?>" class="btn btn-sm btn-outline-primary ticket-btn">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                            </a>
                            <button onclick="downloadTicketAsImage()" class="btn btn-sm btn-success ticket-btn">
                                <i class="fas fa-download me-2"></i> Download Tiket
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
        // Fungsi Download Ticket sebagai Gambar PNG
        function downloadTicketAsImage() {
            const ticketElement = document.getElementById('ticket-content');
            const loadingOverlay = document.getElementById('loadingOverlay');

            // Tampilkan loading
            loadingOverlay.style.display = 'flex';

            // Opsi html2canvas untuk hasil terbaik
            const options = {
                scale: 3, // Scale tinggi untuk kualitas lebih baik
                useCORS: true,
                logging: false,
                backgroundColor: '#ffffff',
                width: ticketElement.scrollWidth,
                height: ticketElement.scrollHeight,
                scrollX: 0,
                scrollY: 0,
                onclone: function(clonedDoc) {
                    // Pastikan semua elemen terlihat dengan baik di clone
                    const clonedElement = clonedDoc.getElementById('ticket-content');
                    clonedElement.style.width = '100%';
                    clonedElement.style.backgroundColor = '#ffffff';
                    
                    // Ubah warna QR code menjadi hitam
                    const qrImages = clonedElement.getElementsByTagName('img');
                    const qrSvg = clonedElement.querySelector('svg');
                    
                    // Untuk gambar QR code
                    for (let img of qrImages) {
                        img.style.filter = 'brightness(0) saturate(100%)'; // Membuat gambar menjadi hitam
                        img.style.backgroundColor = '#ffffff';
                        img.style.border = '1px solid #f0f0f0';
                    }
                    
                    // Untuk SVG QR code (jika menggunakan SVG)
                    if (qrSvg) {
                        const paths = qrSvg.querySelectorAll('path');
                        paths.forEach(path => {
                            path.style.fill = '#000000'; // Ubah warna path menjadi hitam
                        });
                        qrSvg.style.backgroundColor = '#ffffff';
                    }
                }
            };

            html2canvas(ticketElement, options)
                .then(canvas => {
                    // Konversi canvas ke blob dengan kualitas tinggi
                    canvas.toBlob(function(blob) {
                        // Buat URL untuk blob
                        const url = URL.createObjectURL(blob);
                        
                        // Buat elemen link untuk download
                        const link = document.createElement('a');
                        link.download = `E-Ticket-<?php echo e($registration->qr_code); ?>.png`;
                        link.href = url;
                        
                        // Trigger download
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        
                        // Bersihkan URL
                        URL.revokeObjectURL(url);
                        
                        // Sembunyikan loading
                        loadingOverlay.style.display = 'none';
                    }, 'image/png', 1.0); // Kualitas 100%
                })
                .catch(error => {
                    console.error('Error generating image:', error);
                    alert('Terjadi kesalahan saat mengunduh tiket.');
                    loadingOverlay.style.display = 'none';
                });
        }

        // Fallback jika html2canvas belum dimuat
        function ensureHtml2Canvas() {
            if (typeof html2canvas === 'undefined') {
                console.log('Loading html2canvas...');
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';
                script.onload = function() {
                    console.log('html2canvas loaded successfully');
                };
                script.onerror = function() {
                    alert('Gagal memuat library yang diperlukan. Silakan refresh halaman.');
                };
                document.head.appendChild(script);
                return false;
            }
            return true;
        }

        // Event listener untuk tombol download
        document.addEventListener('DOMContentLoaded', function() {
            const downloadBtn = document.querySelector('[onclick="downloadTicketAsImage()"]');
            if (downloadBtn) {
                downloadBtn.addEventListener('click', function(e) {
                    if (!ensureHtml2Canvas()) {
                        e.preventDefault();
                        alert('Sedang mempersiapkan library download... Silakan coba lagi dalam beberapa detik.');
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-registration', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/registrations/success.blade.php ENDPATH**/ ?>