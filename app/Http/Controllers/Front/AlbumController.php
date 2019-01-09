<?php
declare(strict_types = 1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\PrepareJob;
use App\Jobs\PublishJob;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Facades\Redis;

class AlbumController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // database
//        \App\Jobs\SendMessage::withChain([
//            new PrepareJob('Prepare...'),
//            new PublishJob('Publish!'),
//        ])->dispatch('Start Job');

        // redis
//        Redis::set('user:message:1', 'hi');
//        var_dump(Redis::keys('*'));

        $albums = Album::orderBy('order')->with('photos')->paginate(12);

        foreach ($albums as $album) {
            $avatar = Photo::where('album_id', $album->id)->orderBy('order')->first();
            $avatar === null ?: $album->avatar = $avatar->file;
        }

        return view('front.index', compact('albums'));
    }


    public function show(Album $album)
    {
        $photos = Photo::where('album_id', $album->id)->orderBy('order')->get();

        return view('front.album', compact('photos', 'album'));
    }
}
