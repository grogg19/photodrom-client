<?php

use App\Http\Controllers\User\PhotosController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function () {

    Route::get('/admin/settings', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('admin.settings');

    Route::get('/admin/manage-photos', [PhotosController::class, 'index'])->name('admin.manage-photos');
    Route::get('/admin/manage-settings', function () {})->name('admin.manage-settings');
});
