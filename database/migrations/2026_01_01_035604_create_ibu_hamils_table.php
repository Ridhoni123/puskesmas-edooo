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
        Schema::create('ibu_hamils', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_k6'); // Tanggal Pemeriksaan K6 
    $table->string('nama_ibu'); // Nama Ibu Hamil 
    $table->date('tanggal_lahir'); // Tanggal Lahir 
    $table->string('nik', 16); // NIK 
    $table->string('nama_suami'); // Nama Suami 
    $table->text('alamat'); // Alamat 
    $table->boolean('is_pbi'); // Jaminan Kesehatan/PBI (Ya/Tidak) 
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibu_hamils');
    }
};
