<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Models\Album;
use App\Models\Photo;
use Image;

class PhotoController extends Controller
{
    public function store(PhotoRequest $request, $album_id)
    {
        $image = $request->file('featured_image');

        if (getimagesize($image)) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 200)->save($location);

            $album = substr(strrchr(url()->previous(), "/"), 1);

            $photo = new Photo;
            $photo->album_id = $album_id;
            $photo->order = Photo::all()->count();
            $photo->name = $request['name'];
            $photo->file = $filename;
            $photo->save();

            return redirect('/admin/album/' . $album);
        } else {
            echo "incorrect file extension";
        }
    }

    public function add(Album $album)
    {
        return view('admin.add_photos', compact('album'));
    }

    public function saveOrder()
    {
        $list = request()->list;
        $output = [];
        $list = parse_str($list, $output);  // заношу полученную из POST строку в массив
        $ids = $output['item'];

        $order = 1;
        foreach ($ids as $id) {
            $photo = Photo::findOrFail($id);
            $photo->order = $order;
            $photo->save();
            $order++;
        }
    }
}
