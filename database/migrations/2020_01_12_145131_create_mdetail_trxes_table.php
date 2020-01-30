<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdetailTrxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mdetail_trxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tgl')->nullable();
            $table->string('idTrx')->nullable();
            $table->string('kode_barang')->nullable();
            $table->string('barang')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('potongan')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('total')->nullable();
            $table->string('admin')->nullable();
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
        Schema::dropIfExists('mdetail_trxes');
    }
}
