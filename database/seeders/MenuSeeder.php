<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            // Menu Ala Carte
            [
                'title' => 'Wader Goreng',
                'slug' => 'wader-goreng',
                'price' => 25000,
                'thumbnail' => 'frontend/images/menu-1.jpeg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ikan wader goreng renyah tanpa nasi.',
            ],
            [
                'title' => 'Ikan Nila Goreng',
                'slug' => 'ikan-nila-goreng',
                'price' => 35000,
                'thumbnail' => 'frontend/images/menu-2.jpeg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ikan nila goreng renyah tanpa nasi.',
            ],
            [
                'title' => 'Ikan Nila Bakar',
                'slug' => 'ikan-nila-bakar',
                'price' => 35000,
                'thumbnail' => 'frontend/images/menu-3.jpeg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ikan nila bakar tanpa nasi.',
            ],
            [
                'title' => 'Ayam Goreng',
                'slug' => 'ayam-goreng',
                'price' => 23000,
                'thumbnail' => 'frontend/images/menu-4.jpg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ayam goreng tanpa nasi.',
            ],
            [
                'title' => 'Ayam Bakar',
                'slug' => 'ayam-bakar',
                'price' => 23000,
                'thumbnail' => 'frontend/images/menu-5.jpg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Ayam bakar tanpa nasi.',
            ],
            [
                'title' => 'Bebek Goreng',
                'slug' => 'bebek-goreng',
                'price' => 35000,
                'thumbnail' => 'frontend/images/menu-6.jpg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Bebek goreng tanpa nasi.',
            ],
            [
                'title' => 'Bebek Bakar',
                'slug' => 'bebek-bakar',
                'price' => 35000,
                'thumbnail' => 'frontend/images/menu-7.jpg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => 'Sambal Korek/Tomat, Tempe, Kol Goreng, Terong, Timun, Kemangi',
                'description' => 'Bebek bakar tanpa nasi.',
            ],
            [
                'title' => 'Kepala Bebek',
                'slug' => 'kepala-bebek',
                'price' => 5000,
                'thumbnail' => 'frontend/images/menu-8.jpeg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Kepala bebek goreng nikmat.',
            ],
            [
                'title' => 'Burung Puyuh Goreng',
                'slug' => 'burung-puyuh-goreng',
                'price' => 25000,
                'thumbnail' => 'frontend/images/menu-9.jpg',
                'kategori' => 'Makanan',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Burung puyuh goreng dengan rasa nikmat.',
            ],
            // Minuman
            [
                'title' => 'Es Teh',
                'slug' => 'es-teh',
                'price' => 5000,
                'thumbnail' => 'frontend/images/menu-10.jpg',
                'kategori' => 'Minuman',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Es teh segar.',
            ],
            [
                'title' => 'Teh Hangat',
                'slug' => 'teh-hangat',
                'price' => 5000,
                'thumbnail' => 'frontend/images/menu-11.webp',
                'kategori' => 'Minuman',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Teh hangat nikmat.',
            ],
            [
                'title' => 'Es Jeruk',
                'slug' => 'es-jeruk',
                'price' => 6000,
                'thumbnail' => 'frontend/images/menu-12.jpg',
                'kategori' => 'Minuman',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Es jeruk segar.',
            ],
            [
                'title' => 'Jeruk Hangat',
                'slug' => 'jeruk-hangat',
                'price' => 6000,
                'thumbnail' => 'frontend/images/menu-13.jpg',
                'kategori' => 'Minuman',
                'tipe' => 'Ala Carte',
                'extra' => null,
                'description' => 'Jeruk hangat nikmat.',
            ],
            // Menu Paket
            [
                'title' => 'Paket A',
                'slug' => 'paket-a',
                'price' => 20000,
                'thumbnail' => 'frontend/images/menu-14.jpeg',
                'kategori' => 'Makanan',
                'tipe' => 'Paket',
                'extra' => 'Nasi, Sambal, Lalapan, Ayam Goreng/Bakar',
                'description' => 'Paket lengkap untuk makan siang Anda.',
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
