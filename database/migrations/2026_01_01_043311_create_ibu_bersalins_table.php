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
        Schema::create('ibu_bersalins', function (Blueprint $table) {
    $table->id();
    $table->string('nama_ibu');
    $table->string('nik', 16);
    $table->date('tanggal_persalinan');
    $table->text('alamat');
    $table->string('tempat_persalinan'); // Puskesmas/Rumah/RS
    $table->string('penolong_persalinan'); // Bidan/Dokter
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibu_bersalins');
    }
};
