<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\User::factory()->count(10)->create(),
        // \App\Models\Product::factory()->count(20)->create(),
        // \App\Models\Transaction::factory()->count(30)->create()


        Schema::disableForeignKeyConstraints();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
