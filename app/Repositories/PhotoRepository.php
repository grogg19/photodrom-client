<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PhotoRepository implements PhotoRepositoryInterface
{
    public function getListPhotos($currentPage = 1, int $perPage = 20): LengthAwarePaginator
    {
        $listPhotos = Photo::orderBy('date_exif', 'desc')
            ->with('tags')
            ->paginate($perPage, '*', 'page', $currentPage)
            ;

        return $listPhotos->setCollection($listPhotos->keyBy('id'));

    }

    public function getListPhotosByTags(array $tags, $currentPage = 1, int $perPage = 20): LengthAwarePaginator
    {
        return Photo::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('name', $tags);
        })
            ->with('tags')
            ->paginate($perPage, '*', 'page', $currentPage);
    }

    /**
     * @param Collection $photos
     * @return Collection
     */
    public function getListPhotosByIds(Collection $photos): Collection
    {
        return Photo::whereIn('id', $photos)
            ->with('tags')
            ->get();
    }

    /**
     * @param Photo $photo
     * @param array $attributes
     */
    public function updatePhoto(Photo $photo, array $attributes)
    {
        $photo->update($attributes);
    }
}
