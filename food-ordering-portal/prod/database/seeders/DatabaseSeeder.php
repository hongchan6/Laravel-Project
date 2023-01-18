<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(FavsTableSeeder::class);
        $this->call(CartsTableSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
