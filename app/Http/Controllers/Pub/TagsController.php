<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagsController extends Controller
{
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
}
