<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'admin_name'     => 'Saeed',
            'role'     => 'super_admin',
            'admin_image'     => '5156545d.png',
            'email'    => 'saeed@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
