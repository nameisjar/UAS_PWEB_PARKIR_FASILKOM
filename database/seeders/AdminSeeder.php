<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'fahrel',
            'email' => 'fahrel@gmail.com',
            'password' => bcrypt('fahrel123'),
            'no_hp' => '081230675926',
            'jalan' => 'jalan mangga',
            'nip' => '212410101097',
            'id_provinsi' => 1,
            'id_kota' => 1,
            
        ]);
    }
}
