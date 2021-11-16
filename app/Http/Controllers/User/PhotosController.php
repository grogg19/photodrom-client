<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public $photoRepository;

    /**
     * @param PhotoRepositoryInterface $photoRepository
     */
    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->middleware(['auth']);
        $this->photoRepository = $photoRepository;
    }

    /**
     * Возвращает пачку записей фотографий из БД
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $currentPage = $request->get('page') ?: 1;

        $photos = $this->photoRepository->getListPhotos($currentPage, 50);

        return view('user.list_photos', compact("photos"));
    }
}
