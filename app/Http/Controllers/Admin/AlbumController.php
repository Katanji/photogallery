<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Photo;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['master', 'album']);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function edit(Album $album)
    {
        $photos = Photo::where('album_id', $album->id)->orderBy('order')->get();

        return view('admin.album', compact('photos', 'album'));
    }

    public function saveOrder()
    {
        $list = request('list');
        $output = array();
        $list = parse_str($list, $output);  // заношу полученную из POST строку в массив
        $ids = $output['item'];

        $order = 1;
        foreach ($ids as $id) {
            $album = Album::findOrFail($id);
            $album->order = $order;
            $album->save();
            $order++;
        }

        return response()->json(['albums' => 'sorted']);
    }

    public function store(AlbumRequest $request)
    {
        $data = [
            'name'        => $request['name'],
            'description' => $request['description']
        ];

        $data['order'] = Album::all('order')->count() + 1;

        Album::create($data);

        return redirect('/admin');
    }
}
