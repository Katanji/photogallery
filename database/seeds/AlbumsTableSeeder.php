<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            factory(App\Album::class, 1)->create(['order' => $i]);
        }
    }
}
