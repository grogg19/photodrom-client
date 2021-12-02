<?php

namespace App\Repositories\Interfaces;

use App\Models\Photo;
use Illuminate\Support\Collection;

interface PhotoRepositoryInterface
{
    public function getListPhotos();

    public function getListPhotosByTags(array $tags);

    public function updatePhoto(Photo $photo, array $attributes);

    public function getListPhotosByIds(Collection $photos);
}
