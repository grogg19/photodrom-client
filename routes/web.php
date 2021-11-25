<?php

use App\Http\Controllers\Pub\PhotosController;
use App\Http\Controllers\Pub\TagsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhotosController::class, 'index'])->name('index');
Route::get('/search-tags', [TagsController::class, 'getSuitableTags'])->name('tags.searchTags');
Route::post('/photos-by-tags/', [PhotosController::class, 'getListPhotosByTags'])->name('photos.getPhotosByTags');
Route::get('/tag/{tag}', [PhotosController::class, 'getListPhotosByTag']);

Route::patch('/updatePhotoTags/{photo}', [PhotosController::class, 'updatePhotoTags'])->name('photos.updateTagsInPhoto')
    ->middleware('auth');

Route::get('/albums/{year}/{month}/thumbnails/big/{name}', [PhotosController::class, 'showThumb']);
Route::get('/albums/{year}/{month}/thumbnails/small/{name}', [PhotosController::class, 'showSmall']);
Route::get('/albums/{year}/{month}/original/{name}', [PhotosController::class, 'showOriginal']);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


