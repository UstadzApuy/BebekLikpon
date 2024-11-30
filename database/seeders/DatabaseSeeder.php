<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enum\Role;
use App\Models\Bahan;
use App\Models\Menu;

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

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'title' => 'Bebek Goreng',
                'slug' => 'bebek-goreng',
                'price' => 45000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Paket',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Bebek goreng lengkap dengan nasi, sambal pilihan, dan sayuran.'
            ],
            [
                'title' => 'Bebek Bakar',
                'slug' => 'bebek-bakar',
                'price' => 50000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Paket',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Bebek bakar dengan sambal pilihan dan pelengkap.'
            ],
            [
                'title' => 'Ayam Goreng',
                'slug' => 'ayam-goreng',
                'price' => 30000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Paket',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ayam goreng dengan nasi dan sambal pilihan.'
            ],
            [
                'title' => 'Ayam Bakar',
                'slug' => 'ayam-bakar',
                'price' => 35000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Paket',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ayam bakar dengan pelengkap nasi dan sambal.'
            ],
            [
                'title' => 'Ikan Wader',
                'slug' => 'ikan-wader',
                'price' => 25000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Ikan wader goreng renyah.'
            ],
            [
                'title' => 'Ikan Nila Bakar',
                'slug' => 'ikan-nila-bakar',
                'price' => 40000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Ikan nila bakar dengan bumbu spesial.'
            ],
            [
                'title' => 'Burung Puyuh Goreng',
                'slug' => 'burung-puyuh-goreng',
                'price' => 30000,
                'thumbnail' => null,
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Burung puyuh goreng dengan rasa yang nikmat.'
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahans = [
            [
                'nama_bahan' => 'Beras',
                'jumlah_stok' => 100,
                'satuan' => 'kg',
                'minimum_stok' => 10,
                'harga_terakhir' => 15000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Tomat',
                'jumlah_stok' => 50,
                'satuan' => 'kg',
                'minimum_stok' => 5,
                'harga_terakhir' => 12000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Lombok',
                'jumlah_stok' => 30,
                'satuan' => 'kg',
                'minimum_stok' => 5,
                'harga_terakhir' => 25000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Bawang Merah',
                'jumlah_stok' => 40,
                'satuan' => 'kg',
                'minimum_stok' => 5,
                'harga_terakhir' => 30000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Kol',
                'jumlah_stok' => 20,
                'satuan' => 'kg',
                'minimum_stok' => 2,
                'harga_terakhir' => 8000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Ikan Wader',
                'jumlah_stok' => 100,
                'satuan' => 'pcs',
                'minimum_stok' => 20,
                'harga_terakhir' => 2000.00,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Burung Puyuh',
                'jumlah_stok' => 50,
                'satuan' => 'pcs',
                'minimum_stok' => 10,
                'harga_terakhir' => 15000.00,
                'tanggal_terakhir_stok' => now(),
            ],
        ];

        foreach ($bahans as $bahan) {
            Bahan::create($bahan);
        }
    }
}