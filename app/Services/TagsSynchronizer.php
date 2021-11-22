<?php

namespace App\Services;

use App\Models\Interfaces\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        /** @var Collection $modelTags */
        $modelTags = $model->tags()->keyBy('name');

        $tags = $tags->keyBy(function ($item) {
            return trim($item);
        });

        // ids для метода sync()
        $syncIds = $modelTags
            ->intersectByKeys($tags)
            ->pluck('id')
            ->toArray();

        $tagsToAttach = $tags->diffKeys($modelTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag, 'slug' => Str::slug($tag)]);
            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);
    }
}
