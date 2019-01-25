<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Album;
use App\Models\Photo;

class HomeController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('order')->with('photos')->paginate(12);

        foreach ($albums as $album) {
            $album->avatar = optional($album->photos->first())->file;
        }

        return view('admin.albums', compact('albums'));
    }
}
