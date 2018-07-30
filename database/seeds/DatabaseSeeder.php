<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
    }
}
