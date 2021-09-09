<?php

use App\Http\Controllers\Pub\PhotosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhotosController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


