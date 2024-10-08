<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enum\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'role' => Role::Admin,
            'email' => 'admin@mail.com',
        ]);
        User::factory()->create([
            'name' => 'Pelanggan',
            'role' => Role::User,
            'email' => 'pelanggan@mail.com',
        ]);
    }
}
