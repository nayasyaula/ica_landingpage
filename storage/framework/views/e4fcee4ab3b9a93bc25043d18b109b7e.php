

<?php $__env->startSection('content'); ?>
<div class="admin-login-page">
    <div class="container admin-login-container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="admin-login-card">
                    <!-- Header -->
                    <div class="admin-login-header">
                        <div class="login-logo">
                            <div class="logo-gold-outline">
                                <img src="<?php echo e(asset('images/logo-ICA.png')); ?>" alt="Indonesian Cat Association Logo" class="logo-glow">
                            </div>
                        </div>
                        <h3 class="login-title"><i class="fas fa-lock me-2"></i>Admin Login</h3>
                        <p class="login-subtitle">Masuk ke sistem administrasi</p>
                    </div>

                    <!-- Login Form -->
                    <div class="admin-login-body">
                        <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Email Field -->
                            <div class="form-group-luxury">
                                <label class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <div class="input-group-luxury">
                                    <input type="email" name="email" class="form-control-luxury" 
                                           placeholder="Masukkan email" required>
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
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

                            <!-- Password Field -->
                            <div class="form-group-luxury">
                                <label class="form-label">
                                    <i class="fas fa-key me-2"></i>Password
                                </label>
                                <div class="input-group-luxury">
                                    <input type="password" name="password" class="form-control-luxury" 
                                           placeholder="Masukkan password" required>
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

                            <!-- Login Button -->
                            <button type="submit" class="btn-login-gold">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* ===== STYLE KHUSUS ADMIN LOGIN ===== */
.admin-login-page {
    background: linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 100%);
    min-height: 100vh;
    padding: 20px 0;
    display: flex;
    align-items: center;
}

.admin-login-container {
    margin-top: 80px !important;
    padding-top: 1rem !important;
}

.admin-login-card {
  background: linear-gradient(145deg, #1A1A1A, #2A2A2A);
  border-radius: 14px;
  border: 1px solid #D4AF37;
  box-shadow: 0 10px 25px rgba(212, 175, 55, 0.15);
  overflow: hidden;
  font-family: 'Cormorant Garamond', serif;
  backdrop-filter: blur(10px);
  width: 150%; /* 🔸 kartu lebih lebar dari container */
  max-width: none; /* ❗ hapus batasan max-width */
  margin: 20px auto; /* biar tetap di tengah vertikal */
  padding: 20px 10px;

  position: relative; /* penting supaya transform bisa berfungsi */
  left: 50%; 
  transform: translateX(-50%); /* ✅ ini yang menengahkan kartu */
}

.admin-login-header {
    background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
    color: #1A1A1A;
    padding: 20px 20px 15px;
    text-align: center;
    border-bottom: 1px solid #D4AF37;
}

.login-logo {
    margin-bottom: 10px;
}

.login-logo .logo-gold-outline {
    display: inline-block;
    transform: scale(0.6);
}

.login-title {
    font-family: 'Cinzel', serif;
    font-weight: 700;
    font-size: 1.2rem;
    margin: 0 0 5px 0;
    letter-spacing: 0.3px;
}

.login-subtitle {
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.8rem;
    opacity: 0.9;
    margin: 0;
    font-weight: 500;
}

.admin-login-body {
    padding: 20px 20px 20px;
}

.form-group-luxury {
    margin-bottom: 20px;
}

.form-label {
    color: #D4AF37;
    font-family: 'Cinzel', serif;
    font-weight: 600;
    font-size: 0.85rem;
    margin-bottom: 6px;
    display: block;
}

.input-group-luxury {
    position: relative;
}

.form-control-luxury {
    width: 100%;
    background: rgba(42, 42, 42, 0.8);
    border: 1px solid rgba(212, 175, 55, 0.4);
    border-radius: 6px;
    padding: 10px 40px 10px 12px;
    color: #FFFFFF;
    font-family: 'Cormorant Garamond', serif;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.form-control-luxury:focus {
    outline: none;
    border-color: #D4AF37;
    box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2);
    background: rgba(42, 42, 42, 0.9);
}

.form-control-luxury::placeholder {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.85rem;
}

.input-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #D4AF37;
    font-size: 0.8rem;
}

.error-message {
    color: #ff6b6b;
    font-size: 0.75rem;
    margin-top: 4px;
    display: block;
    font-family: 'Cormorant Garamond', serif;
}

.btn-login-gold {
    width: 100%;
    background: linear-gradient(135deg, #D4AF37, #B8860B);
    color: #1A1A1A;
    border: none;
    border-radius: 6px;
    padding: 12px 16px;
    font-family: 'Cinzel', serif;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 5px;
}

.btn-login-gold:hover {
    background: linear-gradient(135deg, #B8860B, #D4AF37);
    transform: translateY(-1px);
    box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
}

.btn-login-gold:active {
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 768px) {
    .admin-login-container {
        margin-top: 70px !important;
        padding-top: 0.5rem !important;
    }
    
    @media (max-width: 768px) {
    .admin-login-card {
        max-width: 370px; /* sebelumnya 320px */
        transform: scale(1);
    }
}
    
    .admin-login-header {
        padding: 18px 15px 12px;
    }
    
    .admin-login-body {
        padding: 18px 15px 18px;
    }
    
    .login-title {
        font-size: 1.1rem;
    }
    
    .login-logo .logo-gold-outline {
        transform: scale(0.55);
    }
}

@media (max-width: 480px) {
    .admin-login-container {
        margin-top: 60px !important;
    }
    
    @media (max-width: 480px) {
    .admin-login-card {
        max-width: 340px; /* sebelumnya 300px */
    }
}

    .admin-login-header {
        padding: 15px 12px 10px;
    }
    
    .admin-login-body {
        padding: 15px 12px 15px;
    }
    
    .login-title {
        font-size: 1rem;
    }
    
    .login-subtitle {
        font-size: 0.75rem;
    }
    
    .form-control-luxury {
        padding: 8px 35px 8px 10px;
        font-size: 0.85rem;
    }
    
    .btn-login-gold {
        padding: 10px 12px;
        font-size: 0.85rem;
    }
    
    .login-logo .logo-gold-outline {
        transform: scale(0.5);
    }
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.admin-login-card {
    animation: fadeIn 0.5s ease-out;
}

/* Hover Effects */
.form-control-luxury:hover {
    border-color: rgba(212, 175, 55, 0.6);
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ica_landingpage\resources\views/admin/login.blade.php ENDPATH**/ ?>