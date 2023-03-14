<?php

// cd D:\Server\web\test-lara\
// php artisan make:seeder ArtistsTableSeeder
// php artisan db:seed --class=ArtistsTableSeeder

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Подключаем класс модели
use App\Models\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Artist::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few rows in our database:
        for ($i = 0; $i < 50; $i++) {
                Artist::create([
                'artist_name' => $faker->sentence,
                'artist_note' => $faker->paragraph,
            ]);
        }
    }
}
