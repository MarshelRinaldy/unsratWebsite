<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'system_name' => 'Your System Name',
            'email' => 'your-email@example.com',
            'contact' => 'Your Contact Information',
            'about_us' => 'About us content goes here.',
        ]);
    }
}
