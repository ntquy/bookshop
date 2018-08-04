<?php

use Illuminate\Database\Seeder;

class RateBooksTable extends Seeder
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
            DB::table('rates')->insert([
                'star' => $faker->numberBetween($min = 1, $max = 5),
                'user_id' => $faker->numberBetween($min = 1, $max = 3),
                'book_id' => $faker->numberBetween($min = 1, $max = 50)
            ]);
        }
    }
}
