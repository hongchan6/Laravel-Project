<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FavsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favs')->insert([
            'user_id'=>6,
            'dish_name'=>'Fried Rice',
            'cuisine'=>'Asian',
        ]);
        DB::table('favs')->insert([
            'user_id'=>6,
            'dish_name'=>'Steamed Fish',
            'cuisine'=>'Asian',
        ]);
        DB::table('favs')->insert([
            'user_id'=>6,
            'dish_name'=>'Tofu Soup',
            'cuisine'=>'Asian',
        ]);
        DB::table('favs')->insert([
            'user_id'=>6,
            'dish_name'=>'Sushi',
            'cuisine'=>'Asian',
        ]);
        
    }
}
