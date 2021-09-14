<?php

use App\Http\Controllers\Pub\PhotosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhotosController::class, 'index']);

Route::get('/albums/{year}/{month}/thumbnails/big/{name}', [PhotosController::class, 'showThumb']);
Route::get('/albums/{year}/{month}/thumbnails/small/{name}', [PhotosController::class, 'showSmall']);
Route::get('/albums/{year}/{month}/original/{name}', [PhotosController::class, 'showOriginal']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';


