<?php $__env->startSection('title', 'Welcome - Indonesian Cat Association'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Home/Hero Section -->
    <section id="home" class="hero-bg pt-20">
        <div class="max-w-7xl mx-auto px-4 text-center w-full ">
            <div class="mb-8">
                <span class="text-gold-400 uppercase tracking-widest text-3xl mb-4 inline-block">
                    GALA DINNER, EXPO & ICA AWARDS 2025
                </span>
                <h1 class="text-6xl md:text-8xl font-bold mb-6 leading-tight">
                    <span class="text-white">Indonesian</span>
                    <span class="gold-accent block">Cat Association</span>
                </h1>
                <p class="text-xl md:text-3xl mb-8 max-w-3xl mx-auto text-gold-200">
                    Catropolitan Style
                </p>
                <div class="space-x-4 space-y-4 md:space-y-0">
                    <a href="#registration"
                        class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block no-underline">
                        <i class="fas fa-clipboard-list mr-2"></i> Daftar Sekarang
                    </a>
                    <a href="#schedule"
                        class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block no-underline">
                        <i class="fas fa-clock mr-2"></i> Lihat Jadwal
                    </a>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#events" class="text-gold-400 text-2xl">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 paw">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="section-title text-4xl font-bold mb-6 text-white">Tentang ICA</h2>
                    <p class="text-gray-300 mb-6 text-lg luxury-text">
                        Kucing bukan sekadar hewan peliharaan, melainkan bagian dari gaya hidup dan komunitas yang
                        berkembang
                        pesat di Indonesia. Melalui Indonesian Cat Association (ICA) bekerjasama dengan Persatuan Dokter
                        Hewan
                        Indonesia (PDHI), kami berupaya mempertemukan para pecinta kucing, breeder profesional, pelaku
                        industri
                        pet care, serta masyarakat umum dalam satu ajang prestisius tingkat nasional.
                    </p>
                    <p class="text-gray-300 mb-6 text-lg luxury-text">
                        Dengan bangga, ICA menyelenggarakan Mukernas ICA 2025 serta perayaan tahunan bergengsi
                        “Gala Dinner, Expo & ICA Awards 2025”. Selama tiga hari, acara ini menjadi ajang mempererat
                        jejaring breeder, komunitas, dan mitra industri pet care dalam membangun ekosistem pecinta
                        kucing di Indonesia, sekaligus menghadirkan pengalaman berkelas dan berkesan bagi seluruh peserta.
                    </p>
                </div>
                <div class="bg-dark-gray rounded-lg overflow-hidden h-96 relative gold-border-frame image-hover-container">
                    <!-- Background image filling the entire container -->
                    <img src="<?php echo e(asset('images/ab-ICA.png')); ?>" alt="ICA Background"
                        class="absolute inset-0 w-full h-full object-cover">

                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black opacity-70"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="pt-16 pb-32 bg-dark-gray">
        <div class="container mx-auto px-4 mt-20">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h2 class="section-title text-4xl md:text-5xl font-bold mb-4 text-white">
                    RANGKAIAN ACARA UTAMA
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-gold to-dark-gold mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto text-gold-200">
                    Empat acara spektakuler yang penuh dengan edukasi, hiburan, dan penghargaan untuk komunitas kucing
                    Indonesia
                </p>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">

                <!-- Event 1: MUKERNAS -->
                <div
                    class="card-luxury rounded-lg p-8 transition-all duration-300 transform hover:-translate-y-2 min-h-[300px]">
                    <div class="p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center text-black font-bold text-lg gold-number-gradient flex-shrink-0">
                                    1
                                </div>
                                <h3 class="text-2xl font-bold text-white ml-4">MUKERNAS ICA 2025</h3>
                            </div>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Laporan kerja, evaluasi, dan penyusunan program 2026 untuk kemajuan komunitas kucing Indonesia.
                        </p>
                        <div class="mt-6 flex items-center gold-text-gradient">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span class="font-semibold">Sesi Strategi & Perencanaan</span>
                        </div>
                    </div>
                </div>

                <!-- Event 2: EXPO -->
                <div
                    class="card-luxury rounded-lg p-8 transition-all duration-300 transform hover:-translate-y-2 min-h-[300px]">
                    <div class="p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center text-black font-bold text-lg gold-number-gradient flex-shrink-0">
                                    2
                                </div>
                                <h3 class="text-2xl font-bold text-white ml-4">EXPO</h3>
                            </div>
                        </div>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            <strong>Seminar, Pameran dan Edukasi</strong> - Pameran produk untuk kucing, seminar,
                            pemeriksaan kesehatan, pemberian obat kutu & obat cacing gratis.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-3 py-1 gold-badge-gradient text-black rounded-full text-sm font-medium">Seminar</span>
                            <span
                                class="px-3 py-1 gold-badge-gradient text-black rounded-full text-sm font-medium">Pameran</span>
                            <span
                                class="px-3 py-1 gold-badge-gradient text-black rounded-full text-sm font-medium">Kesehatan
                                Gratis</span>
                        </div>
                    </div>
                </div>

                <!-- Event 3: GALA DINNER -->
                <div
                    class="card-luxury rounded-lg p-8 transition-all duration-300 transform hover:-translate-y-2 min-h-[300px]">
                    <div class="p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center text-black font-bold text-lg gold-number-gradient flex-shrink-0">
                                    3
                                </div>
                                <h3 class="text-2xl font-bold text-white ml-4">GALA DINNER & ICA AWARDS 2025</h3>
                            </div>
                        </div>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Malam penghargaan dan hiburan tematik <strong>"Cartopolitan Style"</strong> yang penuh kejutan
                            dan kemewahan.
                        </p>
                        <div class="flex items-center gold-text-gradient mb-2">
                            <i class="fas fa-trophy mr-2"></i>
                            <span class="font-semibold">Malam Penghargaan & Hiburan</span>
                        </div>
                        <div class="flex items-center gold-text-gradient">
                            <i class="fas fa-star mr-2"></i>
                            <span class="font-semibold">Tema: Cartopolitan Style</span>
                        </div>
                    </div>
                </div>

                <!-- Event 4: YEARBOOK -->
                <div
                    class="card-luxury rounded-lg p-8 transition-all duration-300 transform hover:-translate-y-2 min-h-[300px]">
                    <div class="p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-lg flex items-center justify-center text-black font-bold text-lg gold-number-gradient flex-shrink-0">
                                    4
                                </div>
                                <h3 class="text-2xl font-bold text-white ml-4">YEARBOOK & NETWORKING SESSION</h3>
                            </div>
                        </div>
                        <p class="text-gray-300 leading-relaxed mb-4">
                            Profil owner & kucing berprestasi; kesempatan promosi eksklusif bagi sponsor dan jaringan
                            profesional.
                        </p>
                        <div class="flex items-center gold-text-gradient mb-2">
                            <i class="fas fa-book mr-2"></i>
                            <span class="font-semibold">Profil Eksklusif</span>
                        </div>
                        <div class="flex items-center gold-text-gradient">
                            <i class="fas fa-handshake mr-2"></i>
                            <span class="font-semibold">Networking Opportunity</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Section -->
    <section id="speakers" class="py-16 mt-20 paw">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center w-full mb-12">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Para Pembicara Visioner</h2>
                
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Speaker 1 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="speaker-image-container mb-6">
                        <img src="<?php echo e(asset('images/wayan.jpg')); ?>" alt="DR. IR. I WAYAN KOSTER, M.M" class="speaker-image">
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white luxury-heading">DR. IR. I WAYAN KOSTER, M.M</h3>
                    <p class="text-gold-400 mb-4 luxury-text text-lg">GUBERNUR BALI</p>
                    <hr><br>
                    <p class="text-gray-300 luxury-text text-lg">I Wayan Koster, Gubernur Bali, dikenal karena komitmennya
                        menjaga
                        budaya, lingkungan, dan pembangunan berkelanjutan berbasis kearifan lokal. Di bawah kepemimpinannya,
                        Bali menyeimbangkan kemajuan ekonomi, kelestarian alam, dan nilai tradisi, menjadikannya model
                        pembangunan
                        berakar pada identitas lokal.</p>
                </div>

                <!-- Speaker 2 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="speaker-image-container mb-6">
                        <img src="<?php echo e(asset('images/russy.jpg')); ?>" alt="RUSSY IDROES, S.KOM. M.M." class="speaker-image">
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white luxury-heading"> RUSSY IDROES, S.KOM. M.M.</h3>
                    <p class="text-gold-400 mb-4 luxury-text text-lg">KETUA UMUM ICA</p>
                    <hr><br>
                    <p class="text-gray-300 luxury-text text-lg">Russy Idroes, pendiri Indonesian Cat Association (ICA) dan
                        Ketua
                        Umum periode 2024 - 2027, merupakan tokoh penting dalam perkembangan dunia perkucingan Indonesia.
                        Sebagai juri kucing non-Eropa yang diakui Fédération Internationale Féline (FIFe), ia berperan besar
                        membawa ICA menuju pengakuan internasional dan memperkuat komunitas pecinta kucing Indonesia di
                        kancah global.</p>
                </div>

                <!-- Speaker 3 -->
                <div class="card-luxury rounded-lg p-8 text-center">
                    <div class="speaker-image-container mb-6">
                        <img src="<?php echo e(asset('images/munawaroh.jpg')); ?>" alt="DR. DRH. MUHAMMAD MUNAWAROH, M.M."
                            class="speaker-image">
                    </div>
                    <h3 class="text-2xl font-semibold mb-2 text-white luxury-heading"> DR. DRH. MUHAMMAD MUNAWAROH, M.M.
                    </h3>
                    <p class="text-gold-400 mb-4 luxury-text text-lg">KETUA UMUM PDHI</p>
                    <hr><br>
                    <p class="text-gray-300 luxury-text text-lg">Munawaroh, dokter hewan dan akademisi, dikenal atas
                        kepemimpinannya dalam
                        memperkuat profesi veteriner di Indonesia. Sebagai Ketua Umum PDHI, ia berperan aktif meningkatkan
                        kompetensi
                        dokter hewan serta mendorong kolaborasi antara akademisi, pemerintah, dan komunitas untuk mewujudkan
                        kesejahteraan
                        hewan berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="py-16 gold-pattern">
        <div class="max-w-3xl mx-auto px-4 mt-20">
            <div class="text-center mb-16">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Jadwal Event</h2>
                <p class="text-xl text-center mb-12 max-w-2xl mx-auto text-gold-200 luxury-text">
                    Tiga hari seru untuk menambah pengetahuan tentang kucing, menjalin koneksi, dan merayakan komunitas
                    pecinta kucing.
                </p>
            </div>
            <!-- Schedule Tabs -->
            <div class="schedule-tabs">
                <button class="schedule-tab active text-button" data-day="day1">
                    <i class="fas fa-calendar-day mr-2"></i>Hari 1 - 28 Nov
                </button>
                <button class="schedule-tab text-button" data-day="day2">
                    <i class="fas fa-calendar-day mr-2"></i>Hari 2 - 29 Nov
                </button>
                <button class="schedule-tab text-button" data-day="day3">
                    <i class="fas fa-calendar-day mr-2"></i>Hari 3 - 30 Nov
                </button>
            </div>

            <!-- Day 1 Schedule -->
            <div class="schedule-day active" id="day1">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">13:00 - 14:00</span>
                    <h3 class="timeline-title">Registrasi Peserta & Check-In Hotel</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:00 - 14:30</span>
                    <h3 class="timeline-title">Pembukaan Acara Mukernas ICA 2025</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:30 - 14:45</span>
                    <h3 class="timeline-title">Menyanyikan Lagu Indonesia Raya & Mars ICA</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">14:45 - 15:15</span>
                    <h3 class="timeline-title">Sambutan Ketua Umum ICA</h3>
                    <p class="timeline-description">Russy Idroes, S.KOM. M.M.</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">15:15 - 15:30</span>
                    <h3 class="timeline-title">Sambutan Perwakilan FIFA / Tamu Undangan</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">15:30 - 16:00</span>
                    <h3 class="timeline-title">Doa & Pembukaan Resmi Mukernas</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">16:00 - 16:15</span>
                    <h3 class="timeline-title">Coffee Break</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">16:15 - 18:00</span>
                    <h3 class="timeline-title">Sidang Pleno 1 : Laporan Pertanggungjawaban Pengurus</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">18:00 - 19:30</span>
                    <h3 class="timeline-title">Istirahat / Makan Malam</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:30 - 21:30</span>
                    <h3 class="timeline-title">Sesi Diskusi Bebas / Networking Night</h3>
                </div>
            </div>

            <!-- Day 2 Schedule -->
            <div class="schedule-day" id="day2">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:00 - 19:30</span>
                    <h3 class="timeline-title">Kedatangan Tamu & Welcome Drink</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:30 - 19:45</span>
                    <h3 class="timeline-title">Pembukaan Gala Dinner oleh MC</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:45 - 20:00</span>
                    <h3 class="timeline-title">Opening Dance "Metropolitan Glamour"</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:00 - 20:15</span>
                    <h3 class="timeline-title">Sambutan Ketua Umum ICA</h3>
                    <p class="timeline-description">Russy Idroes, S.KOM. M.M.</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:15 - 20:30</span>
                    <h3 class="timeline-title">Sambutan Perwakilan Sponsor</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">20:30 - 21:00</span>
                    <h3 class="timeline-title">Makan Malam & Hiburan Musik</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">21:00 - 22:00</span>
                    <h3 class="timeline-title">Awarding Session - Penghargaan Kucing & Owner</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:00 - 22:15</span>
                    <h3 class="timeline-title">Doorprize Session</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:15 - 22:30</span>
                    <h3 class="timeline-title">Fashion Parade "Catropolitan Look"</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">22:30 - 23:00</span>
                    <h3 class="timeline-title">Penutupan, Foto Bersama & Live Music</h3>
                </div>
            </div>

            <!-- Day 3 Schedule -->
            <div class="schedule-day" id="day3">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">07:30 - 08:30</span>
                    <h3 class="timeline-title">Sarapan Pagi</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">08:30 - 09:00</span>
                    <h3 class="timeline-title">Evaluasi & Penutupan Mukernas</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">09:00 - 09:30</span>
                    <h3 class="timeline-title">Pembacaan Keputusan Mukernas 2025</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">09:30 - 10:00</span>
                    <h3 class="timeline-title">Penutupan Resmi & Doa Bersama</h3>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">10.00 - 12:00</span>
                    <h3 class="timeline-title">Check-out Hotel & Acara Bebas / City Tour Opsional</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="py-20 paw">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center w-full mb-12">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Lokasi Event</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-start">
                <!-- Maps Section -->
                <div class="space-y-6">
                    <div class="location-card">
                        <div class="location-image h-64"> <!-- Tinggi disamakan -->
                            <a href="https://www.google.com/maps/place/HARRIS+Hotel+%26+Residence+Riverview+Kuta+Bali/@-8.7178282,115.1808951,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd246b0d51711e9:0x3037c24b5e7fb3cd!8m2!3d-8.7178282!4d115.1808951!16s%2Fg%2F1tnmcc3x?entry=ttu"
                                target="_blank" rel="noopener noreferrer"
                                class="absolute inset-0 w-full h-full block cursor-pointer">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.715321392635!2d115.1783202!3d-8.7178229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246b0d51711e9%3A0x3037c24b5e7fb3cd!2sHARRIS%20Hotel%20%26%20Residence%20Riverview%20Kuta%20Bali!5e0!3m2!1sen!2sid!4v1698765432100!5m2!1sen!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                                </iframe>
                            </a>
                        </div>
                        <div class="location-info mt-6">
                            <h3 class="text-2xl font-bold text-white mb-4 luxury-heading">HARRIS Hotel & Residence
                                Riverview
                                Kuta Bali</h3>

                            <div class="location-feature">
                                <i class="fas fa-location-dot"></i>
                                <span class="luxury-text text-lg">Jl. Raya Kuta No. 62A, Badung, Bali, Indonesia
                                    80361</span>
                            </div>

                            <div class="mt-6">
                                <a href="https://www.google.com/maps/dir//HARRIS+Hotel+%26+Residence+Riverview+Kuta+Bali,+Jalan+Raya+Kuta+No.+99,+Kuta,+Bali+80361/@-8.7178282,115.1808951,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd246b0d51711e9:0x3037c24b5e7fb3cd!2m2!1d115.1808951!2d-8.7178282?entry=ttu"
                                    target="_blank" rel="noopener noreferrer"
                                    class="btn-gold px-6 py-3 rounded-lg font-semibold inline-block transition-all duration-300 hover:scale-105 w-full text-center no-underline">
                                    <i class="fas fa-directions mr-2"></i> Lihat Rute
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Images Section -->
                <!-- Hotel Images Section -->
                <div class="space-y-6">
                    <div class="bg-dark-gray rounded-2xl overflow-hidden gold-border-frame h-64"
                        style="transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'"
                        onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo e(asset('images/harris1.jpg')); ?>" alt="Harris Hotel Kuta Bali - Eksterior"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="bg-dark-gray rounded-2xl overflow-hidden gold-border-frame h-64"
                        style="transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'"
                        onmouseout="this.style.transform='scale(1)'">
                        <img src="<?php echo e(asset('images/harris2.webp')); ?>" alt="Harris Hotel Kuta Bali - Interior"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section id="sponsors" class="py-16 gold-pattern section-padding">
        <div class="max-w-4xl mx-auto px-4 mt-20">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl font-bold mb-4 text-white">Para Sponsor</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200 luxury-text">
                    Didukung dengan penuh semangat oleh para pemimpin industri dalam perawatan dan inovasi dunia kucing
                </p>
            </div>

            <?php
                use App\Models\Sponsor;
                $platinumSponsors = Sponsor::byTier('platinum')->get();
                $goldSponsors = Sponsor::byTier('gold')->get();
                $silverSponsors = Sponsor::byTier('silver')->get();
                $bronzeSponsors = Sponsor::byTier('bronze')->get();
            ?>

            <!-- Platinum Sponsors -->
            <?php if($platinumSponsors->count() > 0): ?>
                <div class="sponsor-tier mb-8">
                    <h3 class="tier-title">Sponsor Platinum</h3>
                    <div class="sponsor-grid">
                        <?php $__currentLoopData = $platinumSponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sponsor-card platinum-gradient">
                                <?php if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)): ?>
                                    <img src="<?php echo e(Storage::url($sponsor->logo)); ?>" alt="<?php echo e($sponsor->name); ?>"
                                        class="sponsor-logo"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <?php endif; ?>
                                <div
                                    class="sponsor-name <?php echo e($sponsor->logo && Storage::disk('public')->exists($sponsor->logo) ? 'd-none' : ''); ?>">
                                    <?php echo e($sponsor->name); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Repeat untuk Gold, Silver, Bronze dengan pattern yang sama -->
            <!-- Gold Sponsors -->
            <?php if($goldSponsors->count() > 0): ?>
                <div class="sponsor-tier mb-8">
                    <h3 class="tier-title">Sponsor Gold</h3>
                    <div class="sponsor-grid">
                        <?php $__currentLoopData = $goldSponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sponsor-card gold-gradient">
                                <?php if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)): ?>
                                    <img src="<?php echo e(Storage::url($sponsor->logo)); ?>" alt="<?php echo e($sponsor->name); ?>"
                                        class="sponsor-logo"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <?php endif; ?>
                                <div
                                    class="sponsor-name <?php echo e($sponsor->logo && Storage::disk('public')->exists($sponsor->logo) ? 'd-none' : ''); ?>">
                                    <?php echo e($sponsor->name); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Silver Sponsors -->
            <?php if($silverSponsors->count() > 0): ?>
                <div class="sponsor-tier mb-8">
                    <h3 class="tier-title">Sponsor Silver</h3>
                    <div class="sponsor-grid">
                        <?php $__currentLoopData = $silverSponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sponsor-card silver-gradient">
                                <?php if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)): ?>
                                    <img src="<?php echo e(Storage::url($sponsor->logo)); ?>" alt="<?php echo e($sponsor->name); ?>"
                                        class="sponsor-logo"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <?php endif; ?>
                                <div
                                    class="sponsor-name <?php echo e($sponsor->logo && Storage::disk('public')->exists($sponsor->logo) ? 'd-none' : ''); ?>">
                                    <?php echo e($sponsor->name); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Bronze Sponsors -->
            <?php if($bronzeSponsors->count() > 0): ?>
                <div class="sponsor-tier mb-8">
                    <h3 class="tier-title">Sponsor Bronze</h3>
                    <div class="sponsor-grid">
                        <?php $__currentLoopData = $bronzeSponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="sponsor-card bronze-gradient">
                                <?php if($sponsor->logo && Storage::disk('public')->exists($sponsor->logo)): ?>
                                    <img src="<?php echo e(Storage::url($sponsor->logo)); ?>" alt="<?php echo e($sponsor->name); ?>"
                                        class="sponsor-logo"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <?php endif; ?>
                                <div
                                    class="sponsor-name <?php echo e($sponsor->logo && Storage::disk('public')->exists($sponsor->logo) ? 'd-none' : ''); ?>">
                                    <?php echo e($sponsor->name); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(
                $platinumSponsors->count() == 0 &&
                    $goldSponsors->count() == 0 &&
                    $silverSponsors->count() == 0 &&
                    $bronzeSponsors->count() == 0): ?>
                <div class="text-center py-8">
                    <p class="text-gold-200 text-lg">Sponsor akan segera diumumkan</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 gold-pattern paw">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Tanya Jawab</h2>
                <p class="text-xl text-center mb-12 max-w-2xl mx-auto text-gold-200 luxury-text">
                    Informasi lengkap tentang acara ICA 2025
                </p>
            </div>
            <div class="faq-container">
                <!-- FAQ Item 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>1. Apa itu acara ICA 2025?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">Acara ini merupakan kegiatan tahunan yang diadakan oleh Indonesian Cat
                            Association (ICA)
                            bekerja sama dengan Persatuan Dokter Hewan Indonesia (PDHI). Tujuannya adalah mempertemukan para
                            pecinta kucing,
                            breeder profesional, pelaku industri pet care, dan masyarakat umum dalam satu ajang nasional
                            yang edukatif dan inspiratif.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>2. Kapan dan di mana acara ICA 2025 dilaksanakan?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">Acara akan diselenggarakan pada 28 - 30 November 2025 di HARRIS Hotel &
                            Residence Riverview, Bali.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>3. Siapa saja yang bisa ikut serta dalam acara ini?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">Semua pecinta kucing dapat ikut serta, mulai dari pemilik kucing, breeder,
                            komunitas,
                            pelaku usaha di bidang pet care, hingga masyarakat umum yang tertarik untuk mengenal dunia
                            kucing lebih dalam.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>4. Siapa saja tokoh utama yang terlibat?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">
                            • <strong>Russy Idroes, S.Kom., M.M.</strong> : Ketua Umum ICA, pendiri ICA, sekaligus juri
                            internasional yang diakui Fédération Internationale Féline (FIFe).<br>
                            • <strong>Dr. Ir. I Wayan Koster, M.M.</strong> : Gubernur Bali, yang mendukung penyelenggaraan
                            acara ini sebagai bagian dari promosi pariwisata dan kegiatan nasional di Bali.<br>
                            • <strong>Dr. Drh. Muhammad Munawaroh, M.M.</strong> : Ketua Umum PDHI, yang turut berperan
                            aktif dalam mendukung kolaborasi antara ICA dan PDHI untuk kemajuan dunia pet care dan kesehatan
                            hewan di Indonesia.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>5. Apakah ada biaya masuk untuk pengunjung?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">Tidak. Acara ini gratis dan terbuka untuk umum, tanpa biaya pendaftaran.
                            Namun, peserta tetap diimbau
                            untuk melakukan pendaftaran agar mendapatkan akses penuh serta informasi terbaru seputar
                            kegiatan.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <span>6. Bagaimana cara registrasi?</span>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p class="luxury-text">Cukup klik tombol “Daftar Sekarang”. Setelah registrasi berhasil, peserta
                            akan menerima kode QR
                            yang dapat digunakan untuk masuk ke area acara.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="py-20 gold-pattern">
        <div class="max-w-3xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Pendaftaran Acara</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto luxury-text">
                    Segera daftarkan diri Anda dan jadilah bagian dari momen spesial ICA 2025
                </p>
            </div>

            <!-- SINGLE EVENT CARD -->
            <div
                class="card-luxury rounded-xl overflow-hidden transition-all duration-500 hover:transform hover:scale-105 max-w-2xl mx-auto">
                <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600">
                    <div class="bg-dark-gray p-8 rounded-lg h-full flex flex-col">

                        <div class="text-center mb-6">
                            <div class="logo-gold-outline" style="transform: scale(0.8); transform-origin: left;">
                                <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association Logo"
                                    class="logo-glow">
                            </div>

                            <h3 class="text-3xl font-bold text-white luxury-heading mb-4">Indonesian Cat Association</h3>

                            <p class="text-gray-300 luxury-text text-lg leading-relaxed">
                                Ayo daftar sekarang dan jadilah bagian dari acara paling ditunggu para cat lovers
                                tahun ini! Nikmati momen seru dan edukatif bersama para pecinta kucing, breeder
                                profesional, dan pelaku industri pet care, dengan beragam aktivitas menarik seperti
                                grooming, vaksinasi gratis, konsultasi kesehatan, dan edukasi seputar perawatan kucing.
                            </p>
                        </div>

                        <!-- Event Details dengan Ikon Kucing -->
                        <div class="space-y-4 mb-8 flex-grow">
                            <div class="flex items-center text-gold-300">
                                <i class="fas fa-calendar-day mr-4 text-gold-400 text-xl w-6"></i>
                                <span class="luxury-text text-lg">28 - 30 November 2025</span>
                            </div>
                            <div class="flex items-center text-gold-300">
                                <i class="fas fa-map-marker-alt mr-4 text-gold-400 text-xl w-6"></i>
                                <span class="luxury-text text-lg">HARRIS Hotel & Residence Riverview Kuta Bali</span>
                            </div>
                        </div>

                        <!-- Action Button dengan Cat Theme -->
                        <div class="mt-auto text-center">
                            <?php
                                // Get the first event ID dynamically
                                $eventId = isset($events) && $events->count() > 0 ? $events->first()->id : 1;
                            ?>

                            <a href="<?php echo e(route('registrations.create', $eventId)); ?>"
                                class="btn-gold px-12 py-4 rounded-lg font-semibold text-xl inline-block transition-all duration-300 hover:shadow-lg group relative overflow-hidden no-underline">
                                <!-- Animated Cat -->
                                <div class="absolute -left-8 group-hover:left-4 transition-all duration-300">
                                    <i class="fas fa-cat text-black text-lg"></i>
                                </div>
                                <i class="fas fa-clipboard-list mr-3"></i> Daftar Sekarang
                                <div class="absolute -right-8 group-hover:right-4 transition-all duration-300">
                                    <i class="fas fa-paw text-black text-lg"></i>
                                </div>
                            </a>

                            <!-- Cat-themed Footer Text -->
                            <div class="flex justify-center items-center space-x-2 mt-4">
                                <i class="fas fa-paw text-gold-300 text-sm"></i>
                                <p class="text-gold-300 luxury-text text-lg">
                                    Jangan lewatkan acara ini!
                                </p>
                                <i class="fas fa-paw text-gold-300 text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/landing/index.blade.php ENDPATH**/ ?>