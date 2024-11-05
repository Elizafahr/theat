<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TheatreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/events/{id}', 'App\Http\Controllers\EventController@show')->name('event.show');

  Route::get('/theatres', [App\Http\Controllers\TheatreController::class, 'index'])->name('theatres');
Route::get('/theatres/{id}', [App\Http\Controllers\TheatreController::class, 'show'])->name('theatre');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
