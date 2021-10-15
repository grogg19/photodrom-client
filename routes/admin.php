<?php

use Illuminate\Support\Facades\Route;

Route::get('/settings', function () {
    return view('dashboard');
})->middleware(['auth'])->name('settings');
