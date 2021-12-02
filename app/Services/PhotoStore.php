<?php

namespace App\Services;

use App\Http\Requests\Photos\StorePhotoRequest;
use App\Http\Requests\Tags\TagRequest;
use App\Models\Interfaces\HasTags;
use Illuminate\Support\Collection;

class PhotoStore
{
    /**
     * @param StorePhotoRequest $request
     * @param TagsSynchronizer $tagsSynchronizer
     * @param TagRequest $tagsRequest
     * @param Collection $photos
     */
    public function updatePhotoTags(StorePhotoRequest $request, TagsSynchronizer $tagsSynchronizer, TagRequest $tagsRequest, Collection $photos)
    {

        $tags = $tagsRequest->getTags($request);

        foreach ($photos as $photo) {
            $tagsSynchronizer->syncWithoutDetaching($tags, $photo);
        }
    }
}
