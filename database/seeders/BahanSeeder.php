<?php

namespace Database\Seeders;

use App\Models\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'harga_terakhir' => 15000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Ayam',
                'jumlah_stok' => 50,
                'satuan' => 'ekor',
                'minimum_stok' => 5,
                'harga_terakhir' => 30000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Bebek',
                'jumlah_stok' => 30,
                'satuan' => 'ekor',
                'minimum_stok' => 3,
                'harga_terakhir' => 60000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Ikan Nila',
                'jumlah_stok' => 40,
                'satuan' => 'ekor',
                'minimum_stok' => 4,
                'harga_terakhir' => 25000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Burung Puyuh',
                'jumlah_stok' => 25,
                'satuan' => 'ekor',
                'minimum_stok' => 2,
                'harga_terakhir' => 20000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Tomat',
                'jumlah_stok' => 50,
                'satuan' => 'kg',
                'minimum_stok' => 5,
                'harga_terakhir' => 12000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Cabai',
                'jumlah_stok' => 30,
                'satuan' => 'kg',
                'minimum_stok' => 5,
                'harga_terakhir' => 25000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Minyak Goreng',
                'jumlah_stok' => 20,
                'satuan' => 'liter',
                'minimum_stok' => 5,
                'harga_terakhir' => 14000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Garam',
                'jumlah_stok' => 10,
                'satuan' => 'kg',
                'minimum_stok' => 2,
                'harga_terakhir' => 5000,
                'tanggal_terakhir_stok' => now(),
            ],
            [
                'nama_bahan' => 'Gula',
                'jumlah_stok' => 15,
                'satuan' => 'kg',
                'minimum_stok' => 3,
                'harga_terakhir' => 14000,
                'tanggal_terakhir_stok' => now(),
            ],
        ];

        foreach ($bahans as $bahan) {
            Bahan::create($bahan);
        }
    }
}