<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-ICA.png')); ?>">
    <title>Admin Dashboard - Indonesian Cat Association</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            font-family: 'Montserrat', sans-serif;
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
            font-family: 'Montserrat', sans-serif;
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
            font-family: 'Montserrat', sans-serif;
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
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
        }

        .btn-admin-logout {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Montserrat', sans-serif;
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

        /* ===== STYLE KHUSUS ADMIN DASHBOARD ===== */
        .admin-dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header - DI TENGAH */
        .admin-header {
            text-align: center;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            color: #D4AF37;
            margin-bottom: 0.5rem;
            letter-spacing: 0.3px;
        }

        .admin-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* CONTAINER UNTUK CARD HORIZONTAL */
        .cards-horizontal-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 3rem;
        }

        .cards-horizontal-wrapper {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 900px;
            width: 100%;
        }

        .admin-card-item {
            flex: 1;
            min-width: 250px;
            max-width: 280px;
        }

        /* Stat Card & Action Card SAMA UKURAN */
        .admin-stat-card,
        .admin-action-card {
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            border: 1px solid #D4AF37;
            border-radius: 12px;
            padding: 25px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.15);
            height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .admin-stat-card:hover,
        .admin-action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2);
            border-color: #F5E8C8;
        }

        /* Stat Card Specific */
        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #1A1A1A;
        }

        .stat-content h3 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2rem;
            color: #D4AF37;
            margin: 0 0 8px 0;
            line-height: 1;
        }

        .stat-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            font-weight: 500;
        }

        /* Action Card Specific */
        .admin-action-card {
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .card-header-luxury {
            margin-bottom: 15px;
        }

        .card-title-luxury {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 1.1rem;
            color: #D4AF37;
            margin: 0;
        }

        .card-body-luxury {
            padding: 0;
        }

        .btn-admin-action {
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            color: #1A1A1A;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-admin-action:hover {
            background: linear-gradient(135deg, #B8860B, #D4AF37);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #1A1A1A;
            text-decoration: none;
        }

        /* Table Card */
        .admin-table-card {
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            max-width: 1100px;
        }

        .table-admin {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.85rem;
        }

        .table-admin thead {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .table-admin th {
            padding: 12px 10px;
            text-align: left;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: #D4AF37;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .table-admin td {
            padding: 10px 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.85rem;
        }

        .table-admin tbody tr {
            transition: all 0.3s ease;
        }

        .table-admin tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .ticket-code {
            font-family: 'Montserrat', monospace;
            font-weight: 600;
            color: #D4AF37 !important;
            font-size: 0.8rem;
        }

        .user-name {
            font-weight: 600;
            color: #FFFFFF !important;
            font-size: 0.9rem;
        }

        .user-position {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.8rem;
            font-style: italic;
        }

        .user-email {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.8rem;
        }

        .event-name {
            color: #F5E8C8 !important;
            font-style: italic;
            font-size: 0.8rem;
        }

        .register-date {
            color: rgba(255, 255, 255, 0.7) !important;
            font-size: 0.8rem;
        }

        .action-buttons {
            white-space: nowrap;
        }

        .btn-table-view {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 5px 10px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            font-size: 0.75rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-table-view:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: #D4AF37;
            color: #F5E8C8;
            text-decoration: none;
            transform: translateY(-1px);
        }

        /* Modal Styling */
        .modal-backdrop {
            z-index: 1040 !important;
        }

        .modal {
            z-index: 1050 !important;
        }

        .modal-content {
            background: #1A1A1A !important;
            border: 1px solid #D4AF37 !important;
            border-radius: 12px !important;
        }

        .modal-header {
            border-bottom: 1px solid rgba(212, 175, 55, 0.3) !important;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .modal-title {
            color: #D4AF37 !important;
            font-family: 'Montserrat', sans-serif !important;
            font-weight: 600 !important;
        }

        .modal-body {
            color: #FFFFFF !important;
            font-family: 'Montserrat', sans-serif !important;
        }

        .modal-footer {
            border-top: 1px solid rgba(212, 175, 55, 0.3) !important;
        }

        .btn-close {
            filter: invert(1) !important;
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
                font-size: 1.8rem;
            }

            .admin-subtitle {
                font-size: 1rem;
            }

            .cards-horizontal-wrapper {
                gap: 20px;
            }

            .admin-card-item {
                min-width: 220px;
            }

            .admin-stat-card,
            .admin-action-card {
                height: 160px;
                padding: 20px 15px;
            }

            .stat-content h3 {
                font-size: 1.8rem;
            }

            .stat-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
                margin-bottom: 12px;
            }

            .card-title-luxury {
                font-size: 1rem;
            }

            .table-admin th,
            .table-admin td {
                padding: 8px 6px;
                font-size: 0.8rem;
            }

            .btn-admin-action {
                font-size: 0.85rem;
                padding: 8px 16px;
            }

            .btn-table-view {
                padding: 4px 8px;
                font-size: 0.7rem;
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
                font-size: 1.5rem;
            }

            .cards-horizontal-wrapper {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .admin-card-item {
                width: 100%;
                max-width: 280px;
            }

            .admin-stat-card,
            .admin-action-card {
                height: 150px;
                padding: 15px 12px;
            }

            .stat-icon {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .stat-content h3 {
                font-size: 1.6rem;
            }

            .stat-label {
                font-size: 0.85rem;
            }

            .card-title-luxury {
                font-size: 0.95rem;
            }

            .btn-admin-action {
                font-size: 0.8rem;
                padding: 8px 14px;
            }

            .table-responsive {
                font-size: 0.75rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .admin-stat-card,
        .admin-action-card,
        .admin-table-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .admin-stat-card {
            animation-delay: 0.1s;
        }

        .admin-action-card {
            animation-delay: 0.2s;
        }

        .admin-table-card {
            animation-delay: 0.3s;
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
                                                <th>Di-scan Oleh</th>
                                                <th>Waktu Scan</th>
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
                                                    <td class="scanner-info">
                                                        <?php if($registration->scanner_name): ?>
                                                            <span class="text-gold"><?php echo e($registration->scanner_name); ?></span>
                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="scan-time">
                                                        <?php if($registration->scanned_at): ?>
                                                            <small
                                                                class="text-muted"><?php echo e($registration->scanned_at->format('d M Y H:i')); ?></small>
                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
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
                                                            data-scanner="<?php echo e($registration->scanner_name ?? 'Belum di-scan'); ?>"
                                                            data-scanned-at="<?php echo e($registration->scanned_at ? $registration->scanned_at->format('d M Y H:i') : 'Belum di-scan'); ?>"
                                                            data-checked-in="<?php echo e($registration->is_checked_in ? 'Ya' : 'Tidak'); ?>">
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
    </main>

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
                    <p style="color: #FFFFFF; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.9rem;"
                        id="modalPosition"></p>
                    <p style="color: #FFFFFF; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.85rem;"
                        id="modalEmail"></p>
                    <p style="color: #FFFFFF; font-family: 'Montserrat', sans-serif; margin-bottom: 5px; font-size: 0.85rem;"
                        id="modalEvent"></p>

                    <!-- Info Scanner -->
                    <div class="scanner-info mt-3 p-3" style="background: rgba(212, 175, 55, 0.1); border-radius: 8px;">
                        <h6 style="color: #D4AF37; font-size: 0.9rem; margin-bottom: 8px;">Info Check-in</h6>
                        <p style="color: #FFFFFF; font-size: 0.8rem; margin: 2px 0;">
                            <strong>Status:</strong> <span id="modalCheckedIn"></span>
                        </p>
                        <p style="color: #FFFFFF; font-size: 0.8rem; margin: 2px 0;">
                            <strong>Di-scan oleh:</strong> <span id="modalScanner"></span>
                        </p>
                        <p style="color: #FFFFFF; font-size: 0.8rem; margin: 2px 0;">
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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.view-registration-btn');
            const downloadBtn = document.getElementById('downloadQrBtn');
            let currentQrCode = '';
            let currentName = '';

            viewButtons.forEach(button => {
                button.addEventListener('click', function () {
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
                    document.getElementById('modalScanner').textContent = scanner;
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
            downloadBtn.addEventListener('click', function () {
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

</html><?php /**PATH C:\ica_landingpage\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>