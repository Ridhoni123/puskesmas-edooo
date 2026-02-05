<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayiBaruLahir extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kn3', 
        'nama_bayi', 
        'tanggal_lahir', 
        'nik', 
        'tempat_lahir',
        'berat_badan', 
        'panjang_badan', 
        'kondisi_kesehatan',
        'nama_orang_tua', 
        'is_pbi', 
        'alamat'
    ];
}