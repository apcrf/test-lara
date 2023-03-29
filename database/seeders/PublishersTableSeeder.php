<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Класс модели
use App\Models\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        // !!! Cannot truncate a table referenced in a foreign key constraint !!!
        // Publisher::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few rows in our database:
        for ($i = 0; $i < 50; $i++) {
            Publisher::create([
                'publisher_name' => $faker->sentence,
                'publisher_note' => $faker->paragraph,
            ]);
        }
    }
}
