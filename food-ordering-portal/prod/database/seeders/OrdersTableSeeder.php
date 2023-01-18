<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>5,
            'quantity'=>'1',
            'created_at'=> '2021-11-01 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>2,
            'quantity'=>'2',
            'created_at'=> '2021-11-01 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>3,
            'quantity'=>'1',
            'created_at'=> '2021-11-02 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>3,
            'quantity'=>'1',
            'created_at'=> '2022-10-03 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>3,
            'quantity'=>'1',
            'created_at'=> '2022-10-04 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>2,
            'quantity'=>'1',
            'created_at'=> '2022-10-05 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>6,
            'quantity'=>'1',
            'created_at'=> '2022-10-06 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>6,
            'quantity'=>'1',
            'created_at'=> '2022-10-07 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>1,
            'quantity'=>'1',
            'created_at'=> '2022-10-08 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>1,
            'quantity'=>'1',
            'created_at'=> '2022-09-30 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>1,
            'quantity'=>'1',
            'created_at'=> '2022-09-29 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>6,
            'dish_id'=>5,
            'quantity'=>'1',
            'created_at'=> '2022-09-28 14:44:22',
        ]);
        DB::table('orders')->insert([
            'user_id'=>7,
            'dish_id'=>5,
            'quantity'=>'1',
            'created_at'=> '2022-09-27 14:44:22',
        ]);
    }
}

