<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indonesian Cat Association - Mukernas & Gala Dinner 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            font-family: 'Inter', sans-serif;
            background-color: var(--black);
            color: #fff;
            scroll-behavior: smooth;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
        
        .hero-bg {
            background-image: linear-gradient(rgba(10, 10, 10, 0.7), rgba(212, 175, 55, 0.2)), 
                              url('{{ asset('images/ica1.jpg') }}');
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
        
        .gold-accent {
            color: var(--gold);
        }
        
        .gold-border {
            border-color: var(--gold);
        }
        
        .gold-bg {
            background-color: var(--gold);
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
        
        .btn-outline-gold {
            border: 2px solid var(--gold);
            color: var(--gold);
            background: transparent;
            transition: all 0.3s ease;
        }
        
        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--black);
            transform: translateY(-2px);
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

        /* Schedule Section Styles */
        .schedule-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            border-bottom: 1px solid var(--medium-gray);
        }

        .schedule-tab {
            padding: 1rem 2rem;
            background: transparent;
            border: none;
            color: var(--gray-400);
            font-size: 1.1rem;
            font-weight: 500;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .schedule-tab.active {
            color: var(--gold);
        }

        .schedule-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gold);
        }

        .schedule-tab:hover:not(.active) {
            color: var(--light-gold);
        }

        .schedule-day {
            display: none;
        }

        .schedule-day.active {
            display: block;
        }

        .timeline-item {
            position: relative;
            padding: 2rem;
            margin-bottom: 2rem;
            background: linear-gradient(145deg, var(--dark-gray), var(--black));
            border: 1px solid var(--medium-gray);
            border-left: 4px solid var(--gold);
            border-radius: 0 8px 8px 0;
            transition: all 0.3s ease;
        }

        .timeline-item:hover {
            transform: translateX(10px);
            border-left-color: var(--light-gold);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .timeline-time {
            display: inline-block;
            background: var(--gold);
            color: var(--black);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .timeline-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: white;
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

        .tier-title {
            font-size: 1.5rem;
            font-weight: 600;
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
            font-size: 1.1rem;
            font-weight: 600;
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
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="nav-luxury fixed w-full z-50 py-4">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-bold gold-accent font-serif">ICA</span>
                    <span class="ml-2 text-white text-lg hidden md:block">Indonesian Cat Association</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="nav-link text-white hover:text-gold-400 transition">Home</a>
                    <a href="#about" class="nav-link text-white hover:text-gold-400 transition">About</a>
                    <a href="#speakers" class="nav-link text-white hover:text-gold-400 transition">Speakers</a>
                    <a href="#schedule" class="nav-link text-white hover:text-gold-400 transition">Schedule</a>
                    <a href="#location" class="nav-link text-white hover:text-gold-400 transition">Location</a>
                    <a href="#sponsors" class="nav-link text-white hover:text-gold-400 transition">Sponsors</a>
                    <a href="#contact" class="nav-link text-white hover:text-gold-400 transition">Contact</a>
                    <a href="#faq" class="nav-link text-white hover:text-gold-400 transition">FAQ</a>
                </div>
                <div class="md:hidden">
                    <button class="mobile-menu-button text-gold-400">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
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
                    <h3 class="text-xl font-bold gold-accent mb-4 font-serif">ICA</h3>
                    <p class="text-gray-400 mb-4">
                        The Indonesian Cat Association - Promoting feline excellence since 1990.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gold-400 transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-gold-400 transition">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-gold-400 transition">About</a></li>
                        <li><a href="#speakers" class="text-gray-400 hover:text-gold-400 transition">Speakers</a></li>
                        <li><a href="#schedule" class="text-gray-400 hover:text-gold-400 transition">Schedule</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">More Info</h4>
                    <ul class="space-y-2">
                        <li><a href="#location" class="text-gray-400 hover:text-gold-400 transition">Location</a></li>
                        <li><a href="#sponsors" class="text-gray-400 hover:text-gold-400 transition">Sponsors</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-gold-400 transition">Contact</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-gold-400 transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 gold-accent"></i>
                            <span>Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 gold-accent"></i>
                            <span>+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 gold-accent"></i>
                            <span>info@ica-indonesia.org</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-medium-gray mt-8 pt-8 text-center text-gray-500">
                <p>&copy; 2024 Indonesian Cat Association. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            alert('Mobile menu would open here. In a real implementation, this would toggle a menu.');
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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

        // Schedule Tab Functionality
        document.querySelectorAll('.schedule-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs and days
                document.querySelectorAll('.schedule-tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.schedule-day').forEach(d => d.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Show corresponding day
                const dayId = this.getAttribute('data-day');
                document.getElementById(dayId).classList.add('active');
            });
        });

        // FAQ Accordion Functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    </script>
</body>
</html>