<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagsController extends Controller
{
    protected $tagRepository;

    /**
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getSuitableTags(Request $request): string
    {
        $partTag = $request->get('part_tag');

        /** @var Collection $listTags */
        $listTags = $this->tagRepository->searchTagsByPart($partTag);

//        if ($listTags->isEmpty()) {
//            $listTags = $this->tagRepository->tagsCloud();
//        }

        return $listTags->toJson();
    }

}
