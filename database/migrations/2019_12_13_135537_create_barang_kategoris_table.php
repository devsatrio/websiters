<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_kategoris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kategori')->nullable();
            $table->integer('isi')->nullable();
            $table->string('paket')->nullable();
            $table->string('jenis_berat')->nullable();
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
        Schema::dropIfExists('barang_kategoris');
    }
}
