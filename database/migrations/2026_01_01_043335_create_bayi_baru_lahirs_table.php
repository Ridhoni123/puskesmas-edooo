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
    Schema::create('bayi_baru_lahirs', function (Blueprint $table) {
    $table->id();
    $table->date('tanggal_kn3'); // Sesuai data 
    $table->string('nama_bayi'); // Sesuai data 
    $table->date('tanggal_lahir'); // PASTIKAN NAMANYA INI (bukan tanggal_lahir_bayi)
    $table->string('nik')->nullable();
    $table->string('nama_orang_tua'); // Gabungan Ayah/Ibu 
    $table->text('alamat'); // Sesuai data 
    $table->boolean('is_pbi'); // Jaminan PBI 
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayi_baru_lahirs');
    }
};
