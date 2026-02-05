<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_k6',      // Tanggal Pemeriksaan K6
        'nama_ibu',        // Nama Ibu Hamil
        'tanggal_lahir',   // Tanggal Lahir Ibu
        'nik',             // NIK
        'nama_suami',      // Nama Suami
        'alamat',          // Alamat lengkap
        'is_pbi',           // Jaminan Kesehatan/PBI (Ya/Tidak)
        'no_hp',          // No. HP / WhatsApp
        'keterangan'      // Keterangan tambahan
    ];
}