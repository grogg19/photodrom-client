<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagsController extends Controller
{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(Collection $tags, Request $request)
    {
        $currentPage = $request->get('page') ?: 1;

        $listPhotos = Tag::whereIn('slug', $tags)
            ->with(['photos'])
            ->paginate(50, '*', 'page', $currentPage);

        if($currentPage > 1) {
            return response()->json($listPhotos);
        }

        return view('photos', compact('listPhotos'));
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getSuitableTags(Request $request): string
    {
        $partTag = $request->get('part_tag');

        $listTags = $this->tagRepository->searchTagsByPart($partTag);

        return $listTags->toJson();
        //return response()->json($listTags);

    }
}
