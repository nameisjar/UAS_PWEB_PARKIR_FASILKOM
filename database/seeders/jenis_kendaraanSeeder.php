<?php

namespace Database\Seeders;

use App\Models\Jenis_Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jenis_kendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis_Kendaraan::create([
            'jenis' => 'motor'
        ]);
        Jenis_Kendaraan::create([
            'jenis' => 'mobil'
        ]);
        
    }
}
