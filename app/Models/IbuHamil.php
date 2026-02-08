<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_k6',
        'nama_ibu',
        'tempat_lahir',   // TAMBAH INI
        'tanggal_lahir',
        'nik',
        'nama_suami',
        'alamat',
        'is_pbi',
        'no_hp',
        'keterangan',
    ];
}
