<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call other seeders explicitly
        $this->call([
            UserSeeder::class,
            MenuSeeder::class,
            BahanSeeder::class,
        ]);
    }
}
