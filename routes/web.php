<?php

use App\Http\Controllers\Pub\PhotosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhotosController::class, 'index']);

Route::get('/albums/{year}/{month}/thumbnails/big/{name}', [PhotosController::class, 'showThumb'])->middleware('auth');
Route::get('/albums/{year}/{month}/thumbnails/small/{name}', [PhotosController::class, 'showSmall'])->middleware('auth');
Route::get('/albums/{year}/{month}/original/{name}', [PhotosController::class, 'showOriginal'])->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';


