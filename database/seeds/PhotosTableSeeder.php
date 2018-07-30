<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    public function run()
    {
        $albumIds = \App\Album::all()->pluck('id');

        foreach ($albumIds as $id) {
            factory(App\Photo::class, 6)->create(['album_id' => $id]);
        }
    }
}
