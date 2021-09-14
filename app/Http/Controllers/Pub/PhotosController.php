<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * @var PhotoRepositoryInterface
     */
    protected $photoRepository;

    /**
     * @param PhotoRepositoryInterface $photoRepository
     */
    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $currentPage = $request->get('page') ?: 1;

        $listPhotos = $this->photoRepository->getListPhotos($currentPage);

        return view('photos', compact('listPhotos'));
    }
}
