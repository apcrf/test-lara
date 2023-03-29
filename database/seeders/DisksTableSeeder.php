<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Класс модели
use App\Models\Disk;

class DisksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Disk::truncate();

        // Create records manually
        Disk::create([
            'disk_artist_id' => 1,
            'disk_name' => 'Headlines And Deadlines (The Hits Of A-ha)',
            'disk_no' => 1,
            'disk_year' => 1991,
            'disk_publisher_id' => 1,
            'disk_note' => 'A-ha - Мелодия',
            'created_at' => '2022-01-02'
        ]);
        Disk::create([
            'disk_artist_id' => 1,
            'disk_name' => 'Headlines And Deadlines (The Hits Of A-ha)',
            'disk_no' => 2,
            'disk_year' => 1991,
            'disk_publisher_id' => 1,
            'disk_note' => 'A-ha - Мелодия',
            'created_at' => '2022-01-02'
        ]);
        Disk::create([
            'disk_artist_id' => 2,
            'disk_name' => 'Voulez-Vous',
            'disk_no' => 0,
            'disk_year' => 1979,
            'disk_publisher_id' => 2,
            'disk_note' => 'ABBA - Polar',
            'created_at' => '2022-01-02'
        ]);

        // And now, let's create a few rows in our database:
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 150; $i++) {
            Disk::create([
                'disk_artist_id' => $this->getRandomArtistId(),
                'disk_name' => $faker->sentence,
                'disk_no' => $faker->numberBetween(0, 2),
                'disk_year' => $faker->year(),
                'disk_publisher_id' => $this->getRandomPublisherId(),
                'disk_note' => $faker->paragraph,
            ]);
        }
    }

    // 1 random id from the related table
    private function getRandomArtistId()
    {
        $row = \App\Models\Artist::inRandomOrder()->first();
        return $row->artist_id;
    }

    // 1 random id from the related table
    private function getRandomPublisherId()
    {
        $row = \App\Models\Publisher::inRandomOrder()->first();
        return $row->publisher_id;
    }

}
