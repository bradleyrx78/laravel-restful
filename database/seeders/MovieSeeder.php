<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 20; $i++ ){
            Movie::create([
                'name' => $faker->sentence,
                'genre' => $faker->name,
                'release_date' => $faker->date,
            ]);
        }
    }
}
