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
        Schema::table('ibu_hamils', function (Blueprint $table) {
            $table->text('keterangan')->nullable()->after('no_hp');
        });
    }

    public function down()
    {
        Schema::table('ibu_hamils', function (Blueprint $table) {
            $table->dropColumn('keterangan');
        });
    }
};
