<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Make sure this is imported

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services');

// Products (Protected Route)
Route::get('/products', function () {
    return view('products');
})->middleware('auth');

// Contact Form Submission
Route::controller(ContactController::class)->group(function () {
    Route::post('/contact/submit', 'store')->name('contact.submit');
});

// Auth & User Routes
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'Login')->name('login');
    Route::post('/login/submit', 'CheckAuth')->name('login.process');
    Route::get('/profile', 'profile')->middleware('auth')->name('profile');
});

// Logout (Protected POST)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::fallback(function () {
    return view('errors.404'); // You can customize this
});