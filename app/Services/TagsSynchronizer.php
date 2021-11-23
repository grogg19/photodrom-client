<?php

namespace App\Services;

use App\Models\Interfaces\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    /**
     * @param Collection $tags
     * @param HasTags $model
     */
    public function syncWithoutDetaching(Collection $tags, HasTags $model)
    {
        /** @var Collection $modelTags */
        $modelTags = $model->tags->keyBy('name');

        // ids для метода sync()
        $syncIds = $modelTags
            ->intersectByKeys($tags)
            ->pluck('id')
            ->toArray();

        $tagsToAttach = $tags->diffKeys($modelTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->syncWithoutDetaching($syncIds);
    }
}
