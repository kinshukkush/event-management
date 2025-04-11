<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/welcome', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class);

    Route::post('/events/{event}/book', [BookingController::class, 'store'])->name('events.book');
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');

    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

});
