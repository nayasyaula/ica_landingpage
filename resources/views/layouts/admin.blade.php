<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-ICA.png') }}">
    <title>Admin Dashboard - Indonesian Cat Association</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
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
            font-family: 'Cormorant Garamond', serif;
            background-color: var(--black);
            color: #fff;
            scroll-behavior: smooth;
            font-weight: 400;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cinzel', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Admin Header */
        .admin-top-bar {
            background: linear-gradient(135deg, #1A1A1A, #2A2A2A);
            border-bottom: 2px solid #D4AF37;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
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
        }

        .admin-logo-text {
            font-family: 'Cinzel', serif;
            font-size: 1.2rem;
            color: #D4AF37;
            font-weight: 600;
        }

        .admin-user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-admin-logout {
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Cinzel', serif;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-admin-logout:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: #D4AF37;
            color: #F5E8C8;
        }

        /* Main content spacing for fixed header */
        .admin-main-content {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }
    </style>
</head>

<body class="antialiased">
    <!-- Admin Top Bar (Tanpa Navbar Lengkap) -->
    <div class="admin-top-bar">
        <div class="admin-header-content">
            <div class="admin-logo">
                <img src="{{ asset('images/logo-ICA.png') }}" alt="ICA Logo" class="admin-logo-img">
                <span class="admin-logo-text">Admin Dashboard</span>
            </div>
            <div class="admin-user-menu">
                <span class="text-gray-300">Welcome, Admin</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-admin-logout">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="admin-main-content">
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    
    @yield('scripts')
</body>

</html>