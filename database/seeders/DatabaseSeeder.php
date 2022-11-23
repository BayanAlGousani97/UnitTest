<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'Bayan Algousani',
            'email' => 'bayanalgousani@gmail.com',
            'password' => encrypt('unittest'),

        ]);

        User::factory(10)->create();
        $this->call(ProductsSeeder::class);
    }
}
