@extends('layouts.admin-auth')

@section('title', 'ICA - Reset Password')

@section('content')
<div class="auth-card">
    <!-- Header -->
    <div class="auth-card-header">
        <div class="auth-logo">
            <div class="logo-container">
                <img src="{{ asset('images/logo-ICA.png') }}" alt="Indonesian Cat Association" class="logo-glow">
            </div>
        </div>
        <h3 class="auth-title"><i class="fas fa-lock me-2"></i>Reset Password</h3>
        <p class="auth-subtitle">Buat password baru</p>
    </div>

    <!-- Reset Password Form -->
    <div class="auth-card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- PERBAIKAN: Gunakan route admin.password.update --}}
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <!-- Email Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email
                </label>
                <div class="input-group-luxury">
                    <input type="email" name="email" class="form-control-luxury" 
                           value="{{ $email ?? old('email') }}" 
                           placeholder="Masukkan email" required readonly>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                @error('email') 
                    <small class="error-message">{{ $message }}</small> 
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-key me-2"></i>Password Baru
                </label>
                <div class="input-group-luxury">
                    <input type="password" name="password" class="form-control-luxury" 
                           placeholder="Masukkan password baru" required>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                @error('password') 
                    <small class="error-message">{{ $message }}</small> 
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-key me-2"></i>Konfirmasi Password
                </label>
                <div class="input-group-luxury">
                    <input type="password" name="password_confirmation" class="form-control-luxury" 
                           placeholder="Konfirmasi password baru" required>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-auth-primary">
                <i class="fas fa-sync-alt me-2"></i>Reset Password
            </button>

            <!-- Links Section -->
            <div class="auth-links">
                <a href="{{ route('admin.login') }}" class="auth-link">
                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                </a>
                <span class="auth-divider">•</span>
                <a href="{{ route('home') }}" class="auth-link">
                    <i class="fas fa-home me-1"></i>Kembali ke Home
                </a>
            </div>
        </form>
    </div>
</div>

<style>
/* Style khusus untuk input yang readonly */
.form-control-luxury:read-only {
    background: rgba(42, 42, 42, 0.6);
    border-color: rgba(212, 175, 55, 0.3);
    cursor: not-allowed;
}

.form-control-luxury:read-only:focus {
    border-color: rgba(212, 175, 55, 0.3);
    box-shadow: none;
    transform: none;
}
</style>
@endsection