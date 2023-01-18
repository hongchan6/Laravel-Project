<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() { 
        
        DB::table('users')->insert([
            'user_name' => "Admin",
            'email' => 'Admin@abc.com', 
            'password' => bcrypt('12345678'),
            'address' => '1 admin St',
            'type' => 'Administrator'
            ]); 

        DB::table('users')->insert([
        'user_name' => "Bob Shop",
        'email' => 'Bob@gmail.com', 
        'password' => bcrypt('12345678'),
        'address' => '1 Brisbane St',
        'type' => 'Restaurant',
        'approved' => 'Y'
        ]); 

        DB::table('users')->insert([
        'user_name' => "Teddy Shop",
        'email' => 'Teddy@gmail.com', 
        'password' => bcrypt('12345678'),
        'address' => '2 Brisbane St',
        'type' => 'Restaurant',
        'approved' => 'Y'
        ]); 
        
        DB::table('users')->insert([
            'user_name' => "Dennis Shop",
            'email' => 'Dennis@gmail.com', 
            'password' => bcrypt('12345678'),
            'address' => '1 Brisbane St',
            'type' => 'Restaurant',
        ]); 
    
            DB::table('users')->insert([
            'user_name' => "Adam Shop",
            'email' => 'Adam@gmail.com', 
            'password' => bcrypt('12345678'),
            'address' => '2 Brisbane St',
            'type' => 'Restaurant',
        ]); 

        DB::table('users')->insert([
        'user_name' => "Angel",
        'email' => 'Angel@gmail.com', 
        'password' => bcrypt('12345678'),
        'address' => '1 Gold St',
        'type' => 'Customer'
        ]); 

        DB::table('users')->insert([
        'user_name' => "Fred",
        'email' => 'Fred@gmail.com', 
        'password' => bcrypt('12345678'),
        'address' => '2 Gold St',
        'type' => 'Customer'
        ]); }
}
