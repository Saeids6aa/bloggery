<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class About_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::truncate();

         About::create([
            'image'     => 'dsfsfds55.png',
            'descrption'     => 'descrption descrption',
         
        ]);
    }
}
