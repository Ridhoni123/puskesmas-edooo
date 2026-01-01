<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('ibu_bersalins', function (Blueprint $table) {
        $table->string('metode_persalinan')->nullable();
        $table->string('kondisi_ibu')->nullable();
        $table->string('kondisi_bayi')->nullable();
    });
}

public function down()
{
    Schema::table('ibu_bersalins', function (Blueprint $table) {
        $table->dropColumn(['metode_persalinan', 'kondisi_ibu', 'kondisi_bayi']);
    });
}


};
