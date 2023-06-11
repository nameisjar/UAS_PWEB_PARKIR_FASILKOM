<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenis_kendaraan()
    {
        return $this->belongsTo(Jenis_Kendaraan::class, 'id_jenis_kendaraan');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
