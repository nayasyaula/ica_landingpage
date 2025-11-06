<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SponsorController;
use Illuminate\Support\Facades\Route;

// ===== PUBLIC ROUTES =====
Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Registration Routes untuk peserta
Route::prefix('registrations')->group(function () {
    Route::get('/{event}/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/{event}', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/{registration}/success', [RegistrationController::class, 'success'])->name('registrations.success');
    Route::get('/{registration}/download-qrcode', [RegistrationController::class, 'downloadQRCode'])
        ->name('registrations.download-qrcode');
});

// QR Code Routes
Route::get('/qrcode/{qrCode}', [RegistrationController::class, 'showQRCode'])->name('qrcode.show');

// ===== AUTH ROUTES =====
Route::middleware('guest:admin')->group(function () {
    // Login Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    
    // Register Routes
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('register.submit');
    
    // Password Reset Routes
    Route::get('/forgot-password', [AdminAuthController::class, 'showForgotPasswordForm'])
        ->name('admin.password.request');
    Route::post('/forgot-password', [AdminAuthController::class, 'sendResetLink'])
        ->name('admin.password.email');
    Route::get('/reset-password/{token}', [AdminAuthController::class, 'showResetForm'])
        ->name('admin.password.reset');
    Route::post('/reset-password', [AdminAuthController::class, 'reset'])
        ->name('admin.password.update');
});

// Logout Route
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ===== ADMIN ROUTES =====
Route::prefix('admin')->group(function () {
    // Protected Admin Routes (Require admin authentication)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/scan-qr', [DashboardController::class, 'scanQR'])->name('admin.scan-qr');
        Route::post('/verify-qr', [DashboardController::class, 'verifyQR'])->name('admin.verify-qr');
        Route::get('/registration/{id}', [DashboardController::class, 'viewRegistration'])
            ->name('admin.registration.view');
        Route::post('/check-in', [RegistrationController::class, 'checkIn'])->name('checkin');
    });

    // Sponsor Management Routes
    Route::prefix('sponsors')->group(function () {
        Route::get('/', [SponsorController::class, 'index'])->name('admin.sponsors.index');
        Route::get('/create', [SponsorController::class, 'create'])->name('admin.sponsors.create');
        Route::post('/', [SponsorController::class, 'store'])->name('admin.sponsors.store');
        Route::get('/{sponsor}/edit', [SponsorController::class, 'edit'])->name('admin.sponsors.edit');
        Route::put('/{sponsor}', [SponsorController::class, 'update'])->name('admin.sponsors.update');
        Route::delete('/{sponsor}', [SponsorController::class, 'destroy'])->name('admin.sponsors.destroy');
        Route::post('/{sponsor}/toggle-status', [SponsorController::class, 'toggleStatus'])->name('admin.sponsors.toggle-status');
    });
});

// ===== FALLBACK ROUTE =====
Route::fallback(function () {
    return redirect('/');
});