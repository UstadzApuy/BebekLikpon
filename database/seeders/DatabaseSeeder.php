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
            'unique_code' => 'admin123'
        ]);

        User::factory()->create([
            'name' => 'SuperAdmin',
            'role' => Role::SuperAdmin,
            'email' => 'superadmin@mail.com',
            'unique_code' => 'superadmin123'
        ]);

        User::factory()->create([
            'name' => 'Pelanggan',
            'role' => Role::User,
            'email' => 'pelanggan@mail.com',
            'unique_code' => 'pelanggan123'
        ]);
    }
}
