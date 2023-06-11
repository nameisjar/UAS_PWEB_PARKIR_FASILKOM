<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kendaraan extends Model
{
    use HasFactory;

    public function parkirs()
    {
        return $this->hasMany(Parkir::class, 'id_jenis_kendaraan');
    }
}
