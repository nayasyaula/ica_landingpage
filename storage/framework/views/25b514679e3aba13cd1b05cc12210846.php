<?php $__env->startSection('title', 'Welcome - Indonesian Cat Association'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Home/Hero Section -->
    <section id="home" class="hero-bg">
        <div class="max-w-7xl mx-auto px-4 text-center w-full">
            <div class="mb-8">
                <span class="text-gold-400 uppercase tracking-widest text-3xl mb-4 inline-block">GALA DINNER &
                    AWARDING NIGHT
                    ICA 2025
                </span>
                <h1 class="text-6xl md:text-8xl font-bold mb-6 leading-tight">
                    <span class="text-white">Indonesian</span>
                    <span class="gold-accent block">Cat Association</span>
                </h1>
                <p class="text-xl md:text-3xl mb-8 max-w-3xl mx-auto text-gold-200">
                    Catropolitan Style
                </p>
                <div class="space-x-4 space-y-4 md:space-y-0">
                    <a href="#events" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-calendar-check mr-2"></i> Daftar Sekarang
                    </a>
                    <a href="#schedule" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
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
    <section id="about" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="section-title text-4xl font-bold mb-6 text-white">Tentang ICA</h2>
                    <p class="text-gray-300 mb-6 text-lg luxury-text">
                        Mukernas & Gala Dinner ICA 2025 merupakan kegiatan tahunan yang selalu dinanti oleh para pecinta
                        kucing di Indonesia.
                        Tahun ini, acara tersebut mengangkat tema “Metropolitan CATROPOLITAN STYLE”, menghadirkan konsep
                        yang segar, kreatif,
                        dan berbeda dari penyelenggaraan sebelumnya.
                    </p>
                    <p class="text-gray-300 mb-6 text-lg luxury-text">
                        Rangkaian acara terbagi menjadi tiga sesi utama. Sesi pertama adalah Mukernas, yang menjadi wadah
                        bagi anggota organisasi
                        untuk membahas serta merumuskan program dan kebijakan ICA. Sesi kedua yaitu Gala Dinner & Award
                        Night, menghadirkan malam
                        penghargaan penuh kemeriahan bagi kucing-kucing terbaik dari berbagai daerah di Indonesia. Sesi
                        terakhir ditutup dengan pembacaan
                        keputusan Mukernas dan penutupan acara sebagai puncak dari seluruh rangkaian kegiatan.
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

    <!-- Speakers Section -->
    <section id="speakers" class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center w-full mb-12">
                <h2 class="section-title text-3xl font-bold mb-4 text-white">Para Pembicara Visioner</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200 luxury-text">
                    Kenali para pelopor yang akan membentuk masa depan keunggulan dunia kucing.
                </p>
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
        <div class="max-w-3xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-3xl font-bold mb-4 text-white">Jadwal Event</h2>
                <p class="text-xl text-center mb-12 max-w-2xl mx-auto text-gold-200 luxury-text">
                    Tiga hari seru untuk menambah pengetahuan tentang kucing, menjalin koneksi, dan merayakan komunitas
                    pecinta kucing.
                </p>
            </div>
            <!-- Schedule Tabs -->
            <div class="schedule-tabs">
                <button class="schedule-tab active text-button" data-day="day1">
                    <i class="fas fa-calendar-day mr-2"></i>Hari ke 1 - 28 Nov
                </button>
                <button class="schedule-tab text-button" data-day="day2">
                    <i class="fas fa-calendar-day mr-2"></i>Gala Dinner dan Malam Penghargaan
                </button>
                <button class="schedule-tab text-button" data-day="day3">
                    <i class="fas fa-calendar-day mr-2"></i>Hari ke 3 - 30 Nov
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
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl font-bold mb-4 text-white">Lokasi Event</h2>
                <p class="text-xl mb-12 max-w-3xl mx-auto text-gold-200 luxury-text">
                    Rasakan kemewahan di Harris Hotel, Kuta Bali. </p>
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
                                        <div class="font-bold text-gold-400 luxury-heading">Lihat Peta Lebih Besar</div>
                                        <div class="text-xs text-gray-300 mt-1 luxury-text">Klik untuk membuka layar penuh
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="location-info">
                        <h3 class="text-2xl font-bold text-white mb-4 luxury-heading">HARRIS Hotel & Residence Riverview
                            Kuta Bali</h3>
                        <p class="text-gray-300 mb-4 luxury-text text-lg"> Pilihan ideal untuk acara dan liburan, dengan
                            ruang luas,
                            layanan
                            profesional, serta lokasi strategis yang memudahkan akses ke destinasi utama di Kuta.
                        </p>

                        <div class="location-feature">
                            <i class="fas fa-location-dot"></i>
                            <span class="luxury-text text-lg">Jl. Raya Kuta Tidak. 62A , Badung, Bali, Indonesia
                                80361</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-phone"></i>
                            <span class="luxury-text">+62 361 761 007</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-bed"></i>
                            <span class="luxury-text">Kamar dan unit residence yang luas dan nyaman</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-utensils"></i>
                            <span class="luxury-text">Restoran dengan menu sarapan dan pilihan kuliner beragam</span>
                        </div>
                        <div class="location-feature">
                            <i class="fas fa-user-friends"></i>
                            <span class="luxury-text">Pelayanan ramah dan suasana santai cocok untuk keluarga</span>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <!-- Get Directions Button dengan link yang benar -->
                            <a href="https://www.google.com/maps/dir//HARRIS+Hotel+%26+Residence+Riverview+Kuta+Bali,+Jalan+Raya+Kuta+No.+99,+Kuta,+Bali+80361/@-8.7178282,115.1808951,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd246b0d51711e9:0x3037c24b5e7fb3cd!2m2!1d115.1808951!2d-8.7178282?entry=ttu"
                                target="_blank" rel="noopener noreferrer"
                                class="btn-gold px-6 py-3 rounded-lg font-semibold inline-block transition-all duration-300 hover:scale-105 flex-1 text-center">
                                <i class="fas fa-directions mr-2"></i> Lihat Rute
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-white mb-6 luxury-heading">Keunggulan Lokasi</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-star text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold luxury-heading">Lokasi Strategis di Kuta</h4>
                                <p class="text-gray-300 luxury-text">Terletak di jantung kawasan Kuta, dekat pantai, pusat
                                    perbelanjaan,
                                    dan destinasi wisata populer.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-users text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold luxury-heading">Fasilitas Modern</h4>
                                <p class="text-gray-300 luxury-text">Dilengkapi ballroom luas, ruang meeting modern, serta
                                    fasilitas
                                    lengkap untuk acara bisnis dan sosial.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-film text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold luxury-heading">Beberapa Kolam Renang</h4>
                                <p class="text-gray-300 luxury-text">Nikmati kolam renang dengan area anak dan dewasa,
                                    cocok
                                    untuk
                                    bersantai sebelum atau sesudah acara.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-concierge-bell text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold luxury-heading">HARRIS Kafe & Katering</h4>
                                <p class="text-gray-300 luxury-text">Staf profesional siap memastikan acara Anda berjalan
                                    lancar
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-paw text-gold-400 mt-1 mr-3"></i>
                            <div>
                                <h4 class="text-white font-semibold luxury-heading">Tata ruang ramah kucing</h4>
                                <p class="text-gray-300 luxury-text">Area khusus yang dirancang untuk demonstrasi dan
                                    pameran kucing.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Location Info -->
                    <div class="mt-8 p-6 bg-dark-gray rounded-lg border border-medium-gray">
                        <h4 class="text-white font-semibold mb-3 flex items-center luxury-heading">
                            <i class="fas fa-info-circle text-gold-400 mr-2"></i>
                            Keunggulan Lokasi
                        </h4>
                        <ul class="text-gray-300 space-y-2 text-sm">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span class="luxury-text">Terletak strategis di pusat Kuta, dekat dengan jalan utama dan
                                    berbagai tempat wisata.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-shopping-bag text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span class="luxury-text">Berdekatan dengan Beachwalk Shopping Center dan pasar oleh-oleh
                                    lokal.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-umbrella-beach text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span class="luxury-text">Hanya sekitar 10 menit berkendara menuju Pantai Kuta dan Pantai
                                    Legian.
                                    Beach</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-plane-departure text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span class="luxury-text">Hanya 15 menit dari Bandara Internasional Ngurah Rai.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-concierge-bell text-gold-400 mt-1 mr-2 text-xs"></i>
                                <span class="luxury-text">Akses mudah ke berbagai restoran, kafe, dan tempat hiburan di
                                    sekitar Kuta.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section id="sponsors" class="py-16 gold-pattern">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-4xl font-bold mb-4 text-white">Para Sponsor Terhormat Kami</h2>
                <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200 luxury-text">
                    Didukung dengan penuh semangat oleh para pemimpin industri dalam perawatan dan inovasi dunia kucing </p>
            </div>

            <!-- Platinum Sponsors -->
            <div class="sponsor-tier mb-8">
                <h3 class="tier-title">Sponsor Platinum</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold luxury-heading">PurrfectCare</div>
                    </div>
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold luxury-heading">WhiskerTech</div>
                    </div>
                    <div class="sponsor-card platinum-gradient">
                        <div class="text-white text-xl font-bold luxury-heading">RoyalFeline</div>
                    </div>
                </div>
            </div>

            <!-- Gold Sponsors -->
            <div class="sponsor-tier mb-8">
                <h3 class="tier-title">Sponsor Emas</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold luxury-heading">CatNation</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold luxury-heading">PawPrint</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold luxury-heading">MeowMix Pro</div>
                    </div>
                    <div class="sponsor-card gold-gradient">
                        <div class="text-white text-lg font-semibold luxury-heading">FelineWell</div>
                    </div>
                </div>
            </div>

            <!-- Silver Sponsors -->
            <div class="sponsor-tier mb-8">
                <h3 class="tier-title">Sponsor Perak</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white luxury-heading">KittyCorp</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white luxury-heading">Paws & Claws</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white luxury-heading">CatHaven</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white luxury-heading">PurrFactory</div>
                    </div>
                    <div class="sponsor-card silver-gradient">
                        <div class="text-white luxury-heading">MeowMart</div>
                    </div>
                </div>
            </div>

            <!-- Bronze Sponsors (New) -->
            <div class="sponsor-tier mb-8">
                <h3 class="tier-title">Sponsor Perunggu</h3>
                <div class="sponsor-grid">
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">FelineFriends</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">Catopia</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">WhiskerWonders</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">PawPals</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">MeowMingle</div>
                    </div>
                    <div class="sponsor-card bronze-gradient">
                        <div class="text-white luxury-heading">CatCompanions</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 gold-pattern">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center w-full">
                <h2 class="section-title text-3xl font-bold text-center mb-4 text-white">Tanya Jawab</h2>
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
            <p class="luxury-text">Acara ini diselenggarakan oleh Indonesian Cat Association (ICA) dan mencakup tiga kegiatan utama: Musyawarah Kerja Nasional (Mukernas), Cat Expo & Product Exhibition, serta Gala Dinner & Award Night.</p>
        </div>
    </div>

    <!-- FAQ Item 2 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>2. Kapan dan di mana acara ICA 2025 dilaksanakan?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Acara akan berlangsung pada 28–30 November 2025 di Hotel HARRIS Riverview, Denpasar, Bali. Selama tiga hari, acara mencakup Mukernas ICA, Cat Expo & Product Exhibition, serta Gala Dinner & Award Night.</p>
        </div>
    </div>

    <!-- FAQ Item 3 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>3. Apa tujuan utama dari kegiatan ini?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Tujuan kegiatan ini antara lain:<br>
                • Menjadi wadah musyawarah nasional bagi seluruh anggota ICA.<br>
                • Memberikan apresiasi kepada pemilik dan breeder kucing berprestasi.<br>
                • Meningkatkan eksistensi ICA sebagai organisasi profesional bertaraf internasional.<br>
                • Membangun jejaring kerja sama antara ICA, sponsor, dan industri hewan peliharaan.<br>
                • Menjadi sarana promosi dan branding bagi mitra dan sponsor yang berpartisipasi.</p>
        </div>
    </div>

    <!-- FAQ Item 4 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>4. Siapa saja tokoh utama yang terlibat?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">• <strong>Russy Idroes, S.Kom., M.M.</strong> — Ketua Umum ICA, pendiri ICA,
                sekaligus juri internasional yang diakui Fédération Internationale Féline (FIFe).<br>
                • <strong>Dr. Ir. I Wayan Koster, M.M.</strong> — Gubernur Bali, yang mendukung penyelenggaraan acara ini
                sebagai bagian dari promosi pariwisata dan kegiatan nasional di Bali.</p>
        </div>
    </div>

    <!-- FAQ Item 5 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>5. Siapa saja yang dapat menjadi sponsor acara ini?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Terdapat empat kategori sponsor:<br>
                🥇 <strong>Platinum Sponsor</strong><br>
                🥈 <strong>Gold Sponsor</strong><br>
                🥉 <strong>Silver Sponsor</strong><br>
                🏅 <strong>Bronze Sponsor</strong><br><br>
                Setiap kategori memiliki nilai kontribusi dan fasilitas berbeda, seperti booth pameran,
                penayangan video profil perusahaan, serta penempatan logo pada materi publikasi resmi ICA.
                Sponsor juga akan disebutkan secara berkala oleh MC selama acara dan berkesempatan tampil di
                panggung Award Night.</p>
        </div>
    </div>

    <!-- FAQ Item 6 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>6. Apakah ada kerja sama dengan media nasional?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Ya. Panitia bekerja sama dengan Kompas, Metro TV, dan Trans TV sebagai mitra
                liputan resmi. Logo media partner akan ditampilkan pada seluruh materi publikasi cetak maupun
                digital untuk memperkuat branding acara.</p>
        </div>
    </div>

    <!-- FAQ Item 7 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>7. Bagaimana konsep Gala Dinner & Award Night?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Gala Dinner akan menjadi puncak acara dengan konsep elegan bertema
                Catropolitan Style. Penghargaan hanya akan diberikan kepada peserta yang hadir langsung di
                lokasi. Sponsor besar akan mendapat kesempatan tampil di panggung, dan door prize akan diberikan
                berupa produk hewan peliharaan dari sponsor, bukan makanan kucing.</p>
        </div>
    </div>

    <!-- FAQ Item 8 -->
    <div class="faq-item">
        <div class="faq-question">
            <span>8. Apakah akan melibatkan publik figur atau influencer?</span>
            <i class="fas fa-chevron-down faq-icon"></i>
        </div>
        <div class="faq-answer">
            <p class="luxury-text">Ya. Panitia merencanakan kerja sama dengan beberapa tokoh publik dan member
                ICA untuk mendukung promosi melalui media sosial. Salah satu target endorsement adalah Davina
                Karamoy, yang diharapkan dapat membantu meningkatkan eksposur publik acara ini.</p>
        </div>
    </div>
</div>

        </div>
    </section>

    <!-- Events Section - SUPER SIMPLE VERSION -->
    <section id="events" class="py-20 gold-pattern">
        <div class="max-w-4xl mx-auto px-4"> <!-- Diperkecil max-width -->
            <div class="text-center mb-16">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Pendaftaran Acara</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto luxury-text">
                    Segera daftarkan diri Anda dan jadilah bagian dari momen spesial ICA 2025 </p>
            </div>

            <!-- SINGLE EVENT CARD -->
            <div
                class="card-luxury rounded-xl overflow-hidden transition-all duration-500 hover:transform hover:scale-105 max-w-2xl mx-auto">
                <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600">
                    <div class="bg-dark-gray p-8 rounded-lg h-full flex flex-col">

                        <!-- Cat Logo/Paw Header -->
                        <div class="text-center mb-6">
                            <!-- Animated Cat Paw -->
                            <div class="relative inline-block mb-4">
                                <div class="cat-paw-animation">
                                    <i class="fas fa-paw text-gold-400 text-5xl"></i>
                                </div>
                                <div class="absolute -top-2 -right-2">
                                    <i class="fas fa-paw text-gold-300 text-2xl opacity-70"></i>
                                </div>
                            </div>

                            <h3 class="text-3xl font-bold text-white luxury-heading mb-4">Indonesian Cat Association</h3>

                            <p class="text-gray-300 luxury-text text-lg leading-relaxed">
                                Ayo daftar sekarang dan ikut meramaikan acara paling ditunggu para cat lovers tahun ini!
                                Jangan sampai ketinggalan momen seru, edukatif, dan penuh kejutan!
                            </p>
                        </div>

                        <!-- Event Details dengan Ikon Kucing -->
                        <div class="space-y-4 mb-8 flex-grow">
                            <div class="flex items-center text-gold-300">
                                <i class="fas fa-calendar-day mr-4 text-gold-400 text-xl w-6"></i>
                                <span class="luxury-text text-lg">28 November 2025</span>
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
                                class="btn-gold px-12 py-4 rounded-lg font-semibold text-xl inline-block transition-all duration-300 hover:shadow-lg group relative overflow-hidden">
                                <!-- Animated Cat -->
                                <div class="absolute -left-8 group-hover:left-4 transition-all duration-300">
                                    <i class="fas fa-cat text-black text-lg"></i>
                                </div>
                                <i class="fas fa-ticket-alt mr-3"></i> Daftar Sekarang
                                <div class="absolute -right-8 group-hover:right-4 transition-all duration-300">
                                    <i class="fas fa-paw text-black text-lg"></i>
                                </div>
                            </a>

                            <!-- Cat-themed Footer Text -->
                            <div class="flex justify-center items-center space-x-2 mt-4">
                                <i class="fas fa-paw text-gold-300 text-sm"></i>
                                <p class="text-gold-300 luxury-text text-lg">
                                    Don't miss this purr-fect event!
                                </p>
                                <i class="fas fa-paw text-gold-300 text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/landing/index.blade.php ENDPATH**/ ?>