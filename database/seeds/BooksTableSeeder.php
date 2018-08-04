<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('books')->insert([
                'name' => $faker->name,
                'author' => $faker->name,
                'quantity' => $faker->numberBetween($min = 1, $max =1000),
                'price' => $faker->numberBetween($min = 50000, $max = 500000),
                'image' => $faker->image,
                'publisher_id' => $faker->numberBetween($min = 1, $max = 4),
                'promotion_id' => $faker->numberBetween($min = 1, $max = 4),
                'summary' => $faker->text($maxNbChars = 50),
                'content' => $faker->realText($maxNbChars = 300, $indexSize = 2)
            ]);
        }
    }
}
