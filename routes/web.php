<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/products', function () {
    return view('products');
});
//Route::post('/contact/submit')->name('contact.submit')->uses('ContactController@store');

Route::controller(ContactController::class)->group(function () {
    Route::post('/contact/submit','store')->name('contact.submit');
});
Route::controller(UserController::class)->group(function () {
   Route::get('/login', 'Login')->name('login.show');           // or .view
   Route::post('/login/submit', 'CheckAuth')->name('login.process');     // or .handle, .attempt

});