<?php $__env->startSection('content'); ?>
    <section class="min-h-screen py-20 gold-pattern flex justify-center">
        <div class="max-w-7xl mx-auto px-4 w-full mt-24">
            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    <!-- Header Section -->
                    <div class="text-center mb-12">
                        <h2 class="section-title text-4xl md:text-5xl text-white mb-4">Pendaftaran Acara</h2>
                        <p class="text-xl text-gray-300 luxury-text">Selesaikan pendaftaran Anda untuk acara eksklusif </p>
                    </div>

                    <!-- Event Info Card -->
                    <div class="card-luxury rounded-xl mb-8">
                        <div class="p-6">
                            <div class="mb-4">
                                <h3 class="text-2xl font-bold text-white luxury-heading"><?php echo e($event->name); ?></h3>
                            </div>
                            <div class="grid md:grid-cols-2 gap-4 text-gray-300">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-day text-gold-400 mr-3 w-5"></i>
                                    <span class="luxury-text">
                                        <?php echo e(\Carbon\Carbon::parse($event->event_date)->format('d')); ?> -
                                        <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('d F Y')); ?>

                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-gold-400 mr-3 w-5"></i>
                                    <span class="luxury-text"><?php echo e($event->location); ?></span>
                                </div>
                            </div>
                            <?php if($event->description): ?>
                                <div class="mt-4 pt-4 border-t border-medium-gray">
                                    <p class="text-gray-300 luxury-text"><?php echo e($event->description); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <div class="card-luxury rounded-xl">
                        <div class="p-1 bg-gradient-to-r from-gold-400 to-gold-600 rounded-xl">
                            <div class="bg-dark-gray p-8 rounded-xl">
                                <div class="mb-6">
                                    <h3 class="text-2xl font-bold text-white luxury-heading mb-2">Formulir Pendaftaran</h3>
                                    <p class="text-gray-300 luxury-text">Harap isi detail Anda dengan akurat</p>
                                </div>

                                <?php if($errors->any()): ?>
                                    <div class="mb-6 bg-red-900 border border-red-700 text-red-100 px-6 py-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <i class="fas fa-exclamation-circle text-red-300 mr-3 text-xl"></i>
                                            <span class="font-semibold">Harap perbaiki kesalahan berikut:</span>
                                        </div>
                                        <ul class="list-disc list-inside space-y-1 luxury-text">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <form method="POST" action="<?php echo e(route('registrations.store', $event)); ?>" class="space-y-6">
                                    <?php echo csrf_field(); ?>

                                    <!-- Name Field -->
                                    <div class="form-group">
                                        <label for="name"
                                            class="form-label luxury-heading text-white mb-2 block">Nama</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gold-400"></i>
                                            <input type="text"
                                                class="form-luxury-input w-full pl-12 pr-4 py-4 rounded-lg" id="name"
                                                name="name" value="<?php echo e(old('name')); ?>" placeholder="Masukkan nama Anda"
                                                required>
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-red-400 luxury-text mt-2"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group">
                                        <label for="email"
                                            class="form-label luxury-heading text-white mb-2 block">Email</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gold-400"></i>
                                            <input type="email"
                                                class="form-luxury-input w-full pl-12 pr-4 py-4 rounded-lg" id="email"
                                                name="email" value="<?php echo e(old('email')); ?>"
                                                placeholder="Masukkan alamat email Anda" required>
                                        </div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-red-400 luxury-text mt-2"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="form-group">
                                        <label for="phone" class="form-label luxury-heading text-white mb-2 block">Nomor
                                            Handphone</label>
                                        <div class="relative">
                                            <i
                                                class="fas fa-phone absolute left-4 top-1/2 transform -translate-y-1/2 text-gold-400"></i>
                                            <input type="tel"
                                                class="form-luxury-input w-full pl-12 pr-4 py-4 rounded-lg" id="phone"
                                                name="phone" value="<?php echo e(old('phone')); ?>"
                                                placeholder="Masukkan nomor telepon Anda" required>
                                        </div>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-red-400 luxury-text mt-2"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <!-- Additional Notes -->
                                    <div
                                        class="bg-gold-400 bg-opacity-10 border border-gold-400 border-opacity-30 rounded-lg p-4">
                                        <div class="flex items-start">
                                            <i class="fas fa-info-circle text-gold-400 mr-3 mt-1"></i>
                                            <div>
                                                <p class="text-black luxury-text text-lg">
                                                    Detail pendaftaran Anda akan diverifikasi. Pastikan semua
                                                    informasi akurat.
                                                    Anda akan menerima email konfirmasi setelah pendaftaran berhasil.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                        <button type="submit"
                                            class="btn-gold flex-1 py-4 rounded-lg font-semibold text-lg transition-all duration-300 hover:shadow-lg">
                                            <i class="fas fa-paper-plane mr-2"></i> Kirim
                                        </button>
                                        <a href="<?php echo e(url()->previous()); ?>"
                                            class="border border-gold-400 text-gold-400 px-8 py-4 rounded-lg font-semibold text-center hover:bg-gold-400 hover:text-white transition-colors">
                                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Custom styles for the registration form */
        .gold-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23d4af37' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
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
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
        }

        .form-luxury-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
            outline: none;
        }

        .form-luxury-input::placeholder {
            color: #6b7280;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: var(--black);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--dark-gold), var(--gold));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
        }

        /* Custom color utilities */
        .text-gold-300 {
            color: #e6c875;
        }

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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .flex-col {
                flex-direction: column;
            }

            .space-y-6>*+* {
                margin-top: 1.5rem;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/registrations/create.blade.php ENDPATH**/ ?>