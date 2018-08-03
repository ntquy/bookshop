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

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('books')->insert([
                'name' => $faker->name,
                'author' => 'Nguyen Du',
                'quantity' => 20,
                'price' => 100000,
                'image' => $faker->image,
                'publisher_id' => 1,
                'promotion_id' => 2,
            ]);
        }
    }
}
