<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Setting_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();
        Setting::create([
            'icon'           => 'favicon.png',
            'url_twitter'    => 'https://twitter.com/your_account',
            'url_facebook'   => 'https://facebook.com/your_page',
            'url_whatsapp'   => 'https://wa.me/1234567890',
            'email'          => 'contact@example.com',
            'phone'          => '+1234567890',
            'address'        => '123 Main St, City, Country',
            'title'        => 'Saeed Blogy',
        ]);
    }
}
