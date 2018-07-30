<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\User;
use App\Photo;
use Image;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['master', 'album']);
    }

    public function master()
    {
        $albums = Album::orderBy('order')->paginate(12);
        $photos = Photo::orderBy('order')->get();

        return view('front.index', compact('albums', 'photos'));
    }

    public function albums()
    {
        $albums = Album::orderBy('order')->get();
        return view('admin.albums', compact('albums'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:albums|max:191',
            'description' => 'required|max:191'
        ]);

        $data = [
            'name' => request('name'),
            'description' => request('description')
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

    public function edit($album)
    {
        $albumId = Album::where('name', $album)->first();
        $photos = Photo::where('album_id', $albumId['id'])->orderBy('order')->get();

        return view('admin.album', compact('photos', 'album'));
    }

    public function album($album)
    {
        $albumId = Album::where('name', $album)->first();
        $photos = Photo::where('album_id', $albumId['id'])->orderBy('order')->get();

        return view('front.album', compact('photos', 'albumId'));
    }
}
