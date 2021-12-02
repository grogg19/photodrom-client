<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photos\StorePhotoRequest;
use App\Http\Requests\Tags\TagRequest;
use App\Models\Photo;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use App\Services\PhotoStore;
use App\Services\TagsSynchronizer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     */
    public function index(Request $request)
    {
        $currentPage = $request->get('page') ?: 1;

        $listPhotos = $this->photoRepository->getListPhotos($currentPage, 50);

        //$listPhotos = response()->json($listPhotos);

        if ($currentPage > 1) {
            //return response()->json($listPhotos);
            return $listPhotos;
        }

        return view('photos', compact('listPhotos'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListPhotosByTags(Request $request): JsonResponse
    {
        $currentPage = $request->get('page') ?: 1;

        $tags = ($request->post('tags')) ?: [];

        $listPhotos =  $this->photoRepository->getListPhotosByTags($tags, $currentPage, 50);

        return response()->json($listPhotos);
    }

    /**
     * @param Request $request
     * @param $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|JsonResponse
     */
    public function getListPhotosByTag(Request $request, $tag)
    {
        $currentPage = $request->get('page') ?: 1;

        $listPhotos =  $this->photoRepository->getListPhotosByTags([$tag], $currentPage, 50);

        return ($currentPage > 1)
            ? response()->json($listPhotos)
            : view('photos', compact('listPhotos'));

    }

    /**
     * @param $year
     * @param $month
     * @param $name
     * @return false|int
     */
    public function showThumb($year,$month,$name) {
        header('Content-type:image/jpeg');
        return readfile("/media/hdd/albums/".$year."/".$month."/thumbnails/big/".$name);
    }

    /**
     * @param $year
     * @param $month
     * @param $name
     * @return false|int
     */
    public function showOriginal($year,$month,$name) {
        header('Content-type:image/jpeg');
        return readfile("/media/hdd/albums/".$year."/".$month."/original/".$name);
    }

    /**
     * @param $year
     * @param $month
     * @param $name
     * @return false|int
     */
    public function showSmall($year,$month,$name) {
        header('Content-type:image/jpeg');
        return readfile("/media/hdd/albums/".$year."/".$month."/thumbnails/small/".$name);
    }

}
