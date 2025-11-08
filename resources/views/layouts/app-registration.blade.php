<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-ICA.png') }}">
    <title>Indonesian Cat Association - Mukernas & Gala Dinner 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Luxury yang lebih elegan -->
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

        /* NAVBAR STYLES */
        .nav-luxury {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            z-index: 9999 !important;
            background: rgba(10, 10, 10, 0.98) !important;
        }

        /* OFFSET UNTUK FIXED NAVBAR */
        section {
            scroll-margin-top: 80px;
        }

        html {
            scroll-padding-top: 80px;
        }

        /* FONT STYLES */
        body {
            font-family: 'Montserrat', serif;
            background-color: var(--black);
            color: #fff;
            scroll-behavior: smooth;
            font-weight: 400;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Montserrat', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .nav-luxury {
            font-family: 'Montserrat', serif;
        }

        .nav-link {
            font-family: 'Montserrat', serif;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .footer-luxury {
            font-family: 'Montserrat', serif;
        }

        .luxury-text {
            font-family: 'Montserrat', serif;
            font-weight: 400;
        }

        .luxury-heading {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            letter-spacing: 0.8px;
            font-size: 20px;
        }

        /* REGISTRATION FORM STYLES */
        /* Paw Pattern Background */
        .paw-pattern {
            position: relative;
            background-color: #0A0A0A;
        }

        .paw-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('images/paw.png') }}");
            background-size: 40px 30px;
            background-position: 0 0;
            background-repeat: repeat;
            animation: movePaw 30s linear infinite;
            opacity: 0.15;
            filter: sepia(1) saturate(2) hue-rotate(5deg) brightness(0.9);
            pointer-events: none;
            z-index: 0;
        }

        @keyframes movePaw {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 100px 100px;
            }
        }

        /* Pastikan konten di atas pattern */
        .paw-pattern>* {
            position: relative;
            z-index: 1;
        }

        .paw-pattern .container,
        .paw-pattern .max-w-7xl,
        .paw-pattern .max-w-6xl,
        .paw-pattern .max-w-4xl {
            position: relative;
            z-index: 2;
        }

        .card-luxury {
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--light-gold), var(--gold));
        }

        .form-luxury-input {
            background: var(--dark-gray);
            border: 1px solid var(--medium-gray);
            color: white;
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
        }

        .form-luxury-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
            outline: none;
        }

        .form-luxury-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            font-size: 0.85rem;
        }

        /* CUSTOM SELECT STYLES */
        .custom-select {
            position: relative;
            font-family: 'Montserrat', sans-serif;
            width: 100%;
            z-index: 1;
        }

        .select-selected {
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            color: #fff;
            padding: 0.75rem;
            border-radius: 8px;
            cursor: pointer;
            border: 1px solid #d4af37;
            box-shadow: 0 0 6px rgba(212, 175, 55, 0.3);
        }

        .select-selected::after {
            content: "▼";
            float: right;
            color: #d4af37;
            font-size: 0.7rem;
            margin-top: 2px;
            transition: transform 0.2s;
        }

        .select-selected.active::after {
            transform: rotate(-180deg);
        }

        .select-items {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            color: #fff;
            border: 1px solid #d4af37;
            border-radius: 8px;
            margin-top: 4px;
            z-index: 99;
            max-height: 180px;
            overflow-y: auto;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
        }

        .select-items div {
            padding: 0.6rem 0.75rem;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.9rem;
        }

        .select-items div:hover {
            background: linear-gradient(145deg, #2A2A2A, #3A3A3A);
        }

        /* BUTTON STYLES */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: var(--black);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Montserrat', serif;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--dark-gold), var(--gold));
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(212, 175, 55, 0.3);
        }

        /* COLOR UTILITIES */
        .text-gold-400 {
            color: #d4af37;
        }

        .bg-gold-400 {
            background-color: #d4af37;
        }

        .bg-gold-600 {
            background-color: #b8860b;
        }

        .border-gold-400 {
            border-color: #d4af37;
        }

        .bg-dark-gray {
            background-color: var(--dark-gray);
        }

        .border-medium-gray {
            border-color: var(--medium-gray);
        }

        /* TICKET PAGE STYLES */
        .ticket-page {
            background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .ticket-card {
            background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
            border-radius: 12px;
            border: 1px solid #D4AF37;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.2);
            overflow: hidden;
            margin-bottom: 20px;
            font-family: 'Montserrat', serif;
            max-width: 600px;
            margin: 0 auto;
        }

        .ticket-header {
            background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
            color: #1A1A1A;
            padding: 20px 15px;
            text-align: center;
            font-family: 'Montserrat', serif;
            border-bottom: 1px solid #D4AF37;
        }

        .ticket-header h5 {
            margin: 0 0 8px 0;
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
        }

        .ticket-header small {
            opacity: 0.9;
            font-size: 1rem;
            font-weight: bold;
        }

        .qr-section {
            padding: 25px 20px;
            text-align: center;
            background: rgba(26, 26, 26, 0.8);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .qr-container {
            display: inline-block;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            border: 2px solid #D4AF37;
        }

        .ticket-details {
            padding: 20px;
            font-family: 'Montserrat', serif;
            background: rgba(26, 26, 26, 0.6);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item .label {
            color: #D4AF37;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'Montserrat', serif;
            min-width: 100px;
        }

        .detail-item .value {
            font-weight: 500;
            color: #FFFFFF;
            font-size: 0.85rem;
            text-align: right;
            max-width: 60%;
            font-family: 'Montserrat', serif;
            line-height: 1.4;
        }

        .ticket-actions {
            padding: 20px;
            background: rgba(26, 26, 26, 0.8);
            display: flex;
            gap: 10px;
            justify-content: center;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
        }

        .ticket-btn {
            border-radius: 6px;
            font-size: 0.85rem;
            padding: 8px 16px;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            border: 1px solid #D4AF37;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            background: transparent;
            color: #D4AF37;
        }

        .btn-outline-primary:hover {
            background: #D4AF37;
            color: #1A1A1A;
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, #D4AF37, #B8860B);
            color: #1A1A1A;
            border: 1px solid #D4AF37;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #B8860B, #D4AF37);
            transform: translateY(-2px);
            color: #1A1A1A;
        }

        .ticket-alert-success {
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            background: rgba(212, 175, 55, 0.1);
            color: #D4AF37;
            font-size: 0.9rem;
            margin-bottom: 20px;
            padding: 12px 16px;
            text-align: center;
            font-family: 'Montserrat', serif;
            font-weight: 600;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .ticket-alert-success i {
            color: #D4AF37;
        }

        .ticket-container {
            margin-top: 100px !important;
            padding-top: 2rem !important;
        }

        /* LOGO STYLES */
        .logo-gold-outline {
            position: relative;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .logo-glow {
            height: 50px;
            width: auto;
            display: block;
            position: relative;
            z-index: 10;
            filter: brightness(1.1) saturate(1.2) sepia(0.3) hue-rotate(-5deg);
            transition: all 0.3s ease;
        }

        .logo-gold-outline::before,
        .logo-gold-outline::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("{{ asset('images/logo-ICA.png') }}") center/contain no-repeat;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .logo-gold-outline::before {
            filter: brightness(0) drop-shadow(0 0 6px var(--gold)) drop-shadow(0 0 12px var(--gold)) drop-shadow(0 0 18px var(--dark-gold));
            opacity: 0.8;
        }

        .logo-gold-outline::after {
            filter: brightness(0) drop-shadow(0 0 3px var(--light-gold)) drop-shadow(0 0 6px var(--gold));
            opacity: 0.6;
            z-index: 2;
        }

        .logo-gold-outline:hover .logo-glow {
            filter: brightness(1.2) saturate(1.4) sepia(0.4) hue-rotate(-8deg);
        }

        .logo-gold-outline:hover::before {
            filter: brightness(0) drop-shadow(0 0 10px var(--gold)) drop-shadow(0 0 18px var(--gold)) drop-shadow(0 0 25px var(--dark-gold));
            opacity: 0.9;
        }

        .logo-gold-outline:hover::after {
            filter: brightness(0) drop-shadow(0 0 6px var(--light-gold)) drop-shadow(0 0 12px var(--gold));
            opacity: 0.8;
        }

        /* MOBILE MENU STYLES */
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--medium-gray);
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 40;
        }

        .mobile-menu.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu-links {
            display: flex;
            flex-direction: column;
            padding: 1rem 0;
        }

        .mobile-menu-link {
            padding: 1rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--medium-gray);
            font-family: 'Montserrat', serif;
            font-weight: 500;
        }

        .mobile-menu-link:hover {
            color: var(--gold);
            background: rgba(212, 175, 55, 0.1);
        }

        .mobile-menu-link:last-child {
            border-bottom: none;
        }

        .mobile-menu-button {
            transition: all 0.3s ease;
        }

        .mobile-menu-button.active {
            transform: rotate(90deg);
        }

        /* RESPONSIVE STYLES */
        @media (max-width: 768px) {
            .ticket-container {
                margin-top: 80px !important;
                padding-top: 1rem !important;
            }

            .ticket-col {
                padding: 0 15px;
            }

            .ticket-card {
                max-width: 100%;
                margin: 0 10px;
            }

            .ticket-header {
                padding: 15px 12px;
            }

            .ticket-header h5 {
                font-size: 1.1rem;
            }

            .qr-section {
                padding: 20px 15px;
            }

            .ticket-details {
                padding: 15px;
            }

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                padding: 8px 0;
            }

            .detail-item .value {
                text-align: left;
                max-width: 100%;
                font-size: 0.9rem;
            }

            .detail-item .label {
                font-size: 0.8rem;
                min-width: auto;
            }

            .ticket-actions {
                flex-direction: column;
                gap: 8px;
                padding: 15px;
            }

            .ticket-btn {
                width: 100%;
            }

            .logo-glow {
                height: 40px;
            }
        }

        @media (max-width: 480px) {
            .ticket-container {
                margin-top: 70px !important;
            }

            .ticket-col {
                padding: 0 10px;
            }

            .ticket-card {
                margin: 0 5px;
            }

            .ticket-header {
                padding: 12px 10px;
            }

            .ticket-header h5 {
                font-size: 1rem;
            }

            .ticket-header small {
                font-size: 0.75rem;
            }

            .qr-section {
                padding: 15px 10px;
            }

            .qr-container {
                padding: 10px;
            }

            .ticket-details {
                padding: 12px 10px;
            }
        }

        @media print {

            .ticket-actions,
            .ticket-alert-success {
                display: none !important;
            }

            .ticket-card {
                box-shadow: none !important;
                border: 2px solid #D4AF37 !important;
                max-width: 100% !important;
                margin: 0 !important;
            }

            .ticket-container {
                margin-top: 0 !important;
                padding-top: 0 !important;
            }

            body {
                background-color: white !important;
            }

            .ticket-page {
                background-color: white !important;
                padding: 0 !important;
            }

            .ticket-header {
                background: #D4AF37 !important;
                color: #1A1A1A !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .detail-item .label {
                color: #D4AF37 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        @media (min-width: 768px) {
            .logo-glow {
                height: 65px;
            }
        }
    </style>
</head>

<body class="antialiased">
    <!-- Navigation -->
    <nav class="nav-luxury fixed w-full z-50 py-4">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- Logo with gold outline effect following image shape -->
                    <div class="logo-gold-outline">
                        <img src="{{ asset('images/logo-ICA.png') }}" alt="Indonesian Cat Association Logo"
                            class="logo-glow">
                    </div>
                    <span class="ml-3 text-white text-2xl hidden md:block luxury-text">Indonesian Cat Association</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/#home') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Beranda</a>
                    <a href="{{ url('/#about') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Tentang kami</a>
                    <a href="{{ url('/#speakers') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Pembicara</a>
                    <a href="{{ url('/#schedule') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Jadwal</a>
                    <a href="{{ url('/#location') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Lokasi</a>
                    <a href="{{ url('/#sponsors') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">Sponsor</a>
                    <a href="{{ url('/#faq') }}"
                        class="nav-link text-white hover:text-gold-400 transition text-lg">FAQ</a>
                </div>
                <div class="md:hidden">
                    <button class="mobile-menu-button text-gold-400">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu">
                <div class="mobile-menu-links">
                    <a href="#home" class="mobile-menu-link text-base">Home</a>
                    <a href="#about" class="mobile-menu-link text-base">About</a>
                    <a href="#speakers" class="mobile-menu-link text-base">Speakers</a>
                    <a href="#schedule" class="mobile-menu-link text-base">Schedule</a>
                    <a href="#location" class="mobile-menu-link text-base">Location</a>
                    <a href="#sponsors" class="mobile-menu-link text-base">Sponsors</a>
                    <a href="#events" class="mobile-menu-link text-base">Register</a>
                    <a href="#faq" class="mobile-menu-link text-base">FAQ</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-luxury py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <!-- Replaced text with logo image -->
                    <div class="logo-gold-outline" style="transform: scale(0.8); transform-origin: left;">
                        <img src="{{ asset('images/logo-ICA.png') }}" alt="Indonesian Cat Association Logo"
                            class="logo-glow">
                    </div>
                    <!-- Updated description text -->
                    <p class="text-gray-400 mb-4 luxury-text text-lg">
                        Organisasi penyayang kucing <br> di Indonesia yang dibentuk pada tanggal 1 April 2003.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/indonesian.cat.association/"
                            class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://ica.or.id/" class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-google text-xl"></i>
                        </a>
                        <a href="https://www.tiktok.com/@indonesiancatassociation"
                            class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCyG4DpLP36Ss5F4ScvyceHQ"
                            class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4 luxury-heading">Akses Cepat</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ url('/#home') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ url('/#about') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Tentang
                                Kami</a>
                        </li>
                        <li><a href="{{ url('/#speakers') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Pembicara</a>
                        </li>
                        <li><a href="{{ url('/#schedule') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Jadwal</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4 luxury-heading">Info Lengkap</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/#location') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Lokasi</a>
                        </li>
                        <li><a href="{{ url('/#sponsors') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Sponsor</a>
                        </li>
                        <li><a href="{{ url('/#faq') }}"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">FAQ</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4 luxury-heading">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400 contact-info">
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 gold-accent"></i>
                            <span>+62 812 8054 3524</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 gold-accent"></i>
                            <span>pp@ica.or.id (Pengurus Pusat)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 gold-accent"></i>
                            <span>sekretariat@ica.or.id (Sekretariat)</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 gold-accent"></i>
                            <span>Grand ITC Permata Hijau 1st Floor Block B.6 Unit 6-7 Jl. Arteri Permata Hijau -
                                Jakarta Selatan 12210</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-medium-gray mt-8 pt-8 text-center text-gray-500 luxury-text">
                <p>&copy; 2025 Bintang Kreasi Multivision</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.querySelector('.mobile-menu');
            const menuIcon = this.querySelector('i');

            // Toggle mobile menu
            mobileMenu.classList.toggle('active');
            this.classList.toggle('active');

            // Change icon
            if (mobileMenu.classList.contains('active')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.mobile-menu-link').forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.querySelector('.mobile-menu');
                const menuButton = document.querySelector('.mobile-menu-button');
                const menuIcon = menuButton.querySelector('i');

                mobileMenu.classList.remove('active');
                menuButton.classList.remove('active');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Schedule Tab Functionality - SINGLE VERSION
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.schedule-tab');
            const days = document.querySelectorAll('.schedule-day');

            // Function to switch tabs
            function switchTab(dayId) {
                // Remove active class from all tabs and days
                tabs.forEach(t => t.classList.remove('active'));
                days.forEach(day => day.classList.remove('active'));

                // Add active class to clicked tab and corresponding day
                const activeTab = document.querySelector(`.schedule-tab[data-day="${dayId}"]`);
                const activeDay = document.getElementById(dayId);

                if (activeTab && activeDay) {
                    activeTab.classList.add('active');
                    activeDay.classList.add('active');
                }
            }

            // Add click event to all tabs
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetDay = this.getAttribute('data-day');
                    switchTab(targetDay);
                });
            });

            // FAQ Accordion Functionality
            document.querySelectorAll('.faq-question').forEach(question => {
                question.addEventListener('click', function() {
                    const faqItem = this.parentElement;
                    faqItem.classList.toggle('active');
                });
            });
        });
    </script>
</body>

</html>
