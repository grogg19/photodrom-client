<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        $photos = [];
        return view('user.list_photos', compact("photos"));
    }
}
