<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface TagRepositoryInterface
{
    public function tagsCloud();

    public function searchTagsByPart($partTag);
}
