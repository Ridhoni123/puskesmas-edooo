<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('terduga_tbcs', function (Blueprint $table) {
    $table->id();
    $table->string('no_sediaan'); // No. Identitas Sediaan [cite: 162]
    $table->string('no_rm'); // No. Rekam Medis [cite: 160]
    $table->date('tanggal_daftar'); // Tanggal Didaftar [cite: 160]
    $table->string('nik', 16); // NIK [cite: 160]
    $table->string('nama_pasien'); // Nama Lengkap Terduga TBC [cite: 161]
    $table->integer('umur'); // Umur [cite: 161]
    $table->string('jenis_kelamin'); // L/P [cite: 161]
    $table->text('alamat_lengkap'); // Alamat [cite: 161]
    $table->string('hasil_tcm')->nullable(); // Hasil Pemeriksaan TCM (Negatif/Rif Sen) [cite: 164, 165]
    $table->string('status_hiv')->nullable(); // Status HIV [cite: 161]
    $table->string('tindak_lanjut')->nullable(); // Contoh: Akan Diobati, Bukan TBC [cite: 165, 170]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terduga_tbcs');
    }
};
