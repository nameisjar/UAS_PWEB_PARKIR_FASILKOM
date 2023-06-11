<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::create([
            'nama' => 'Aceh'
        ]);

        Provinsi::create([
            'nama' => 'Bali'
        ]);

        Provinsi::create([
            'nama' => 'Bangka Belitung'
        ]);

        Provinsi::create([
            'nama' => 'Banten'
        ]);

        Provinsi::create([
            'nama' => 'Bengkulu'
        ]);

        Provinsi::create([
            'nama' => 'Gorontalo'
        ]);

        Provinsi::create([
            'nama' => 'Jakarta'
        ]);

        Provinsi::create([
            'nama' => 'Jambi'
        ]);

        Provinsi::create([
            'nama' => 'Jawa Barat'
        ]);

        Provinsi::create([
            'nama' => 'Jawa Tengah'
        ]);

        Provinsi::create([
            'nama' => 'Yogyakarta'
        ]);

        Provinsi::create([
            'nama' => 'Jawa Timur'
        ]);
        
        Provinsi::create([
            'nama' => 'Kalimantan Barat'
        ]);

        Provinsi::create([
            'nama' => 'Kalimantan Selatan'
        ]);

        Provinsi::create([
            'nama' => 'Kalimantan Tengah'
        ]);

        Provinsi::create([
            'nama' => 'Kalimantan Timur'
        ]);

        Provinsi::create([
            'nama' => 'Kalimantan Utara'
        ]);

        Provinsi::create([
            'nama' => 'Kepulauan Riau'
        ]);

        Provinsi::create([
            'nama' => 'Lampung'
        ]);

        Provinsi::create([
            'nama' => 'Maluku Utara'
        ]);

        Provinsi::create([
            'nama' => 'Maluku'
        ]);

        Provinsi::create([
            'nama' => 'Nusa Tenggara Barat'
        ]);

        Provinsi::create([
            'nama' => 'Nusa Tenggara Timur'
        ]);

        Provinsi::create([
            'nama' => 'Papua Barat Daya'
        ]);

        Provinsi::create([
            'nama' => 'Papua'
        ]);

        Provinsi::create([
            'nama' => 'Riau'
        ]);

        Provinsi::create([
            'nama' => 'Sulawesi Selatan'
        ]);

        Provinsi::create([
            'nama' => 'Sulawesi Tengah'
        ]);

        Provinsi::create([
            'nama' => 'Sulawesi Tenggara'
        ]);

        Provinsi::create([
            'nama' => 'Sulawesi Utara'
        ]);

        Provinsi::create([
            'nama' => 'Sumatra Barat'
        ]);

        Provinsi::create([
            'nama' => 'Sumatra Selatan'
        ]);

        Provinsi::create([
            'nama' => 'Sumatra Utara'
        ]);
    }
}
