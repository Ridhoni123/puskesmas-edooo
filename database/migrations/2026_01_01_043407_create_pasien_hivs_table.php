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
        Schema::create('pasien_hivs', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_sample'); // Tanggal Sample [cite: 16]
    $table->string('nama_pasien'); // Nama Pasien [cite: 16]
    $table->string('tempat_tgl_lahir'); // Tempat & Tgl Lahir [cite: 16]
    $table->string('nik', 16); // ID KTP [cite: 16]
    $table->text('alamat'); // Alamat [cite: 16]
    $table->string('jenis_kelamin'); // Jenis Kelamin [cite: 16]
    $table->string('umur'); // Umur [cite: 16]
    $table->string('ruangan_pengirim'); // Contoh: KIA, UMUM, GIGI [cite: 16, 20, 48]
    $table->string('asuransi'); // Contoh: BPJS atau Umum [cite: 16, 17]
    $table->string('hasil_tes'); // Contoh: Non Reaktif / Reaktif [cite: 17, 24]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_hivs');
    }
};
