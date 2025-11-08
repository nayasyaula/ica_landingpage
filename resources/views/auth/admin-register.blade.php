@extends('layouts.admin-auth')

@section('title', 'ICA - Admin Registration')

@section('content')
<div class="auth-card">
    <!-- Header -->
    <div class="auth-card-header">
        <div class="auth-logo">
            <div class="logo-container">
                <img src="{{ asset('images/logo-ICA.png') }}" alt="Indonesian Cat Association" class="logo-glow">
            </div>
        </div>
        <h3 class="auth-title"><i class="fas fa-user-plus me-2"></i>Buat Akun Admin</h3>
        <p class="auth-subtitle">Daftar untuk akses sistem administrasi</p>
    </div>

    <!-- Register Form -->
    <div class="auth-card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
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

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            
            <!-- Name Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-user me-2"></i>Nama Lengkap
                </label>
                <div class="input-group-luxury">
                    <input type="text" name="name" class="form-control-luxury" 
                           value="{{ old('name') }}" 
                           placeholder="Masukkan nama lengkap" required>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                @error('name') 
                    <small class="error-message">{{ $message }}</small> 
                @enderror
            </div>

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

            <!-- Phone Field -->
            <div class="form-group-luxury">
                <label class="form-label">
                    <i class="fas fa-phone me-2"></i>Nomor Telepon
                </label>
                <div class="input-group-luxury">
                    <input type="tel" name="phone" class="form-control-luxury" 
                           value="{{ old('phone') }}" 
                           placeholder="Masukkan nomor telepon">
                    <div class="input-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                @error('phone') 
                    <small class="error-message">{{ $message }}</small> 
                @enderror
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
                    <a href="{{ route('login') }}" class="auth-link">
                    Login di sini
                    </a>
                </span>
                <a href="{{ route('home') }}" class="auth-link">
                    <i class="fas fa-home me-1"></i>Kembali ke Home
                </a>
            </div>
        </form>
    </div>
</div>
@endsection