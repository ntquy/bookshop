<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
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
            DB::table('comments')->insert([
                'content' => $faker->text($maxNbChars = 20),
                'parent_id' => $faker->numberBetween($min = 1, $max = 50),
                'user_id' => $faker->numberBetween($min = 1, $max = 3),
                'book_id' => $faker->numberBetween($min = 1, $max = 50)
            ]);
        }
    }
}
