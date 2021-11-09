<?php

namespace App\Repositories\Interfaces;

interface PhotoRepositoryInterface
{
    public function getListPhotos();

    public function getListPhotosByTags(array $tags);
}
