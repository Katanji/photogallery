<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('order')->with('photos')->paginate(12);

        foreach ($albums as $album) {
            $avatar = Photo::where('album_id', $album->id)->orderBy('order')->first();
            $avatar === null ?: $album->avatar = $avatar->file;
        }

        return view('front.index', compact('albums'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Album $album)
    {
        $photos = Photo::where('album_id', $album->id)->orderBy('order')->get();

        return view('front.album', compact('photos', 'album'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
