<?php

use App\Http\Controllers\User\PhotosController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function () {

    Route::get('/settings', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('settings')->prefix('manager');

    Route::get('/manage-photos', PhotosController::class)->name('manage-photos')->prefix('manager');
    Route::get('/manage-settings', function () {})->name('manage-settings')->prefix('manager');
});
