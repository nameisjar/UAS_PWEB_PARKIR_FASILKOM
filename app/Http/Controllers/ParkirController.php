<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Kendaraan;
use App\Models\Parkir;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    public function showTambahParkir(){
        $parkir = Parkir::all();
        $jenis_kendaraan = Jenis_Kendaraan::all();

        return view('dashboard',compact('parkir','jenis_kendaraan'));
    }
    public function tambahParkir(Request $request)
{
    $jenisKendaraan = $request->jenis_kendaraan;

    $jumlahParkirMotor = Parkir::where('id_jenis_kendaraan', 1)->count();
    $jumlahParkirMobil = Parkir::where('id_jenis_kendaraan', 2)->count();

    if ($jenisKendaraan == 1 && $jumlahParkirMotor >= 5) {
        return redirect()->back()->with('error', 'Batas jumlah parkir motor telah tercapai.');
    }

    if ($jenisKendaraan == 2 && $jumlahParkirMobil >= 5) {
        return redirect()->back()->with('error', 'Batas jumlah parkir mobil telah tercapai.');
    }

    $validate = $request->validate([
        'plat_nomor' => 'required',
        'jenis_kendaraan' => 'required',
    ]);
    
    $parkir = new Parkir();
    $parkir->plat_nomor = $validate['plat_nomor'];
    $parkir->id_jenis_kendaraan = $validate['jenis_kendaraan'];
    $parkir->id_admin = 1;

    $parkir->save();

    return redirect()->back()->with('success', 'Data parkir berhasil ditambahkan.');
}


}
