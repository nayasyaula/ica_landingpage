<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-ICA.png')); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Indonesian Cat Association'); ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', serif;
            background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
            color: #fff;
            min-height: 100vh;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Montserrat', serif;
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
            max-width: 1400px;
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
            font-family: 'Montserrat', serif;
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
            font-family: 'Montserrat', serif;
            font-size: 1rem;
        }

        .btn-admin-logout {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Montserrat', serif;
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
            max-width: 1400px;
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
            font-family: 'Montserrat', serif;
            font-weight: 700;
            font-size: 2.2rem;
            color: #D4AF37;
            margin-bottom: 0.5rem;
            letter-spacing: 0.3px;
        }

        .admin-subtitle {
            font-family: 'Montserrat', serif;
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
            max-width: 700px;
            width: 100%;
        }

        .admin-card-item {
            flex: 1;
            min-width: 280px;
            max-width: 320px;
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
            height: 200px;
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
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.4rem;
            color: #1A1A1A;
        }

        .stat-content h3 {
            font-family: 'Montserrat', serif;
            font-weight: 700;
            font-size: 2.2rem;
            color: #D4AF37;
            margin: 0 0 8px 0;
            line-height: 1;
        }

        .stat-label {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
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
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 1.3rem;
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
            padding: 12px 24px;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 1rem;
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
            max-width: 1200px;
        }

        .table-admin {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.9rem;
        }

        .table-admin thead {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .table-admin th {
            padding: 15px 12px;
            text-align: left;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            color: #D4AF37;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .table-admin td {
            padding: 12px 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        .table-admin tbody tr {
            transition: all 0.3s ease;
        }

        .table-admin tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .ticket-code {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #D4AF37 !important;
            font-size: 0.85rem;
        }

        .user-name {
            font-weight: 600;
            color: #FFFFFF !important;
            font-size: 0.95rem;
        }

        .user-email {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.85rem;
        }

        .event-name {
            color: #F5E8C8 !important;
            font-style: italic;
            font-size: 0.85rem;
        }

        .register-date {
            color: rgba(255, 255, 255, 0.7) !important;
            font-size: 0.85rem;
        }

        .action-buttons {
            white-space: nowrap;
        }

        .btn-table-view {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 6px 12px;
            font-family: 'Montserrat', serif;
            font-weight: 500;
            font-size: 0.8rem;
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

        /* Form Styles */
        .form-group-luxury {
            margin-bottom: 25px;
        }

        .form-label {
            color: #D4AF37;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            display: block;
            letter-spacing: 0.3px;
        }

        .input-group-luxury {
            position: relative;
        }

        .form-control-luxury {
            width: 100%;
            background: rgba(42, 42, 42, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.4);
            border-radius: 8px;
            padding: 12px 15px;
            color: #FFFFFF;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control-luxury:focus {
            outline: none;
            border-color: #D4AF37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            background: rgba(42, 42, 42, 0.9);
            transform: translateY(-1px);
        }

        .form-control-luxury::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            font-weight: 400;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 6px;
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
        }

        /* Alert Styles */
        .alert {
            border-radius: 8px;
            border: none;
            font-family: 'Cormorant Garamond', serif;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.15);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .alert-info {
            background: rgba(23, 162, 184, 0.15);
            color: #17a2b8;
            border: 1px solid rgba(23, 162, 184, 0.3);
        }

        /* Button Styles */
        .btn-auth-outline {
            background: transparent;
            color: #D4AF37;
            border: 1px solid #D4AF37;
            border-radius: 8px;
            padding: 12px 20px;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            text-align: center;
        }

        .btn-auth-outline:hover {
            background: rgba(212, 175, 55, 0.1);
            color: #FFD700;
            border-color: #FFD700;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            text-decoration: none;
        }

        /* Badge Styles */
        .badge {
            font-family: 'Montserrat', serif;
            font-weight: 500;
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
                min-width: 250px;
            }

            .admin-stat-card,
            .admin-action-card {
                height: 180px;
                padding: 20px 15px;
            }

            .stat-content h3 {
                font-size: 1.8rem;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                margin-bottom: 12px;
            }

            .card-title-luxury {
                font-size: 1.1rem;
            }

            .table-admin th,
            .table-admin td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }

            .btn-admin-action {
                font-size: 0.9rem;
                padding: 10px 20px;
            }

            .btn-table-view {
                padding: 5px 10px;
                font-size: 0.75rem;
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
                height: 160px;
                padding: 15px 12px;
            }

            .stat-icon {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }

            .stat-content h3 {
                font-size: 1.6rem;
            }

            .stat-label {
                font-size: 0.9rem;
            }

            .card-title-luxury {
                font-size: 1rem;
            }

            .btn-admin-action {
                font-size: 0.85rem;
                padding: 8px 16px;
            }

            .table-responsive {
                font-size: 0.8rem;
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
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
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
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Auto-hide alerts after 5 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);

            // Close alert when close button is clicked
            $('.alert .btn-close').on('click', function() {
                $(this).closest('.alert').fadeOut('slow');
            });

            // Add loading state to buttons
            $('form').on('submit', function() {
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).html(
                    '<i class="fas fa-spinner fa-spin me-2"></i>Loading...');
            });
        });
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/layouts/admin.blade.php ENDPATH**/ ?>