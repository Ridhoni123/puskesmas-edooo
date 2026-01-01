<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienHiv extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_sample',    // Tanggal Sample [cite: 16]
        'nama_pasien',       // Nama Pasien [cite: 16]
        'tempat_tgl_lahir',  // Tempat & Tgl Lahir [cite: 16]
        'nik',               // ID KTP/Paspor [cite: 16]
        'alamat',            // Alamat pasien [cite: 16]
        'jenis_kelamin',     // Jenis Kelamin [cite: 16]
        'umur',              // Umur saat diperiksa [cite: 16]
        'ruangan_pengirim',  // Ruangan Pengirim (KIA/UMUM/GIGI) [cite: 16, 48]
        'asuransi',          // Asuransi (BPJS/Umum) [cite: 16]
        'hasil_tes'          // Hasil (Non Reaktif/Reaktif) [cite: 17, 24]
    ];
}