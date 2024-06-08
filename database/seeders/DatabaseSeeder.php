<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::create([
            'nama' => 'Default Admin',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);


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

        // Insert data ke tabel pelanggan
        foreach ($pelangganData as $data) {
            Pelanggan::create($data);
        }
    }
}
