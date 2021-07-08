<?php

use Illuminate\Support\Facades\Route;

/**
 * All of our admin routes
 * will be defined here
 */

Route::view('dashboard', 'admin.dashboard')->name('dashboard');

Route::resource('series', 'SeriesController');
