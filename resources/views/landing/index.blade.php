@extends('layouts.app')

@section('title', 'Welcome - YourBrand')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-bg">
        <div class="max-w-7xl mx-auto px-4 text-center w-full">
            <div class="mb-8">
                <span class="text-gold-400 uppercase tracking-widest text-sm mb-4 inline-block">Est. 1990</span>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-white">Indonesian</span>
                    <span class="gold-accent block">Cat Association</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-gold-200">
                    Mukernas & Gala Dinner ICA 2025
                </p>
                <p class="text-lg text-white mb-10 max-w-2xl mx-auto">
                    An exclusive gathering of feline enthusiasts, breeders, and experts celebrating excellence in the cat
                    world.
                </p>
                <div class="space-x-4 space-y-4 md:space-y-0">
                    <a href="#contact" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-calendar-check mr-2"></i> Register Now
                    </a>
                    <a href="#schedule" class="btn-outline-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-clock mr-2"></i> View Schedule
                    </a>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
                <a href="#schedule" class="text-gold-400 text-2xl">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="py-20 gold-pattern">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-4 text-white">Event Schedule</h2>
            <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                Three days of exclusive feline knowledge, networking, and celebration
            </p>

            <!-- Schedule Tabs -->
            <div class="schedule-tabs">
                <button class="schedule-tab active" data-day="day1">
                    <i class="fas fa-calendar-day mr-2"></i>Day 1 - October 15
                </button>
                <button class="schedule-tab" data-day="day2">
                    <i class="fas fa-calendar-day mr-2"></i>Day 2 - October 16
                </button>
                <button class="schedule-tab" data-day="day3">
                    <i class="fas fa-calendar-day mr-2"></i>Day 3 - October 17
                </button>
            </div>

            <!-- Day 1 Schedule -->
            <div class="schedule-day active" id="day1">
                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">08:00 - 09:00</span>
                    <h3 class="timeline-title">Registration & Welcome Coffee</h3>
                    <p class="timeline-description">Arrival and registration with premium coffee and pastries. Network with
                        fellow feline enthusiasts.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">09:00 - 10:30</span>
                    <h3 class="timeline-title">Opening Ceremony</h3>
                    <p class="timeline-speaker">Keynote: Dr. Felina Whiskers</p>
                    <p class="timeline-description">Grand opening with traditional dance performance and welcome addresses
                        from ICA leadership.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">10:30 - 12:00</span>
                    <h3 class="timeline-title">Feline Genetics Masterclass</h3>
                    <p class="timeline-speaker">Dr. Felina Whiskers</p>
                    <p class="timeline-description">Advanced session on genetic markers, inheritance patterns, and breeding
                        best practices.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">12:00 - 13:30</span>
                    <h3 class="timeline-title">Networking Lunch</h3>
                    <p class="timeline-description">Gourmet lunch featuring international cuisine. Exclusive roundtable
                        discussions.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">13:30 - 15:00</span>
                    <h3 class="timeline-title">Breed Standards Workshop</h3>
                    <p class="timeline-speaker">International Cat Judges Panel</p>
                    <p class="timeline-description">Hands-on workshop examining breed standards and judging criteria.</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">19:00 - 22:00</span>
                    <h3 class="timeline-title">Welcome Gala Dinner</h3>
                    <p class="timeline-description">Black-tie optional event with live music, fine dining, and special guest
                        appearances.</p>
                </div>
            </div>

            <!-- Day 2 Schedule -->
            <div class="schedule-day" id="day2">
                <div class="timeline-item">
                    <span class="timeline-time">08:30 - 10:00</span>
                    <h3 class="timeline-title">Feline Behavior Deep Dive</h3>
                    <p class="timeline-speaker">Thomas Pawlington</p>
                    <p class="timeline-description">Understanding complex feline behaviors and advanced training techniques.
                    </p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">10:00 - 11:30</span>
                    <h3 class="timeline-title">Nutrition Science Symposium</h3>
                    <p class="timeline-speaker">Prof. Miaow Gonzalez</p>
                    <p class="timeline-description">Latest research in feline nutrition and dietary requirements across life
                        stages.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">11:30 - 13:00</span>
                    <h3 class="timeline-title">Breeder's Roundtable</h3>
                    <p class="timeline-speaker">International Breeder Association</p>
                    <p class="timeline-description">Panel discussion on ethical breeding practices and industry challenges.
                    </p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">13:00 - 14:30</span>
                    <h3 class="timeline-title">Lunch & Learn</h3>
                    <p class="timeline-description">Casual lunch with topic-specific breakout sessions.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">14:30 - 16:30</span>
                    <h3 class="timeline-title">Healthcare Innovation Forum</h3>
                    <p class="timeline-speaker">Veterinary Specialists Panel</p>
                    <p class="timeline-description">Emerging technologies and treatments in feline healthcare.</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">18:30 - 21:00</span>
                    <h3 class="timeline-title">Awards Ceremony</h3>
                    <p class="timeline-description">Celebrating excellence in feline care, breeding, and innovation.</p>
                </div>
            </div>

            <!-- Day 3 Schedule -->
            <div class="schedule-day" id="day3">
                <div class="timeline-item">
                    <span class="timeline-time">09:00 - 10:30</span>
                    <h3 class="timeline-title">Business of Cats</h3>
                    <p class="timeline-speaker">Industry Leaders Panel</p>
                    <p class="timeline-description">Building successful feline-related businesses and brands.</p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">10:30 - 12:00</span>
                    <h3 class="timeline-title">Future of Feline Science</h3>
                    <p class="timeline-speaker">Research Institute Directors</p>
                    <p class="timeline-description">Cutting-edge research and future directions in feline science.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">12:00 - 13:30</span>
                    <h3 class="timeline-title">Farewell Lunch</h3>
                    <p class="timeline-description">Final networking opportunity with international delegates.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">13:30 - 15:30</span>
                    <h3 class="timeline-title">Interactive Workshops</h3>
                    <p class="timeline-description">Choose from: Advanced Grooming, Photography, or Cat Show Preparation.
                    </p>
                </div>

                <div class="timeline-item schedule-highlight">
                    <span class="timeline-time">16:00 - 17:00</span>
                    <h3 class="timeline-title">Closing Ceremony</h3>
                    <p class="timeline-speaker">ICA President & Board Members</p>
                    <p class="timeline-description">Summary of key insights and announcement of ICA 2026.</p>
                </div>

                <div class="timeline-item">
                    <span class="timeline-time">19:00 - 23:00</span>
                    <h3 class="timeline-title">Grand Finale Celebration</h3>
                    <p class="timeline-description">Exclusive cocktail party and live entertainment to conclude the event.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Speakers Section -->
    <section id="speakers" class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="section-title text-4xl font-bold text-center mb-4 text-white">Visionary Voices of Catropolitan</h2>
            <p class="text-xl text-center mb-12 max-w-3xl mx-auto text-gold-200">
                Meet the urban pioneers shaping the future of feline excellence in metropolitan style
            </p>
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

    <!-- About Section -->
    <section id="about" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="section-title text-4xl font-bold mb-6 text-white">About ICA 2025</h2>
                    <p class="text-gray-300 mb-6 text-lg">
                        The Indonesian Cat Association proudly presents the most prestigious feline event of the year -
                        Mukernas & Gala Dinner ICA 2025.
                    </p>
                    <p class="text-gray-300 mb-6">
                        For over three decades, ICA has been at the forefront of promoting feline welfare, breed standards,
                        and the vibrant community of cat enthusiasts across Indonesia and beyond.
                    </p>
                    <p class="text-gray-300 mb-8">
                        This year's event brings together the most distinguished experts, breeders, and feline aficionados
                        for an unforgettable experience of education, networking, and celebration.
                    </p>
                    <div class="flex space-x-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold gold-accent mb-1">30+</div>
                            <div class="text-gray-400 text-sm">Years of Excellence</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gold-accent mb-1">500+</div>
                            <div class="text-gray-400 text-sm">Expected Guests</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold gold-accent mb-1">15+</div>
                            <div class="text-gray-400 text-sm">International Speakers</div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-dark-gray border border-medium-gray rounded-lg overflow-hidden h-96 flex items-center justify-center relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black opacity-70 z-10"></div>
                    <div class="text-center z-20 p-8">
                        <i class="fas fa-paw text-6xl gold-accent mb-4"></i>
                        <h3 class="text-2xl font-bold text-white mb-2">Elegant Venue</h3>
                        <p class="text-gold-200">The Grand Ballroom, Jakarta</p>
                        <p class="text-gray-300 mt-4">October 15-17, 2025</p>
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
                    <input type="text" id="name" name="name" required
                        class="w-full px-5 py-4 rounded-lg focus:outline-none" value="{{ old('name') }}"
                        placeholder="Enter your full name">
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
                        class="w-full px-5 py-4 rounded-lg focus:outline-none" placeholder="Tell us about your interest in the event">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full btn-gold py-4 rounded-lg font-semibold text-lg transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Send Request
                </button>
            </form>
        </div>
    </section>
@endsection
