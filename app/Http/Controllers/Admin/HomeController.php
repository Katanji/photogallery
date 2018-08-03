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
            $avatar = Photo::where('album_id', $album->id)->orderBy('order')->first();
            $avatar === null ?: $album->avatar = $avatar->file;
        }

        return view('admin.albums', compact('albums'));
    }
}
