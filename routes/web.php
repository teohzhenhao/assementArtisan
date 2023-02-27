<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Route::get('/chooseSeat', [AuthManager::class, 'chooseSeat'])->name('chooseSeat');

Route::get('/choose-seat', [AuthManager::class, 'index'])->name('choose-seat');
Route::get('/checkout', [AuthManager::class, 'index'])->name('checkout');

Route::get('/movie', [AppController::class, 'showMoviesPage'])->name('movie');
Route::get('/movie/{movie}', [AppController::class, 'showSeatPage'])->name('seat');

Route::get('/showtime/{showtime}', [AppController::class, 'showShowtimePage'])->name('showtime');
Route::post('/showtime/{showtime}/checkout', [AppController::class, 'handleCheckoutAction'])->name('checkout.post');

