<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $datacategories = DB::table('categories')->pluck('id')->toArray();

        foreach(range(1, 50) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->word,
                'category_id' => $faker->randomElement($datacategories),
                'year' => rand(2000, 2020),
                'actor' => $faker->name,
                'description' => $faker->text

            ]);
        }
    }
}
