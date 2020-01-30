<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tgl')->nullable();
            $table->string('lat')->nullable();
            $table->string('lot')->nullable();
            $table->string('place')->nullable();
            $table->text('report')->nullable();
            $table->text('foto')->nullable();
            $table->text('konsumen')->nullable();
            $table->string('idk')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_tracks');
    }
}
