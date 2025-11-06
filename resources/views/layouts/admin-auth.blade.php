<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ICA - Admin System')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --gold-primary: #D4AF37;
            --gold-dark: #B8860B;
            --gold-light: #FFD700;
            --bg-dark: #0A0A0A;
            --bg-card: #1A1A1A;
            --bg-card-light: #2A2A2A;
            --text-light: #FFFFFF;
            --text-muted: rgba(255, 255, 255, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', serif;
            background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
            min-height: 100vh;
            color: var(--text-light);
            overflow-x: hidden;
        }

        .admin-auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        /* Card Styles */
        .auth-card {
            background: linear-gradient(145deg, var(--bg-card), var(--bg-card-light));
            border-radius: 16px;
            border: 1px solid var(--gold-primary);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.15);
            backdrop-filter: blur(10px);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            margin: 0 auto;
            animation: fadeInUp 0.6s ease-out;
        }

        .auth-card-header {
            background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-dark) 100%);
            color: var(--bg-dark);
            padding: 25px 25px 20px;
            text-align: center;
            border-bottom: 1px solid var(--gold-primary);
            position: relative;
        }

        .auth-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
        }

        .auth-logo {
            margin-bottom: 15px;
        }

        .logo-container {
            display: inline-block;
            padding: 15px;
            border: 2px solid var(--bg-dark);
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .logo-glow {
            width: 60px;
            height: 60px;
            filter: drop-shadow(0 0 10px rgba(212, 175, 55, 0.5));
            transition: transform 0.3s ease;
        }

        .logo-glow:hover {
            transform: scale(1.05);
        }

        .auth-title {
            font-family: 'Montserrat', serif;
            font-weight: 700;
            font-size: 1.4rem;
            margin: 0 0 5px 0;
            letter-spacing: 0.5px;
        }

        .auth-subtitle {
            font-family: 'Montserrat', serif;
            font-size: 0.9rem;
            opacity: 0.95;
            margin: 0;
            font-weight: 500;
        }

        .auth-card-body {
            padding: 30px 25px;
        }

        /* Form Styles */
        .form-group-luxury {
            margin-bottom: 25px;
        }

        .form-label {
            color: var(--gold-primary);
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
            padding: 12px 45px 12px 15px;
            color: var(--text-light);
            font-family: 'Montserrat', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .form-control-luxury:focus {
            outline: none;
            border-color: var(--gold-primary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            background: rgba(42, 42, 42, 0.9);
            transform: translateY(-1px);
        }

        .form-control-luxury::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            font-weight: 400;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold-primary);
            font-size: 0.9rem;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 6px;
            display: block;
            font-family: 'Montserrat', serif;
            font-weight: 500;
        }

        /* Button Styles */
        .btn-auth-primary {
            width: 100%;
            background: linear-gradient(135deg, var(--gold-primary), var(--gold-dark));
            color: var(--bg-dark);
            border: none;
            border-radius: 8px;
            padding: 14px 20px;
            font-family: 'Montserrat', serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .btn-auth-primary:hover {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold-primary));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }

        .btn-auth-primary:active {
            transform: translateY(0);
        }

        .btn-auth-outline {
            width: 100%;
            background: transparent;
            color: var(--gold-primary);
            border: 1px solid var(--gold-primary);
            border-radius: 8px;
            padding: 14px 20px;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: 0.3px;
        }

        .btn-auth-outline:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold-light);
            border-color: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            text-decoration: none;
        }

        /* Links Section */
        .auth-links {
            margin-top: 20px;
            text-align: center;
        }

        .auth-link {
            color: var(--gold-primary);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin: 0 10px;
            font-weight: 500;
        }

        .auth-link:hover {
            color: var(--gold-light);
            text-decoration: underline;
            transform: translateY(-1px);
        }

        .auth-divider {
            color: var(--text-muted);
            margin: 0 5px;
        }

        /* Alert Styles */
        .alert {
            border-radius: 8px;
            border: none;
            font-family: 'Montserrat', serif;
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

        /* Checkbox Styles */
        .form-check {
            margin-bottom: 20px;
        }

        .form-check-input {
            background-color: rgba(42, 42, 42, 0.8);
            border: 1px solid rgba(212, 175, 55, 0.4);
            margin-right: 8px;
        }

        .form-check-input:checked {
            background-color: var(--gold-primary);
            border-color: var(--gold-primary);
        }

        .form-check-label {
            color: var(--text-light);
            font-family: 'Montserrat', serif;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(212, 175, 55, 0.6);
            }
        }

        .auth-card {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .auth-card {
                max-width: 380px;
                margin: 20px;
            }

            .auth-card-header {
                padding: 20px 20px 15px;
            }

            .auth-card-body {
                padding: 25px 20px;
            }

            .auth-title {
                font-size: 1.3rem;
            }

            .logo-glow {
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .auth-card {
                max-width: 340px;
                margin: 15px;
            }

            .auth-card-header {
                padding: 18px 15px 12px;
            }

            .auth-card-body {
                padding: 20px 15px;
            }

            .auth-title {
                font-size: 1.2rem;
            }

            .auth-subtitle {
                font-size: 0.85rem;
            }

            .form-control-luxury {
                padding: 10px 40px 10px 12px;
                font-size: 0.95rem;
            }

            .btn-auth-primary,
            .btn-auth-outline {
                padding: 12px 16px;
                font-size: 0.95rem;
            }

            .logo-glow {
                width: 45px;
                height: 45px;
            }
        }

        /* Utility Classes */
        .text-gold {
            color: var(--gold-primary) !important;
        }

        .text-gold-light {
            color: var(--gold-light) !important;
        }

        .text-muted-light {
            color: var(--text-muted) !important;
        }

        .text-center {
            text-align: center !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mt-1 {
            margin-top: 0.5rem !important;
        }

        .mt-2 {
            margin-top: 1rem !important;
        }

        .mt-3 {
            margin-top: 1.5rem !important;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Main Content -->
    <div class="admin-auth-container">
        @yield('content')
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

            // Add focus effects to form inputs
            $('.form-control-luxury').on('focus', function() {
                $(this).closest('.input-group-luxury').find('.input-icon').css('color',
                'var(--gold-light)');
            }).on('blur', function() {
                $(this).closest('.input-group-luxury').find('.input-icon').css('color',
                    'var(--gold-primary)');
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
