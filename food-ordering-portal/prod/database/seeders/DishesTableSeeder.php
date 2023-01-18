<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes')->insert([
            'user_id'=>2,
            'name'=>'Fried Rice',
            'description'=>'This is Rice',
            'cuisine'=>'Asian',
            'price'=>18.99,
            'promotion'=>0.1,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>2,
            'name'=>'Carbonara',
            'description'=>'This is pasta',
            'cuisine'=>'Italian',
            'price'=>17.99,
            'promotion'=>1.0,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>2,
            'name'=>'FishnChips',
            'description'=>'This is chips',
            'cuisine'=>'FastFood',
            'price'=>5.99,
            'promotion'=>1.0,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);        
        DB::table('dishes')->insert([
            'user_id'=>2,
            'name'=>'Salad',
            'description'=>'This is salad',
            'cuisine'=>'Veggie',
            'price'=>15.99,
            'promotion'=>0.1,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Sushi',
            'description'=>'This is sushi',
            'cuisine'=>'Asian',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Roast Chicken',
            'description'=>'This is chicken',
            'cuisine'=>'MeatLover',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Steamed Fish',
            'description'=>'This is fish',
            'cuisine'=>'Asian',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Steak',
            'description'=>'This is steak',
            'cuisine'=>'MeatLover',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Tofu Soup',
            'description'=>'This is tofu',
            'cuisine'=>'Veggie',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Pizza',
            'description'=>'This is pizza',
            'cuisine'=>'FastFood',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>3,
            'name'=>'Pho',
            'description'=>'This is pho',
            'cuisine'=>'Asian',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'user_id'=>2,
            'name'=>'Ramen',
            'description'=>'This is ramen',
            'cuisine'=>'Asian',
            'price'=>7.99,
            'promotion'=>0.2,
            'photo'=>'product_images/food.jpg',
            'updated_at'=>DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
