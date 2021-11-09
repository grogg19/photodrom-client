<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotoRepository implements PhotoRepositoryInterface
{
    public function getListPhotos($currentPage = 1, int $perPage = 20): LengthAwarePaginator
    {
        return Photo::orderBy('date_exif', 'desc')
            ->with('tags')
            ->paginate($perPage, '*', 'page', $currentPage);
    }


    public function getListPhotosByTags(array $tags, $currentPage = 1, int $perPage = 20): LengthAwarePaginator
    {
        return Photo::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('slug', $tags);
        })
            ->with('tags')
            ->paginate($perPage, '*', 'page', $currentPage);
    }
}
