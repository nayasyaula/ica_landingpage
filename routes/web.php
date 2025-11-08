<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SponsorController;
use Illuminate\Support\Facades\Route;

// ===== PUBLIC ROUTES =====
Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::prefix('registrations')->name('registrations.')->group(function () {
    Route::get('/{event}/create', [RegistrationController::class, 'create'])->name('create');
    Route::post('/{event}', [RegistrationController::class, 'store'])->name('store');
    Route::get('/{registration}/success', [RegistrationController::class, 'success'])->name('success');
    Route::get('/{registration}/download-qrcode', [RegistrationController::class, 'downloadQRCode'])
        ->name('download-qrcode');
});

Route::get('/qrcode/{qrCode}', [RegistrationController::class, 'showQRCode'])
    ->name('qrcode.show')
    ->middleware('signed');

// ===== AUTH ROUTES =====
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [AdminAuthController::class, 'logout'])
    ->middleware('auth:admin')
    ->name('admin.logout');

// ===== ADMIN ROUTES =====
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Dashboard & QR Operations
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/scan-qr', [DashboardController::class, 'scanQR'])->name('scan-qr');
    Route::post('/verify-qr', [DashboardController::class, 'verifyQR'])->name('verify-qr');
    Route::get('/registration/{id}', [DashboardController::class, 'viewRegistration'])
        ->name('registration.view');
    Route::post('/check-in', [RegistrationController::class, 'checkIn'])->name('checkin');

    // Sponsor Management
    Route::prefix('sponsors')->name('sponsors.')->group(function () {
        Route::get('/', [SponsorController::class, 'index'])->name('index');
        Route::get('/create', [SponsorController::class, 'create'])->name('create');
        Route::post('/', [SponsorController::class, 'store'])->name('store');
        Route::get('/{sponsor}/edit', [SponsorController::class, 'edit'])->name('edit');
        Route::put('/{sponsor}', [SponsorController::class, 'update'])->name('update');
        Route::delete('/{sponsor}', [SponsorController::class, 'destroy'])->name('destroy');
        Route::post('/{sponsor}/toggle-status', [SponsorController::class, 'toggleStatus'])
            ->name('toggle-status');
    });
});

// ===== FALLBACK ROUTE =====
Route::fallback(function () {
    return redirect('/');
});