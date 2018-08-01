<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    public function run()
    {
        $albumIds = \App\Models\Album::all()->pluck('id');

        foreach ($albumIds as $id) {
            factory(App\Models\Photo::class, 6)->create(['album_id' => $id]);
        }
    }
}
