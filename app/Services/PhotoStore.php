<?php

namespace App\Services;

use App\Http\Requests\Photos\StorePhotoRequest;
use App\Http\Requests\Tags\TagRequest;
use App\Models\Interfaces\HasTags;

class PhotoStore
{
    /**
     * @param StorePhotoRequest $request
     * @param TagsSynchronizer $tagsSynchronizer
     * @param TagRequest $tagsRequest
     * @param HasTags $photo
     * @return HasTags
     */
    public function updatePhotoTags(StorePhotoRequest $request, TagsSynchronizer $tagsSynchronizer, TagRequest $tagsRequest, HasTags $photo)
    {
        $tags = $tagsRequest->getTags($request);
        $tagsSynchronizer->syncWithoutDetaching($tags, $photo);
    }
}
