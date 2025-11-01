

<?php $__env->startSection('content'); ?>
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
                        <i class="fas fa-calendar-check mr-2"></i> Browse Events
                    </a>
                    <a href="#schedule" class="btn-gold px-8 py-4 rounded-lg font-semibold text-lg inline-block">
                        <i class="fas fa-clock mr-2"></i> View Schedule
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

    <section id="events" class="py-20 gold-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Available Events</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto luxury-text">
                    Discover and register for our exclusive cat association events. Limited slots available for each prestigious gathering.
                </p>
            </div>

            <?php if(session('error')): ?>
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-red-900 border border-red-700 text-red-100 px-6 py-4 rounded-lg shadow-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-300 mr-3 text-xl"></i>
                            <span class="luxury-text text-lg"><?php echo e(session('error')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="bg-green-900 border border-green-700 text-green-100 px-6 py-4 rounded-lg shadow-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-300 mr-3 text-xl"></i>
                            <span class="luxury-text text-lg"><?php echo e(session('success')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card-luxury rounded-xl overflow-hidden transition-all duration-500 hover:transform hover:scale-105">
                        <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600">
                            <div class="bg-dark-gray p-6 rounded-lg h-full flex flex-col">
                                <!-- Event Header -->
                                <div class="mb-4">
                                    <div class="flex justify-between items-start mb-3">
                                        <h3 class="text-xl font-bold text-white luxury-heading"><?php echo e($event->name); ?></h3>
                                        <span class="bg-gold-400 text-black text-sm px-3 py-1 rounded-full font-semibold">
                                            <?php echo e($event->available_slots); ?>/<?php echo e($event->capacity); ?> Slots
                                        </span>
                                    </div>
                                    <p class="text-gray-300 luxury-text text-lg leading-relaxed">
                                        <?php echo e(Str::limit($event->description, 120)); ?>

                                    </p>
                                </div>

                                <!-- Event Details -->
                                <div class="space-y-3 mb-6 flex-grow">
                                    <div class="flex items-center text-gold-300">
                                        <i class="fas fa-calendar-day mr-3 text-gold-400 w-5"></i>
                                        <span class="luxury-text">
                                            <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('d F Y, H:i')); ?>

                                        </span>
                                    </div>
                                    <div class="flex items-center text-gold-300">
                                        <i class="fas fa-map-marker-alt mr-3 text-gold-400 w-5"></i>
                                        <span class="luxury-text"><?php echo e($event->location); ?></span>
                                    </div>
                                    <div class="flex items-center text-gold-300">
                                        <i class="fas fa-users mr-3 text-gold-400 w-5"></i>
                                        <span class="luxury-text">
                                            <?php if($event->available_slots > 10): ?>
                                                <span class="text-green-400">Many spots available</span>
                                            <?php elseif($event->available_slots > 0): ?>
                                                <span class="text-yellow-400">Limited spots</span>
                                            <?php else: ?>
                                                <span class="text-red-400">Fully booked</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="mt-auto">
                                    <?php if($event->available_slots > 0): ?>
                                        <a href="<?php echo e(route('registrations.create', $event)); ?>" 
                                           class="btn-gold w-full py-3 rounded-lg font-semibold text-center block transition-all duration-300 hover:shadow-lg">
                                            <i class="fas fa-ticket-alt mr-2"></i> Register Now
                                        </a>
                                    <?php else: ?>
                                        <button class="w-full py-3 rounded-lg font-semibold text-center bg-gray-700 text-gray-400 cursor-not-allowed luxury-text" disabled>
                                            <i class="fas fa-times-circle mr-2"></i> Event Full
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-12">
                        <div class="bg-dark-gray border border-medium-gray rounded-xl p-8 max-w-2xl mx-auto">
                            <i class="fas fa-calendar-times text-gold-400 text-6xl mb-4"></i>
                            <h3 class="text-2xl font-bold text-white mb-2 luxury-heading">No Events Available</h3>
                            <p class="text-gray-300 luxury-text text-lg">
                                There are currently no events available for registration. Please check back later for upcoming events.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <style>
        /* Additional custom styles for the events section */
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

        .gold-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        /* Custom color utilities */
        .text-gold-200 {
            color: #f5e8c8;
        }

        .text-gold-300 {
            color: #e6c875;
        }

        .text-gold-400 {
            color: #d4af37;
        }

        .text-gold-600 {
            color: #b8860b;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
            
            .flex-col {
                flex-direction: column;
            }
            
            .space-x-4 {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-regist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/events/index.blade.php ENDPATH**/ ?>