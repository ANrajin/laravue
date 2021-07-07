<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ConfirmEmailController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'pages.index')->name('laravue');

/**
 * Auth routes
 */
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('register/confirm', [ConfirmEmailController::class, 'index'])->name('confirm-email');

Route::post('/login', [AuthSessionController::class, 'login']);
Route::delete('logout', [AuthSessionController::class, 'destroy'])->name('session.logout');
