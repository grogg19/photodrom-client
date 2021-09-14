<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PhotoRepository implements PhotoRepositoryInterface
{
    public function getListPhotos($currentPage = 1, int $perPage = 30): LengthAwarePaginator
    {
        return Photo::with('tags')
            ->paginate($perPage, '*', 'page', $currentPage);
    }
}
