<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Kategori;
use App\Models\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin
        Admin::create([
            'nama' => 'Default Admin',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Seed Pelanggan
        $pelangganData = [
            [
                'nama_awal' => 'John',
                'nama_akhir' => 'Doe',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('customer123'),
                'mobile_number' => '1234567890',
                'alamat' => '123 Main Street, City, Country',
            ],
            [
                'nama_awal' => 'Jane',
                'nama_akhir' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'mobile_number' => '0987654321',
                'alamat' => '456 Elm Street, City, Country',
            ],
        ];

        foreach ($pelangganData as $data) {
            Pelanggan::create($data);
        }

        $kategori = [
            ['nama' => 'Appetizers'],
            ['nama' => 'Main Courses'],
            ['nama' => 'Desserts'],
            ['nama' => 'Beverages'],
        ];

        foreach ($kategori as $kat) {
            Kategori::create($kat);
        }

        $menus = [
            [
                'nama' => 'Spring Rolls',
                'deskripsi' => 'Crispy spring rolls with a delicious vegetable filling.',
                'harga' => 15000,
                'image' => 'spring_rolls.jpg',
                'status_menu' => 'available',
                'kategori_id' => Kategori::where('nama', 'Appetizers')->first()->id,
            ],
            [
                'nama' => 'Grilled Chicken',
                'deskripsi' => 'Juicy grilled chicken with a side of roasted vegetables.',
                'harga' => 50000,
                'image' => 'grilled_chicken.jpg',
                'status_menu' => 'available',
                'kategori_id' => Kategori::where('nama', 'Main Courses')->first()->id,
            ],
            [
                'nama' => 'Chocolate Cake',
                'deskripsi' => 'Rich and moist chocolate cake with a creamy frosting.',
                'harga' => 30000,
                'image' => 'chocolate_cake.jpg',
                'status_menu' => 'available',
                'kategori_id' => Kategori::where('nama', 'Desserts')->first()->id,
            ],
            [
                'nama' => 'Iced Tea',
                'deskripsi' => 'Refreshing iced tea with a hint of lemon.',
                'harga' => 10000,
                'image' => 'iced_tea.jpg',
                'status_menu' => 'available',
                'kategori_id' => Kategori::where('nama', 'Beverages')->first()->id,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
