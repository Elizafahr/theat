<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TicketBookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;


// Публичные маршруты
Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/events/{id}', 'App\Http\Controllers\EventController@show')->name('event.show');
Route::get('/theatres', [TheatreController::class, 'index'])->name('theatres');
Route::get('/theatres/{id}', [TheatreController::class, 'show'])->name('theatre');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Маршруты для покупки билетов

Route::get('/events/{eventId}/book', [TicketBookingController::class, 'indexBooking'])->name('ticketBooking.index');
Route::post('/events/{eventId}/book', [TicketBookingController::class, 'store'])->name('ticketBooking.store');
Route::get('/events/{eventId}/cancel-booking/{bookingId}', [TicketBookingController::class, 'cancelBooking'])->name('ticketBooking.cancel');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Дополнительные маршруты для регистрации
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Маршрут для восстановления пароля
Route::get('/password/reset', [AuthController::class, 'showResetForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/afisha', [EventController::class, 'index'])->name('afisha');


Route::get('/profile/{id}', [UserController::class, 'indexUser']) ->name('profile.show');

Route::post('/add-to-favorites/{eventId}', [EventController::class, 'addToFavorites'])->middleware('auth');

Route::post('/remove-from-favorites/{eventId}', [EventController::class, 'removeFromFavorites'])->name('remove-from-favorites');
