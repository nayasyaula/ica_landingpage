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
        <h3 class="auth-title"><i class="fas fa-key me-2"></i>Reset Password</h3>
        <p class="auth-subtitle">Masukkan email untuk reset password</p>
    </div>

    <!-- Forgot Password Form -->
    <div class="auth-card-body">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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

        {{-- PERBAIKAN: Gunakan route admin.password.email --}}
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <!-- Email Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email
                </label>
                <div class="input-group-luxury">
                    <input type="email" name="email" class="form-control-luxury" 
                           value="{{ old('email') }}" 
                           placeholder="Masukkan email" required>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                @error('email') 
                    <small class="error-message">{{ $message }}</small> 
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-auth-primary">
                <i class="fas fa-paper-plane me-2"></i>Kirim Link Reset
            </button>

            <!-- Links Section -->
            <div class="auth-links">
                <a href="{{ route('login') }}" class="auth-link">
                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                </a>
                <span class="auth-divider">•</span>
                <a href="{{ route('register') }}" class="auth-link">
                    <i class="fas fa-user-plus me-1"></i>Buat Akun Baru
                </a>
            </div>
        </form>
    </div>
</div>
@endsection