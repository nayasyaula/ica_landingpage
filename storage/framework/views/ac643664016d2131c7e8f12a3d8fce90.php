<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/logo-ICA.png')); ?>">
    <title>Indonesian Cat Association - Mukernas & Gala Dinner 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Font Luxury yang lebih elegan -->
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

        /* FONT LUXURY UNTUK SEMUA ELEMEN */
        body {
            font-family: 'Cormorant Garamond', serif;
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
            font-family: 'Cinzel', serif;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Navigation dengan font luxury */
        .nav-luxury {
            font-family: 'Cinzel', serif;
        }

        .nav-link {
            font-family: 'Cinzel', serif;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Footer dengan font luxury */
        .footer-luxury {
            font-family: 'Cormorant Garamond', serif;
        }

        /* Button dengan font luxury */
        .btn-gold {
            font-family: 'Cinzel', serif;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Schedule tabs dengan font luxury */
        .schedule-tab {
            font-family: 'Cinzel', serif;
            font-weight: 500;
        }

        /* FAQ dengan font luxury */
        .faq-question {
            font-family: 'Cinzel', serif;
            font-weight: 600;
        }

        .timeline-speaker {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 500;
            font-style: italic;
        }

        /* Sponsor tiers dengan font luxury */
        .tier-title {
            font-family: 'Cinzel', serif;
            font-weight: 700;
            letter-spacing: 0.8px;
        }

        /* Form elements dengan font luxury */
        .form-luxury input,
        .form-luxury textarea {
            font-family: 'Cormorant Garamond', serif;
        }

        /* Mobile menu dengan font luxury */
        .mobile-menu-link {
            font-family: 'Cinzel', serif;
            font-weight: 500;
        }

        /* Contact info dengan font luxury */
        .contact-info {
            font-family: 'Cormorant Garamond', serif;
        }

        /* Section title styling luxury */
        .section-title {
            font-family: 'Cinzel', serif;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Luxury text variants */
        .luxury-text {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
        }

        .luxury-heading {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            letter-spacing: 0.8px;
        }

        .luxury-caption {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-weight: 300;
        }

        /* Sisanya tetap sama... */
        .hero-bg {
            background-image: linear-gradient(rgba(10, 10, 10, 0.7), rgba(212, 175, 55, 0.2)),
                url('<?php echo e(asset('images/ica1.jpg')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            min-height: 700px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom, transparent, var(--black));
        }

        /* Enhanced Logo Styling */
        .logo-gold-frame {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            padding: 8px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
        }

        .logo-gold-frame::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .logo-gold-frame:hover::before {
            transform: translateX(100%);
        }

        .logo-enhanced {
            height: 50px;
            width: auto;
            display: block;
            position: relative;
            z-index: 2;
        }

        @media (min-width: 768px) {
            .logo-enhanced {
                height: 65px;
            }

            .logo-gold-frame {
                padding: 10px;
                border-radius: 15px;
            }
        }

        /* Enhanced gold outline with multiple layers */
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
            filter:
                /* Inner gold tint */
                brightness(1.1) saturate(1.2)
                /* Gold color overlay */
                sepia(0.3) hue-rotate(-5deg);
            transition: all 0.3s ease;
        }

        /* Multiple glow layers for depth */
        .logo-gold-outline::before,
        .logo-gold-outline::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("<?php echo e(asset('images/logo-ICA.png')); ?>") center/contain no-repeat;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .logo-gold-outline::before {
            filter:
                brightness(0) drop-shadow(0 0 6px var(--gold)) drop-shadow(0 0 12px var(--gold)) drop-shadow(0 0 18px var(--dark-gold));
            opacity: 0.8;
        }

        .logo-gold-outline::after {
            filter:
                brightness(0) drop-shadow(0 0 3px var(--light-gold)) drop-shadow(0 0 6px var(--gold));
            opacity: 0.6;
            z-index: 2;
        }

        /* Hover effects */
        .logo-gold-outline:hover .logo-glow {
            filter:
                brightness(1.2) saturate(1.4) sepia(0.4) hue-rotate(-8deg);
        }

        .logo-gold-outline:hover::before {
            filter:
                brightness(0) drop-shadow(0 0 10px var(--gold)) drop-shadow(0 0 18px var(--gold)) drop-shadow(0 0 25px var(--dark-gold));
            opacity: 0.9;
        }

        .logo-gold-outline:hover::after {
            filter:
                brightness(0) drop-shadow(0 0 6px var(--light-gold)) drop-shadow(0 0 12px var(--gold));
            opacity: 0.8;
        }

        @media (min-width: 768px) {
            .logo-glow {
                height: 65px;
            }
        }

        .gold-border-frame {
            border: 2px solid var(--gold);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
            position: relative;
        }

        .gold-border-frame::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border: 1px solid var(--light-gold);
            border-radius: 10px;
            z-index: 5;
            pointer-events: none;
        }

        .gold-accent {
            color: var(--gold);
        }

        .gold-border {
            border-color: var(--gold);
        }

        .gold-bg {
            background-color: var(--gold);
        }

        .location-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .location-image iframe {
            filter: grayscale(20%) contrast(110%);
            transition: all 0.3s ease;
        }

        .location-image:hover iframe {
            filter: grayscale(0%) contrast(100%);
            transform: scale(1.05);
        }

        .location-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .location-image:hover .location-overlay {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), transparent);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: var(--black);
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--dark-gold), var(--gold));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
        }

        /* Mobile optimization */
        @media (max-width: 768px) {
            .location-image {
                height: 200px;
            }

            .location-image:hover iframe {
                transform: scale(1.02);
            }
        }

        .image-hover-container {
            transition: all 0.5s ease;
            cursor: pointer;
        }

        .image-hover-container:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
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

        .card-luxury:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            border-color: var(--gold);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--dark-gray), var(--black));
            border: 2px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .nav-luxury {
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--medium-gray);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 0;
            margin: 0 1rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .form-luxury input,
        .form-luxury textarea {
            background: var(--dark-gray);
            border: 1px solid var(--medium-gray);
            color: white;
            transition: all 0.3s ease;
        }

        .form-luxury input:focus,
        .form-luxury textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
        }

        .footer-luxury {
            background: linear-gradient(to top, var(--dark-gray), var(--black));
            border-top: 1px solid var(--medium-gray);
        }

        .gold-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .speaker-image-container {
            width: 170px;
            height: 170px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #D4AF37 0%, #f4d03f 50%, #D4AF37 100%);
            padding: 3px;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .speaker-image-container::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            right: 3px;
            bottom: 3px;
            background: #1a1a1a;
            border-radius: 50%;
            z-index: 1;
        }

        .speaker-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .speaker-image-container:hover .speaker-image {
            transform: scale(1.08);
        }

        /* Schedule Section Styles - Compact Version */
        .schedule-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .schedule-tab {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: #d4af37;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.85rem;
            min-width: auto;
        }

        .schedule-tab:hover {
            background: rgba(212, 175, 55, 0.15);
            transform: translateY(-1px);
        }

        .schedule-tab.active {
            background: #d4af37;
            color: #1a1a1a;
            border-color: #d4af37;
        }

        .timeline-item {
            background: rgba(30, 30, 30, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .timeline-item:hover {
            border-color: rgba(212, 175, 55, 0.4);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }


        /* Schedule Section Styles - Narrower Width */
        .schedule-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.6rem;
        }

        .schedule-tab.text-button {
            font-size: 1.04rem;
        }

        .schedule-tab {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: #d4af37;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .schedule-tab:hover {
            background: rgba(212, 175, 55, 0.15);
            transform: translateY(-1px);
        }

        .schedule-tab.active {
            background: #d4af37;
            color: #1a1a1a;
            border-color: #d4af37;
        }

        /* Container untuk timeline items dengan width lebih kecil */
        .schedule-day {
            max-width: 600px;
            /* Lebih kecil lagi */
            margin: 0 auto;
            display: none;
        }

        .schedule-day.active {
            display: block;
        }

        .timeline-item {
            background: rgba(30, 30, 30, 0.7);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            position: relative;
            width: 100%;
            /* Memastikan mengisi container */
        }

        .timeline-item:hover {
            border-color: rgba(212, 175, 55, 0.4);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .timeline-time {
            display: inline-block;
            background: rgba(212, 175, 55, 0.15);
            color: black;
            padding: 0.25rem 0.6rem;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .timeline-title {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            line-height: 1.3;
            font-family: 'Montserrat', sans-serif;
        }

        .timeline-description {
            color: #b0b0b0;
            font-size: 1.1rem;
            line-height: 1.4;
        }

        .schedule-highlight {
            border-left: 3px solid #d4af37;
        }

        .schedule-highlight .timeline-time {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(180, 140, 20, 0.2));
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .schedule-day {
                max-width: 100%;
                /* Di mobile full width */
                padding: 0 0.5rem;
            }

            .schedule-tabs {
                flex-direction: column;
                align-items: center;
                gap: 0.4rem;
            }

            .schedule-tab {
                width: 100%;
                max-width: 280px;
                text-align: center;
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .timeline-item {
                padding: 0.8rem;
                margin-bottom: 0.6rem;
            }
        }

        /* Untuk layar sangat kecil */
        @media (max-width: 480px) {
            .schedule-day {
                padding: 0 0.25rem;
            }

            .schedule-tab {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }

            .timeline-item {
                padding: 0.7rem;
            }

        }

        .timeline-speaker {
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .timeline-description {
            color: var(--gray-300);
            line-height: 1.6;
        }

        .schedule-highlight {
            border-left: 4px solid var(--light-gold);
            background: linear-gradient(145deg, #2A2A2A, #1A1A1A);
        }

        .schedule-highlight .timeline-time {
            background: linear-gradient(135deg, var(--light-gold), var(--gold));
        }

        /* Sponsors Section */
        .sponsor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            align-items: center;
        }

        .sponsor-card {
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sponsor-card:hover {
            transform: translateY(-5px);
            border-color: var(--gold);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.1);
        }

        .sponsor-tier {
            margin-bottom: 3rem;
        }

        /* Sponsor Gradient Backgrounds */
        .platinum-gradient {
            background: linear-gradient(135deg, #8A8A8A, #E5E4E2, #FFFFFF, #C0C0C0);
            border: 1px solid rgba(192, 192, 192, 0.4);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }

        .gold-gradient {
            background: linear-gradient(135deg, #B8860B, #D4AF37, #FFEC8B, #D4AF37);
            border: 1px solid rgba(212, 175, 55, 0.4);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.2);
        }

        .silver-gradient {
            background: linear-gradient(135deg, #696969, #A8A8A8, #C0C0C0, #A8A8A8);
            border: 1px solid rgba(192, 192, 192, 0.4);
            box-shadow: 0 4px 15px rgba(192, 192, 192, 0.2);
        }

        .bronze-gradient {
            background: linear-gradient(135deg, #8B4513, #CD7F32, #D2691E, #CD7F32);
            border: 1px solid rgba(205, 127, 50, 0.4);
            box-shadow: 0 4px 15px rgba(205, 127, 50, 0.2);
        }

        .platinum-gradient:hover {
            background: linear-gradient(135deg, #FFFFFF, #E5E4E2, #8A8A8A, #C0C0C0);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 30px rgba(230, 230, 230, 0.4);
        }

        .gold-gradient:hover {
            background: linear-gradient(135deg, #FFEC8B, #D4AF37, #B8860B, #D4AF37);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
        }

        .silver-gradient:hover {
            background: linear-gradient(135deg, #C0C0C0, #A8A8A8, #696969, #A8A8A8);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 20px rgba(192, 192, 192, 0.3);
        }

        .bronze-gradient:hover {
            background: linear-gradient(135deg, #D2691E, #CD7F32, #8B4513, #CD7F32);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 20px rgba(205, 127, 50, 0.3);
        }

        .tier-title {
            font-size: 1.5rem;
            color: var(--gold);
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
            display: inline-block;
        }

        .tier-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        /* FAQ Section */
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: var(--gold);
        }

        .faq-question {
            padding: 1.5rem;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .faq-answer {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            color: var(--gray-300);
            line-height: 1.6;
            font-size: 1.2rem;
        }

        .faq-item.active .faq-answer {
            padding: 0 1.5rem 1.5rem;
            max-height: 500px;
        }

        .faq-icon {
            transition: transform 0.3s ease;
            color: var(--gold);
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        /* Location Section */
        .location-card {
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
            border-color: var(--gold);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .location-image {
            height: 250px;
            background: linear-gradient(135deg, #2A2A2A, #1A1A1A);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .location-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .location-info {
            padding: 2rem;
        }

        .location-feature {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: var(--gray-300);
        }

        .location-feature i {
            color: var(--gold);
            margin-right: 0.5rem;
            width: 20px;
        }

        /* Mobile Menu Styles */
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
        }

        .mobile-menu-link:hover {
            color: var(--gold);
            background: rgba(212, 175, 55, 0.1);
        }

        .mobile-menu-link:last-child {
            border-bottom: none;
        }

        /* Mobile menu button animation */
        .mobile-menu-button {
            transition: all 0.3s ease;
        }

        .mobile-menu-button.active {
            transform: rotate(90deg);
        }

        /* Footer Logo Styling */
        .footer-logo {
            height: 50px;
            width: auto;
            margin-bottom: 1rem;
            filter: brightness(1.1) saturate(1.2) sepia(0.3) hue-rotate(-5deg);
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
                        <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association Logo"
                            class="logo-glow">
                    </div>
                    <span class="ml-3 text-white text-2xl hidden md:block luxury-text">Indonesian Cat Association</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo e(url('/#home')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Home</a>
                    <a href="<?php echo e(url('/#about')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">About</a>
                    <a href="<?php echo e(url('/#speakers')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Speakers</a>
                    <a href="<?php echo e(url('/#schedule')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Schedule</a>
                    <a href="<?php echo e(url('/#location')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Location</a>
                    <a href="<?php echo e(url('/#sponsors')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Sponsors</a>
                    <a href="<?php echo e(route('events.index')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">Register</a>
                    <a href="<?php echo e(url('/#faq')); ?>" class="nav-link text-white hover:text-gold-400 transition text-lg">FAQ</a>
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
                    <a href="<?php echo e(url('/#home')); ?>" class="mobile-menu-link text-base">Home</a>
                    <a href="<?php echo e(url('/#about')); ?>" class="mobile-menu-link text-base">About</a>
                    <a href="<?php echo e(url('/#speakers')); ?>" class="mobile-menu-link text-base">Speakers</a>
                    <a href="<?php echo e(url('/#schedule')); ?>" class="mobile-menu-link text-base">Schedule</a>
                    <a href="<?php echo e(url('/#location')); ?>" class="mobile-menu-link text-base">Location</a>
                    <a href="<?php echo e(url('/#sponsors')); ?>" class="mobile-menu-link text-base">Sponsors</a>
                    <a href="<?php echo e(route('events.index')); ?>" class="mobile-menu-link text-base">Register</a>
                    <a href="<?php echo e(url('/#faq')); ?>" class="mobile-menu-link text-base">FAQ</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="footer-luxury py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <!-- Replaced text with logo image -->
                    <div class="logo-gold-outline" style="transform: scale(0.8); transform-origin: left;">
                        <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association Logo"
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
                    <h4 class="text-lg font-semibold text-white mb-4 luxury-heading">Quick Links</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="#home"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Home</a>
                        </li>
                        <li>
                            <a href="#about"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">About</a>
                        </li>
                        <li><a href="#speakers"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Speakers</a>
                        </li>
                        <li><a href="#schedule"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Schedule</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4 luxury-heading">More Info</h4>
                    <ul class="space-y-2">
                        <li><a href="#location"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Location</a>
                        </li>
                        <li><a href="#sponsors"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Sponsors</a>
                        </li>
                        <li><a href="#contact"
                                class="text-gray-400 hover:text-gold-400 transition luxury-text text-lg">Contact</a>
                        </li>
                        <li><a href="#faq"
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
                <p>&copy; 2025 Indonesian Cat Association. All rights reserved.</p>
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
<?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/layouts/app-regist.blade.php ENDPATH**/ ?>