<?php

namespace App\Faker;

use App\Helpers\DownloaderHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class FakerImageProvider
{
    /**
     * @param string $dir
     * @param int    $width
     * @param int    $height
     *
     * @return string
     */
    public function loremFlickrImage(string $dir = '', int $width = 500, int $height = 500): string
    {
        $fileName = $dir . '/' . Str::random(12) . '.jpg';


        $url = "https://loremflickr.com/{$width}/{$height}";


        return DownloaderHelper::fetchImage($url, $dir, true);
    }


}