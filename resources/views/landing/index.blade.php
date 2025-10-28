@extends('layouts.app')

@section('title', 'Welcome - YourBrand')

@section('content')
    <!-- Home/Hero Section -->
    <section id="home" class="hero-bg">
        <div class="max-w-7xl mx-auto px-4 text-center w-full">
            <div class="mb-8">
                <span class="text-gold-400 uppercase tracking-widest text-xl mb-4 inline-block">GALA DINNER & AWARDING NIGHT
                    ICA 2025
                </span>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-white">Indonesian</span>
                    <span class="gold-accent block">Cat Association</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-gold-200">
                    Metropolitan Catropolitan Style
                </p>
                <div class="space-x-4 space-y-4 md:space-y-0">
                    <a href="#contact" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-calendar-check mr-2"></i> Register Now
                    </a>
                    <a href="#schedule" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-clock mr-2"></i> View Schedule
                    </a>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#about" class="text-gold-400 text-2xl">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="section-title text-4xl font-bold mb-6 text-white">About ICA 2025</h2>
                    <p class="text-gray-300 mb-6 text-lg">
                        Agenda tahunan Mukernas & Gala Dinner ICA 2025 bertema "Metropolitan - CATROPOLITAN STYLE" hadir
                        dengan konsep baru yang kreatif dan berkelas.
                    </p>
                    <p class="text-gray-300 mb-6">
                        Kegiatan dibagi dua sesi: Mukernas (±60-100 peserta) dan Gala Dinner & Awarding (±100-300 peserta).
                    </p>
                    <p class="text-gray-300 mb-6">
                        Rangkaian acaranya meliputi pameran, seminar, pelatihan, serta edukasi seputar dunia kucing, dengan
                        puncak malam penghargaan bagi kucing terbaik nasional.
                    </p>
                    <p class="text-gray-300 mb-8">
                        Event ini bertujuan menjaring lebih banyak pencinta kucing untuk bergabung. Terbuka untuk umum —
                        mulai dari anggota ICA, kolektor, breeder, hingga masyarakat luas — acara ini dikemas modern,
                        interaktif, dan inspiratif.
                    </p>
                </div>
                <div class="bg-dark-gray rounded-lg overflow-hidden h-96 relative gold-border-frame image-hover-container">
                    <!-- Background image filling the entire container -->
                    <img src="{{ asset('images/ab-ICA.png') }}" alt="ICA Background"
                        class="absolute inset-0 w-full h-full object-cover">

                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black opacity-70"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Section -->
    <section id="speakers" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center w-full">

                <h2 class="section-title text-4xl font-bold mb-4 text-white">Visionary Voices of Catropolitan</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                    Meet the urban pioneers shaping the future of feline excellence in metropolitan style
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Speaker 1 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="icon-circle">
                        <i class="fas fa-crown text-2xl gold-accent"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white">Dr. Felina Whiskers</h3>
                    <p class="text-gold-400 mb-4">Feline Genetics Specialist</p>
                    <p class="text-gray-300">World-renowned expert in feline genetics with over 20 years of research
                        experience in breed development and health.</p>
                </div>

                <!-- Speaker 2 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="icon-circle">
                        <i class="fas fa-gem text-2xl gold-accent"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white">Thomas Pawlington</h3>
                    <p class="text-gold-400 mb-4">Cat Behaviorist & Trainer</p>
                    <p class="text-gray-300">Internationally acclaimed behaviorist transforming how we understand and
                        interact with our feline companions.</p>
                </div>

                <!-- Speaker 3 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="icon-circle">
                        <i class="fas fa-award text-2xl gold-accent"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white">Prof. Miaow Gonzalez</h3>
                    <p class="text-gold-400 mb-4">Veterinary Nutritionist</p>
                    <p class="text-gray-300">Pioneering researcher in feline nutrition, developing dietary solutions for
                        optimal health across all life stages.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="py-20 gold-pattern">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center w-full">

                <h2 class="section-title text-4xl font-bold mb-4 text-white">Event Schedule</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                    Three days of exclusive feline knowledge, networking, and celebration
                </p>
            </div>
            <!-- Schedule Tabs -->
            <div class="schedule-tabs">
                <button class="schedule-tab active" data-day="day1">
                    <i class="fas fa-calendar-day mr-2"></i>Day 1 - Nov 28
                </button>
                <button class="schedule-tab" data-day="day2">
                    <i class="fas fa-calendar-day mr-2"></i>GALA DINNER & AWARDING NIGHT
                </button>
                <button class="schedule-tab" data-day="day3">
                    <i class="fas fa-calendar-day mr-2"></i>Day 3 - Nov 30
                </button>
            </div>

            <!-- Day 1 Schedule -->
            <div class="schedule-day active" id="day1">
                <div class="timeline-item schedule-highlight schedule-highlight">
                    <span class="timeline-time">13:00 - 14:00</span>
                    <h3 class="timeline-title">Registrasi Peserta & Check-In Hotel</h3>
                    <p class="timeline-description">Panitia & EO</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:00 - 14:30</span>
                    <h3 class="timeline-title">Pembukaan Acara Mukernas ICA 2025</h3>
                    <p class="timeline-description">MC & Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:30 - 14:45</span>
                    <h3 class="timeline-title">Menyanyikan Lagu Indonesia Raya & Mars ICA</h3>
                    <p class="timeline-description">Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:45 - 15:15</span>
                    <h3 class="timeline-title">Sambutan Ketua Umum ICA</h3>
                    <p class="timeline-description">Russy Idroes</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">15:15 - 15:30</span>
                    <h3 class="timeline-title">Sambutan Perwakilan FIFA / Tamu Undangan</h3>
                    <p class="timeline-description">Undangan Khusus</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">15:30 - 16:00</span>
                    <h3 class="timeline-title">Doa & Pembukaan Resmi Mukernas</h3>
                    <p class="timeline-description">Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">16:00 - 16:15</span>
                    <h3 class="timeline-title">Coffee Break</h3>
                    <p class="timeline-description">EO</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">16:15 - 18:00</span>
                    <h3 class="timeline-title">Sidang Pleno 1 : Laporan Pertanggungjawaban Pengurus</h3>
                    <p class="timeline-description">Steering Committee</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">18:00 - 19:30</span>
                    <h3 class="timeline-title">Istirahat / Makan Malam</h3>
                    <p class="timeline-description">Panitia Hotel</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:30 - 21:30</span>
                    <h3 class="timeline-title">Sesi Diskusi Bebas / Networking Night</h3>
                    <p class="timeline-description">Panitia & EO</p>
                </div>
            </div>

            <!-- Day 2 Schedule -->
            <div class="schedule-day" id="day2">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:00 - 19:30</span>
                    <h3 class="timeline-title">Kedatangan Tamu & Welcome Drink</h3>
                    <p class="timeline-description">EO & Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:30 - 19:45</span>
                    <h3 class="timeline-title">Pembukaan Gala Dinner oleh MC</h3>
                    <p class="timeline-description">EO</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:45 - 20:00</span>
                    <h3 class="timeline-title">Opening Dance "Metropolitan Glamour"</h3>
                    <p class="timeline-description">EO Dancer Team</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:00 - 20:15</span>
                    <h3 class="timeline-title">Sambutan Ketua Umum ICA</h3>
                    <p class="timeline-description">Russy Idroes</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:15 - 20:30</span>
                    <h3 class="timeline-title">Sambutan Perwakilan Sponsor</h3>
                    <p class="timeline-description">Sponsor</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:30 - 21:00</span>
                    <h3 class="timeline-title">Makan Malam & Hiburan Musik</h3>
                    <p class="timeline-description">Band / Singer</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">21:00 - 22:00</span>
                    <h3 class="timeline-title">Awarding Session - Penghargaan Kucing & Owner</h3>
                    <p class="timeline-description">EO & Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:00 - 22:15</span>
                    <h3 class="timeline-title">Doorprize Session</h3>
                    <p class="timeline-description">MC & Sponsor</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:15 - 22:30</span>
                    <h3 class="timeline-title">Fashion Parade "Catropolitan Look"</h3>
                    <p class="timeline-description">EO</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:30 - 23:00</span>
                    <h3 class="timeline-title">Penutupan, Foto Bersama & Live Music</h3>
                    <p class="timeline-description">EO & Panitia</p>
                </div>
            </div>

            <!-- Day 3 Schedule -->
            <div class="schedule-day" id="day3">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">07:30 - 08:30</span>
                    <h3 class="timeline-title">Sarapan Pagi</h3>
                    <p class="timeline-description">Panitia Hotel</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">08:30 - 09:00</span>
                    <h3 class="timeline-title">Evaluasi & Penutupan Mukernas</h3>
                    <p class="timeline-description">Steering Committee</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">09:00 - 09:30</span>
                    <h3 class="timeline-title">Pembacaan Keputusan Mukernas 2025</h3>
                    <p class="timeline-description">Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">09:30 - 10:00</span>
                    <h3 class="timeline-title">Penutupan Resmi & Doa Bersama</h3>
                    <p class="timeline-description">Panitia</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">10.00 - 12:00</span>
                    <h3 class="timeline-title">Check-out Hotel & Acara Bebas / City Tour Opsional</h3>
                    <p class="timeline-description">EO</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl font-bold mb-4 text-white">Event Location</h2>
                <p class="text-xl mb-12 max-w-3xl mx-auto text-gold-200">
                    Experience luxury at Harris Hotel, Kuta Bali
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="location-card">
                    <div class="location-image">
                        <!-- Embedded Google Maps yang langsung ke Larger Map -->
                        <a href="https://www.google.com/maps/place/HARRIS+Hotel+%26+Residence+Riverview+Kuta+Bali/@-8.7178282,115.1808951,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd246b0d51711e9:0x3037c24b5e7fb3cd!8m2!3d-8.7178282!4d115.1808951!16s%2Fg%2F1tnmcc3x?entry=ttu"
                            target="_blank" rel="noopener noreferrer"
                            class="absolute inset-0 w-full h-full block cursor-pointer">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.715321392635!2d115.1783202!3d-8.7178229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246b0d51711e9%3A0x3037c24b5e7fb3cd!2sHARRIS%20Hotel%20%26%20Residence%20Riverview%20Kuta%20Bali!5e0!3m2!1sen!2sid!4v1698765432100!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-full transition-all duration-300">
                            </iframe>
                        </a>
                        <div class="location-overlay"></div>

                        <!-- Hover effect overlay -->
                        <div
                            class="absolute inset-0 bg-gold-400/0 hover:bg-gold-400/10 transition-all duration-300 flex items-center justify-center pointer-events-none">
                            <div
                                class="bg-black/90 rounded-xl p-4 transform scale-95 opacity-0 hover:scale-100 hover:opacity-100 transition-all duration-300 border-2 border-gold-400">
                                <div class="flex items-center text-white">
                                    <i class="fas fa-expand-arrows-alt text-gold-400 text-xl mr-3"></i>
                                    <div class="text-left">
                                        <div class="font-bold text-gold-400">View Larger Map</div>
                                        <div class="text-xs text-gray-300 mt-1">Click to open full screen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="location-info">
                        <h3 class="text-2xl font-bold text-white mb-4">HARRIS Hotel & Residence Riverview Kuta Bali</h3>
                        <p class="text-gray-300 mb-4"> Pilihan ideal untuk acara dan liburan, dengan ruang luas, layanan
                            profesional, serta lokasi strategis yang memudahkan akses ke destinasi utama di Kuta.
                        </p>

                        <div class="location-feature">
                            <i class="fas fa-location-dot"></i>
                            <span>Jl. Raya Kuta Tidak. 62A , Badung, Bali, Indonesia 80361</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-phone"></i>
                            <span>+62 361 761 007</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-bed"></i>
                            <span>Kamar dan unit residence yang luas dan nyaman</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-utensils"></i>
                            <span>Restoran dengan menu sarapan dan pilihan kuliner beragam</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-user-friends"></i>
                            <span>Pelayanan ramah dan suasana santai cocok untuk keluarga</span>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <!-- Get Directions Button dengan link yang benar -->
                            <a href="https://www.google.com/maps/dir//HARRIS+Hotel+%26+Residence+Riverview+Kuta+Bali,+Jalan+Raya+Kuta+No.+99,+Kuta,+Bali+80361/@-8.7178282,115.1808951,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd246b0d51711e9:0x3037c24b5e7fb3cd!2m2!1d115.1808951!2d-8.7178282?entry=ttu"
                                target="_blank" rel="noopener noreferrer"
                                class="btn-gold px-6 py-3 rounded-lg font-semibold inline-block transition-all duration-300 hover:scale-105 flex-1 text-center">
                                <i class="fas fa-directions mr-2"></i> Get Directions
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-white mb-6">Venue Highlights</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-star text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold">Strategic Kuta Location</h4>
                                <p class="text-gray-300">Terletak di jantung kawasan Kuta, dekat pantai, pusat perbelanjaan,
                                    dan destinasi wisata populer.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-users text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold">Fasilitas Modern</h4>
                                <p class="text-gray-300">Dilengkapi ballroom luas, ruang meeting modern, serta fasilitas
                                    lengkap untuk acara bisnis dan sosial.

                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-film text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold">Beberapa Kolam Renang</h4>
                                <p class="text-gray-300">Nikmati kolam renang dengan area anak dan dewasa, cocok untuk
                                    bersantai sebelum atau sesudah acara.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-concierge-bell text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold">HARRIS Cafe & Catering</h4>
                                <p class="text-gray-300">Professional staff to ensure your event runs smoothly</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-paw text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold">Feline-Friendly Setup</h4>
                                <p class="text-gray-300">Specially designed areas for cat demonstrations and exhibitions</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Location Info -->
                    <div class="mt-8 p-6 bg-dark-gray rounded-lg border border-medium-gray">
                        <h4 class="text-white font-semibold mb-3 flex items-center">
                            <i class="fas fa-info-circle text-gold-400 mr-2"></i>
                            Location Advantages
                        </h4>
                        <ul class="text-gray-300 space-y-2 text-sm">

                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span>Strategically located in central Kuta, near main roads and attractions</span>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-shopping-bag text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span>Close to Beachwalk Shopping Center and local souvenir markets</span>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-umbrella-beach text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span>Approximately 10 minutes drive to Kuta Beach and Legian Beach</span>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-plane-departure text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span>Only 15 minutes from Ngurah Rai International Airport</span>
                            </li>

                            <li class="flex items-start">
                                <i class="fas fa-concierge-bell text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span>Easy access to restaurants, cafés, and entertainment venues around Kuta</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section id="sponsors" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl font-bold mb-4 text-white">Our Esteemed Sponsors</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                    Generously supported by industry leaders in feline care and innovation
                </p>
            </div>

            <!-- Platinum Sponsors -->
            <div class="sponsor-tier">
                <h3 class="tier-title">Platinum Sponsors</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold">PurrfectCare</div>
                    </div>
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold">WhiskerTech</div>
                    </div>
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold">RoyalFeline</div>
                    </div>
                </div>
            </div>

            <!-- Gold Sponsors -->
            <div class="sponsor-tier">
                <h3 class="tier-title">Gold Sponsors</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold">CatNation</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold">PawPrint</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold">MeowMix Pro</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold">FelineWell</div>
                    </div>
                </div>
            </div>

            <!-- Silver Sponsors -->
            <div class="sponsor-tier">
                <h3 class="tier-title">Silver Sponsors</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white">KittyCorp</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white">Paws & Claws</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white">CatHaven</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white">PurrFactory</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white">MeowMart</div>
                    </div>
                </div>
            </div>

            <!-- Bronze Sponsors (New) -->
            <div class="sponsor-tier">
                <h3 class="tier-title">Bronze Sponsors</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">FelineFriends</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">Catopia</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">WhiskerWonders</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">PawPals</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">MeowMingle</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white">CatCompanions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-4 text-white">Secure Your Invitation</h2>
            <p class="text-xl text-center mb-12 text-gold-200">
                Join the most exclusive feline event of the year
            </p>

            @if (session('success'))
                <div class="bg-green-900 border border-green-700 text-green-200 px-6 py-4 rounded mb-8">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST"
                class="form-luxury bg-dark-gray border border-medium-gray p-10 rounded-lg shadow-2xl">
                @csrf
                <div class="mb-8">
                    <label for="name" class="block text-gold-200 mb-3 text-lg">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-5 py-4 rounded-lg focus:outline-none"
                        value="{{ old('name') }}" placeholder="Enter your full name">
                    @error('name')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="email" class="block text-gold-200 mb-3 text-lg">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-5 py-4 rounded-lg focus:outline-none" value="{{ old('email') }}"
                        placeholder="Enter your email address">
                    @error('email')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-gold-200 mb-3 text-lg">Message</label>
                    <textarea id="message" name="message" required rows="5"
                        class="w-full px-5 py-4 rounded-lg focus:outline-none"
                        placeholder="Tell us about your interest in the event">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full btn-gold py-4 rounded-lg font-semibold text-lg transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Send Request
                </button>
            </form>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title text-4xl font-bold text-center mb-4 text-white">Frequently Asked Questions</h2>
            <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                Everything you need to know about ICA 2025
            </p>

            <div class="faq-container">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is the dress code for the event?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Day sessions: Business casual. Evening events: Cocktail attire or black-tie optional for
                            the Gala
                            Dinner. We encourage elegant feline-themed accessories!</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Are there accommodation packages available?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We have partnered with The Grand Jakarta Hotel for special rates. You can book
                            through our
                            registration portal with 15% discount for ICA attendees.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can I bring my cat to the event?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>For health and safety reasons, personal pets are not allowed at the main conference
                            sessions.
                            However, we will have designated demonstration areas with show cats and special feline
                            guests.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What payment methods do you accept?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept all major credit cards, bank transfers, and online payment platforms. Payment
                            plans are
                            available for early bird registrations.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Is there a refund policy?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Full refunds are available up to 30 days before the event. After that, 50% refund until
                            15 days
                            before. No refunds within 14 days of the event, but registration is transferable.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Will sessions be recorded for later viewing?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! All main stage presentations will be recorded and available to registered attendees
                            for 3
                            months after the event. Breakout sessions may not all be recorded.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection