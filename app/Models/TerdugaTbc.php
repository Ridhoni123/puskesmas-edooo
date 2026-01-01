<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerdugaTbc extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_sediaan',      // No. Identitas Sediaan [cite: 160]
        'no_rm',           // No. Rekam Medis [cite: 160]
        'tanggal_daftar',  // Tanggal Didaftar [cite: 160]
        'nik',             // NIK [cite: 160]
        'nama_pasien',     // Nama Lengkap Terduga TBC [cite: 161]
        'umur',            // Umur (Tahun) [cite: 161]
        'jenis_kelamin',   // Jenis Kelamin (L/P) [cite: 161]
        'alamat_lengkap',  // Alamat Lengkap Terduga TBC [cite: 161]
        'hasil_tcm',       // Hasil Pemeriksaan Diagnosis (Neg/Rif Sen) [cite: 161, 162]
        'status_hiv',      // Status HIV [cite: 161]
        'tindak_lanjut'    // Tindak Lanjut (Akan Diobati/Bukan TBC) [cite: 161, 162]
    ];
}