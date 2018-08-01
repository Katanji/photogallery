<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Photo;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['master', 'album']);
    }

    public function master()
    {
        $albums = Album::orderBy('order')->with('photos')->paginate(12);

        foreach ($albums as $album) {
            $avatar = Photo::where('album_id', $album->id)->orderBy('order')->first();
            $avatar === null ?: $album->avatar = $avatar->file;
        }

        return view('front.index', compact('albums'));
    }

    public function albums()
    {
//        $albums = Album::orderBy('order')->with('photos')->get();
        $albums = Album::orderBy('order')->with('photos')->paginate(12);

        foreach ($albums as $album) {
            $avatar = Photo::where('album_id', $album->id)->orderBy('order')->first();
            $avatar === null ?: $album->avatar = $avatar->file;
        }

        return view('admin.albums', compact('albums'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(AlbumRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'description' => $request['description']
        ];

        $data['order'] = Album::all('order')->count() + 1;

        Album::create($data);

        return redirect('/admin');
    }

    public function newData()
    {
        $list = request('list');
        $output = array();
        $list = parse_str($list, $output);  // заношу полученную из POST строку в массив
        $ids = $output['item'];

        $order = 1;
        foreach ($ids as $id) {
            $album = Album::find($id);
            $album->order = $order;
            $album->save();
            $order++;
        }
    }

    public function edit($albumId)
    {
        $album = Album::find($albumId);
        $photos = Photo::where('album_id', $albumId)->orderBy('order')->get();

        return view('admin.album', compact('photos', 'album'));
    }

    public function album($albumId)
    {
        $album = Album::find($albumId);
        $photos = Photo::where('album_id', $albumId)->orderBy('order')->get();

        return view('front.album', compact('photos', 'album'));
    }
}
