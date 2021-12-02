<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photos\StorePhotoRequest;
use App\Http\Requests\Tags\TagRequest;
use App\Models\Photo;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use App\Services\PhotoStore;
use App\Services\TagsSynchronizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

    /**
     * @param StorePhotoRequest $request
     * @param TagsSynchronizer $tagsSynchronizer
     * @param TagRequest $tagsRequest
     * @param PhotoStore $photoStore
     * @return JsonResponse
     */
    public function updatePhotoTags(StorePhotoRequest $request, TagsSynchronizer $tagsSynchronizer, TagRequest $tagsRequest, PhotoStore $photoStore): JsonResponse
    {
        $photosIds = collect($request->post('photos'));

        dd($request->post('photos'));

        if($photosIds->isEmpty()) {
            return response()->json(['message' => 'Нет идентификаторов фотографий']);
        }
        /** @var Collection $photos */
        $photos = $this->photoRepository->getListPhotosByIds($photosIds);

        $photoStore->updatePhotoTags($request, $tagsSynchronizer, $tagsRequest, $photos);

        return response()->json($this->photoRepository->getListPhotosByIds($photosIds));
    }
}
