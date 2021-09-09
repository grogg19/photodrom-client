<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function index()
    {
        return view('photos');
    }
}
