<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuBersalin extends Model
{
    use HasFactory;

    protected $fillable = [
    'nama_ibu', 'nik', 'tanggal_persalinan', 'tempat_persalinan', 
    'penolong_persalinan', 'metode_persalinan', 'kondisi_ibu', 
    'kondisi_bayi', 'alamat'
];
}