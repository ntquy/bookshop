<?php

use Illuminate\Database\Seeder;

class Cat_BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('category_book')->insert([
                'category_id' => $faker->numberBetween($min = 1, $max = 6),
                'book_id' => $faker->numberBetween($min = 1, $max = 50)
            ]);
        }
    }
}
