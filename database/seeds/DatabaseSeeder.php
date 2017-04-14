<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('products')->insert([
            'name' => str_random(10),
            'price' => rand(10,100),
        ]);
        DB::table('vouchers')->insert([
            'start_date' => date("Y-m-d", strtotime('now')),
            'end_date' => date("Y-m-d", strtotime('tomorrow')),
            'discount' => '10',
        ]);
    }
}
