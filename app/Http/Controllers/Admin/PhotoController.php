<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Album;
use App\Models\Photo;
use Image;

class PhotoController extends Controller
{
    public function create(Album $album)
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

        return response()->json(['photos' => 'sorted']);
    }

    public function store(PhotoRequest $request, Album $album)
    {
        $image = $request->file('featured_image');

        if (getimagesize($image)) {
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 200)->save($location);

            $photo = new Photo;
            $photo->album_id = $album->id;
            $photo->order = Photo::all()->count();
            $photo->name = $request['name'];
            $photo->file = $filename;
            $photo->save();

            return redirect('/admin/albums/' . $album->id . '/edit');
        } else {
            echo "incorrect file extension";
        }
    }
}
