<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Album::class, 10)->create();
    }
}
