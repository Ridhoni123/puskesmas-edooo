<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bayi_baru_lahirs', function (Blueprint $table) {
            // Tambahkan kolom-kolom baru di sini
            $table->string('tempat_lahir')->nullable()->after('nama_bayi');
            $table->integer('berat_badan')->nullable()->after('alamat');
            $table->integer('panjang_badan')->nullable()->after('berat_badan');
            $table->string('kondisi_kesehatan')->nullable()->after('panjang_badan');
        });
    }

    public function down(): void
    {
        Schema::table('bayi_baru_lahirs', function (Blueprint $table) {
            $table->dropColumn(['tempat_lahir', 'berat_badan', 'panjang_badan', 'kondisi_kesehatan']);
        });
    }
};
