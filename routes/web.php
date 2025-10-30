<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/contact', [LandingPageController::class, 'contact'])->name('contact.submit');

// routes/web.php
Route::get('/event', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}/register', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/events/{event}/register', [RegistrationController::class, 'store'])->name('registrations.store');
Route::get('/registrations/{registration}/success', [RegistrationController::class, 'success'])->name('registrations.success');
Route::get('/scan', [ScanController::class, 'index'])->name('scan.index');
Route::post('/scan/verify', [ScanController::class, 'verify'])->name('scan.verify');
Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');