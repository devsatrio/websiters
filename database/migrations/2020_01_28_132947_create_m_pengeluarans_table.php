<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tgl')->null();
            $table->string('admin');
            $table->string('keterangan');
            $table->string('jumlah');
            $table->string('penjab');
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
        Schema::dropIfExists('m_pengeluarans');
    }
}
