<?php

namespace App\Services;

use App\Http\Requests\Photos\StorePhotoRequest;
use App\Http\Requests\Tags\TagRequest;
use App\Models\Interfaces\HasTags;
use App\Repositories\Interfaces\PhotoRepositoryInterface;

class PhotoStore
{
    /**
     * @param StorePhotoRequest $request
     * @param TagsSynchronizer $tagsSynchronizer
     * @param TagRequest $tagsRequest
     * @param PhotoRepositoryInterface $photoRepository
     * @param HasTags $article
     */
    public function update(StorePhotoRequest $request, TagsSynchronizer $tagsSynchronizer, TagRequest $tagsRequest, PhotoRepositoryInterface $photoRepository, HasTags $photo)
    {
        $attributes = $request->validated();

        $attributes['is_published'] = $request->boolean('is_published');

        $photoRepository->updatePhoto($photo, $attributes);

        $tags = $tagsRequest->getTags($request);

        $tagsSynchronizer->sync($tags, $photo);
    }
}
