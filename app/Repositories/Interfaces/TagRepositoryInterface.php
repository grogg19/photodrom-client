<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    public function tagsCloud();

    public function searchTagsByPart($partTag);
}
