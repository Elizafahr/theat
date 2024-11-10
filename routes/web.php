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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilterController;


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
Route::delete('/events/{eventId}/cancel-booking/{bookingId}', [TicketBookingController::class, 'cancelBooking'])->name('ticketBooking.cancel');



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

// афиша
Route::get('/afisha', [EventController::class, 'indexEvent'])->name('afisha'); // Список мероприятий

// Профиль пользователя
Route::get('/profile/{id}', [UserController::class, 'indexUser'])->name('profile.show');

// Добавление в избранное
Route::post('/add-to-favorites/{eventId}', [EventController::class, 'addToFavorites'])->middleware('auth');

// Удаление из избранного
Route::post('/remove-from-favorites/{eventId}', [EventController::class, 'removeFromFavorites'])->name('remove-from-favorites');

// // Административные маршруты
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard'); // Панель управления
//     Route::get('/admin/news', [AdminController::class, 'newsIndex'])->name('admin.news.index'); // Список новостей
//     Route::get('/admin/theatres', [AdminController::class, 'theatreIndex'])->name('admin.theatres.index'); // Список театров
//     Route::get('/admin/bookings', [AdminController::class, 'bookingIndex'])->name('admin.bookings.index'); // Список бронирований

//     // Маршруты для подтверждения и отклонения бронирований
//     Route::post('/admin/approve-booking/{id}', [AdminController::class, 'approveBooking'])->name('approveBooking');
//     Route::post('/admin/reject-booking/{id}', [AdminController::class, 'rejectBooking'])->name('rejectBooking');
// });

// // Удаление новостей
// Route::delete('/news/{id}', [AdminController::class, 'destroyNews'])->name('news.destroy');

// // Удаление театров
// Route::delete('/admin/theatres/{id}', [AdminController::class, 'destroyTheatre'])->name('theatres.destroy');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard'); // Панель управления
    Route::get('/admin/news', [AdminController::class, 'newsIndex'])->name('admin.news.index'); // Список новостей
    Route::get('/admin/theatres', [AdminController::class, 'theatreIndex'])->name('admin.theatres.index'); // Список театров
    Route::get('/admin/bookings', [AdminController::class, 'bookingIndex'])->name('admin.bookings.index'); // Список бронирований

    // Маршруты для подтверждения и отклонения бронирований
    Route::post('/admin/approve-booking/{id}', [AdminController::class, 'approveBooking'])->name('approveBooking');
    Route::post('/admin/reject-booking/{id}', [AdminController::class, 'rejectBooking'])->name('rejectBooking');

    // Маршруты для создания и редактирования новостей
    Route::get('/admin/news/create', [AdminController::class, 'createNews'])->name('news.create');
    Route::post('/admin/news', [AdminController::class, 'storeNews'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [AdminController::class, 'editNews'])->name('news.edit');
    Route::patch('/admin/news/{id}', [AdminController::class, 'updateNews'])
        ->name('news.update')
        ->middleware('auth');
    Route::delete('/admin/news/{id}', [AdminController::class, 'destroyNews'])->name('news.destroy');

    // Маршруты для создания и редактирования театров
    Route::get('/admin/theatres/create', [AdminController::class, 'createTheatre'])->name('theatres.create');
    Route::post('/admin/theatres', [AdminController::class, 'storeTheatre'])->name('theatres.store');
    Route::get('/admin/theatres/{id}/edit', [AdminController::class, 'editTheatre'])->name('theatres.edit');
    Route::patch('/admin/theatres/{id}', [AdminController::class, 'updateTheatre'])->name('theatres.update')->middleware('auth');


    Route::get('/admin/bookings/create', [AdminController::class, 'createBooking'])->name('bookings.create');
    Route::post('/admin/bookings', [AdminController::class, 'storeBooking'])->name('bookings.store');
    Route::get('/admin/bookings/{id}/edit', [AdminController::class, 'editBooking'])->name('bookings.edit');
    Route::patch('/admin/bookings/{id}', [AdminController::class, 'updateBooking'])->name('bookings.update');

    // Удаление новостей, театров и бронирований
    Route::delete('/news/{id}', [AdminController::class, 'destroyNews'])->name('news.destroy');
    Route::delete('/theatres/{id}', [AdminController::class, 'destroyTheatre'])->name('theatres.destroy');
});
Route::get('/admin/news/create', [AdminController::class, 'createNews'])->name('news.create');
Route::post('/admin/news', [AdminController::class, 'storeNews'])->name('news.store');

Route::post('/theatres/store', [AdminController::class, 'storeTheatre'])->name('theatres.store');
