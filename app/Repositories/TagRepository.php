<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{
    /**
     * All tags with photos
     * @return mixed
     */
    public function tagsCloud(): Collection
    {
        return Tag::has('photos')
            ->withCount('photos')
            ->orderBy('photos_count')
            ->take(7)
            ->get();
    }

    /**
     * Возвращает теги начинающиеся с фрагмента $partTag
     * @param $partTag
     * @return Collection
     */
    public function searchTagsByPart($partTag): Collection
    {
        return Tag::has('photos')
            ->where('name', 'like', $partTag . '%')
            ->select('name', 'slug')
            ->withCount('photos')
            ->take(7)
            ->get();
    }
}
