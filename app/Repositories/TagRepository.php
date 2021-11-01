<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    /**
     * All tags with photos
     * @return mixed
     */
    public function tagsCloud()
    {
        return Tag::has('photos')
            ->withCount('photos')
            ->orderBy('photos_count')
            ->take(7)
            ->get();
    }
}
