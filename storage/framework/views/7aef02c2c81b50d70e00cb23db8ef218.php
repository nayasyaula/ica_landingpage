<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="admin-dashboard-container">
        <!-- Page Header -->
        <div class="admin-header mb-4">
            <h1 class="admin-title">
                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
            </h1>
            <p class="admin-subtitle">Kelola data pendaftaran dan peserta event</p>
        </div>

        <!-- Stats & Actions Row -->
        <div class="cards-horizontal-container mb-4">
            <div class="cards-horizontal-wrapper">
                <!-- Total Pendaftar Card -->
                <div class="admin-card-item">
                    <div class="admin-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number"><?php echo e($totalRegistrations ?? 0); ?></h3>
                            <p class="stat-label">Total Pendaftar</p>
                        </div>
                    </div>
                </div>

                <!-- QR Scan Card -->
                <div class="admin-card-item">
                    <div class="admin-action-card">
                        <div class="card-header-luxury">
                            <h5 class="card-title-luxury">
                                <i class="fas fa-qrcode me-2"></i>Scan QR
                            </h5>
                        </div>
                        <div class="card-body-luxury">
                            <a href="<?php echo e(route('admin.scan-qr')); ?>" class="btn-admin-action">
                                <i class="fas fa-camera me-2"></i>Scan QR Code
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sponsor Management Card -->
                <div class="admin-card-item">
                    <div class="admin-action-card">
                        <div class="card-header-luxury">
                            <h5 class="card-title-luxury">
                                <i class="fas fa-handshake me-2"></i>Sponsor
                            </h5>
                        </div>
                        <div class="card-body-luxury">
                            <a href="<?php echo e(route('admin.sponsors.index')); ?>" class="btn-admin-action">
                                <i class="fas fa-cog me-2"></i>Kelola Sponsor
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registrations Table -->
        <?php if(isset($registrations) && $registrations->count() > 0): ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="admin-table-card">
                        <div class="card-header-luxury" style="padding: 1rem 1.5rem;">
                            <h5 class="card-title-luxury text-center" mb-0>
                                <i class="fas fa-list-alt me-2"></i>Data Pendaftaran
                            </h5>
                        </div>
                        <div class="card-body-luxury">
                            <div class="table-responsive">
                                <table class="table-admin">
                                    <thead>
                                        <tr>
                                            <th>No. Tiket</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Event</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Status Check-in</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="ticket-code"><?php echo e($registration->qr_code ?? 'N/A'); ?></td>
                                                <td class="user-name"><?php echo e($registration->name ?? 'N/A'); ?></td>
                                                <td class="user-position"><?php echo e($registration->position ?? 'N/A'); ?>

                                                </td>
                                                <td class="user-email"><?php echo e($registration->email ?? 'N/A'); ?></td>
                                                <td class="event-name"><?php echo e($registration->event->name ?? 'N/A'); ?>

                                                </td>
                                                <td class="register-date">
                                                    <?php echo e($registration->created_at->format('d M Y')); ?>

                                                </td>
                                                <td>
                                                    <?php if($registration->is_checked_in): ?>
                                                        <span class="badge bg-success">✓ Hadir</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Belum Hadir</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="action-buttons">
                                                    <button type="button" class="btn-table-view view-registration-btn"
                                                        data-id="<?php echo e($registration->id); ?>"
                                                        data-name="<?php echo e($registration->name); ?>"
                                                        data-position="<?php echo e($registration->position); ?>"
                                                        data-email="<?php echo e($registration->email); ?>"
                                                        data-event="<?php echo e($registration->event->name ?? 'N/A'); ?>"
                                                        data-qr="<?php echo e($registration->qr_code); ?>"
                                                        data-scanned-at="<?php echo e($registration->checked_in_at ? \Carbon\Carbon::parse($registration->checked_in_at)->format('d M Y H:i') : 'Belum di-scan'); ?>"
                                                        data-checked-in="<?php echo e($registration->is_checked_in ? 'Ya' : 'Belum di-scan'); ?>">
                                                        <i class="fas fa-eye me-1"></i>View
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="admin-table-card">
                        <div class="card-body-luxury text-center py-5">
                            <i class="fas fa-inbox fa-3x text-white mb-3"></i>
                            <h5 class="text-white">Belum ada data pendaftaran</h5>
                            <p class="text-white">Data pendaftaran akan muncul di sini</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal Detail Pendaftaran -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">
                        <i class="fas fa-qrcode me-2"></i>Detail Tiket
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="qrCodeContainer" class="mb-3 d-flex justify-content-center"></div>

                    <h6 style="color: #D4AF37; font-family: 'Montserrat', sans-serif; font-weight: 600; margin-bottom: 5px;"
                        id="modalName"></h6>
                    <p style="color: #000000; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.9rem;"
                        id="modalPosition"></p>
                    <p style="color: #000000; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.85rem;"
                        id="modalEmail"></p>
                    <p style="color: #000000; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.85rem;"
                        id="modalEvent"></p>

                    <!-- Info Scanner -->
                    <div class="scanner-info mt-3 p-3" style="background: rgba(212, 175, 55, 0.1); border-radius: 8px;">
                        <h6 style="color: #D4AF37; font-size: 0.9rem; margin-bottom: 8px;">Info Check-in</h6>
                        <p style="color: #000000; font-size: 0.8rem; margin: 2px 0;">
                            <strong>Status:</strong> <span id="modalCheckedIn"></span>
                        </p>
                        <p style="color: #000000; font-size: 0.8rem; margin: 2px 0;">
                            <strong>Waktu scan:</strong> <span id="modalScannedAt"></span>
                        </p>
                    </div>

                    <p class="text-muted small mt-2" id="modalQrCode"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" id="downloadQrBtn">
                        <i class="fas fa-download me-2"></i>Download QR
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-registration-btn');
            const downloadBtn = document.getElementById('downloadQrBtn');
            let currentQrCode = '';
            let currentName = '';

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const name = this.dataset.name;
                    const position = this.dataset.position;
                    const email = this.dataset.email;
                    const event = this.dataset.event;
                    const qr = this.dataset.qr;
                    const scanner = this.dataset.scanner;
                    const scannedAt = this.dataset.scannedAt;
                    const checkedIn = this.dataset.checkedIn;

                    // Simpan data untuk download
                    currentQrCode = qr;
                    currentName = name;

                    // Tampilkan data di modal
                    document.getElementById('modalName').textContent = name;
                    document.getElementById('modalPosition').textContent = position;
                    document.getElementById('modalEmail').textContent = email;
                    document.getElementById('modalEvent').textContent = event;
                    document.getElementById('modalScannedAt').textContent = scannedAt;
                    document.getElementById('modalCheckedIn').textContent = checkedIn;
                    document.getElementById('modalQrCode').textContent = `Kode: ${qr}`;

                    // Generate QR Code
                    const qrContainer = document.getElementById('qrCodeContainer');
                    qrContainer.innerHTML = '';
                    const qrCanvas = document.createElement('canvas');
                    qrCanvas.id = 'qrCanvas';
                    qrCanvas.width = 200;
                    qrCanvas.height = 200;

                    try {
                        new QRious({
                            element: qrCanvas,
                            value: qr,
                            size: 200,
                            background: 'white',
                            foreground: 'black',
                            level: 'H'
                        });
                        qrContainer.appendChild(qrCanvas);
                    } catch (error) {
                        console.error('Error generating QR code:', error);
                        qrContainer.innerHTML =
                            '<p class="text-danger">Error generating QR code</p>';
                    }

                    // Tampilkan modal
                    const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
                    modal.show();
                });
            });

            // Download QR Code functionality
            downloadBtn.addEventListener('click', function() {
                const canvas = document.getElementById('qrCanvas');
                if (!canvas) {
                    alert('QR Code belum tersedia untuk didownload');
                    return;
                }

                // Create download link
                const link = document.createElement('a');
                link.download = `QRCode-${currentName}-${currentQrCode}.png`;
                link.href = canvas.toDataURL('image/png');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    </script>
    </body>

    </html>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ica_landingpage\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>