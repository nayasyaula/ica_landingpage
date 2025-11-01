<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\RegistrationController;

// Tambahkan ini untuk Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Public Registration Routes
Route::get('/registrations/{event}/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations/{event}', [RegistrationController::class, 'store'])->name('registrations.store');
Route::get('/registrations/{registration}/success', [RegistrationController::class, 'success'])->name('registrations.success');
Route::get('/registrations/{registration}/download-qrcode', [RegistrationController::class, 'downloadQRCode'])
    ->name('registrations.download-qrcode');

// Route untuk view QR Code berdasarkan kode
Route::get('/qrcode/{qrCode}', [RegistrationController::class, 'showQRCode'])->name('qrcode.show');

// Admin routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/scan-qr', [DashboardController::class, 'scanQR'])->name('admin.scan-qr');
    Route::post('/verify-qr', [DashboardController::class, 'verifyQR'])->name('admin.verify-qr');
    Route::get('/registration/{id}', [DashboardController::class, 'viewRegistration'])->name('admin.registration.view');
    Route::post('/check-in', action: [RegistrationController::class, 'checkIn'])->name('checkin');
});

// Fallback untuk halaman yang tidak ada
Route::fallback(function () {
    return redirect('/');
});