

<?php $__env->startSection('title', 'ICA - Admin Registration'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-card">
    <!-- Header -->
    <div class="auth-card-header">
        <div class="auth-logo">
            <div class="logo-container">
                <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association" class="logo-glow">
            </div>
        </div>
        <h3 class="auth-title"><i class="fas fa-user-plus me-2"></i>Buat Akun Admin</h3>
        <p class="auth-subtitle">Daftar untuk akses sistem administrasi</p>
    </div>

    <!-- Register Form -->
    <div class="auth-card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register.submit')); ?>">
            <?php echo csrf_field(); ?>
            
            <!-- Name Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-user me-2"></i>Nama Lengkap
                </label>
                <div class="input-group-luxury">
                    <input type="text" name="name" class="form-control-luxury" 
                           value="<?php echo e(old('name')); ?>" 
                           placeholder="Masukkan nama lengkap" required>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <small class="error-message"><?php echo e($message); ?></small> 
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Email Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email
                </label>
                <div class="input-group-luxury">
                    <input type="email" name="email" class="form-control-luxury" 
                           value="<?php echo e(old('email')); ?>" 
                           placeholder="Masukkan email" required>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <small class="error-message"><?php echo e($message); ?></small> 
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Phone Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-phone me-2"></i>Nomor Telepon
                </label>
                <div class="input-group-luxury">
                    <input type="tel" name="phone" class="form-control-luxury" 
                           value="<?php echo e(old('phone')); ?>" 
                           placeholder="Masukkan nomor telepon">
                    <div class="input-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <small class="error-message"><?php echo e($message); ?></small> 
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-key me-2"></i>Password
                </label>
                <div class="input-group-luxury">
                    <input type="password" name="password" class="form-control-luxury" 
                           placeholder="Masukkan password (min. 8 karakter)" required>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <small class="error-message"><?php echo e($message); ?></small> 
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-key me-2"></i>Konfirmasi Password
                </label>
                <div class="input-group-luxury">
                    <input type="password" name="password_confirmation" class="form-control-luxury" 
                           placeholder="Ulangi password" required>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn-auth-primary">
                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
            </button>

            <!-- Links Section -->
            <div class="auth-links">
                <span class="text-muted-light">
                    Sudah punya akun? 
                    <a href="<?php echo e(route('login')); ?>" class="auth-link">
                    Login di sini
                    </a>
                </span>
                <a href="<?php echo e(route('home')); ?>" class="auth-link">
                    <i class="fas fa-home me-1"></i>Kembali ke Home
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ICA-LANDING_PAGE\landing-page\resources\views/auth/admin-register.blade.php ENDPATH**/ ?>