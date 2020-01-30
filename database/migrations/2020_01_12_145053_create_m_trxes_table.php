<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTrxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_trxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inv')->nullable();
            $table->string('po')->nullable();
            $table->string('sj')->nullable();
            $table->string('tgl')->nullable();
            $table->string('pembeli')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('penerima')->nullable();
            $table->integer('subtotal')->default("0");
            $table->integer('potongan')->default("0");
            $table->integer('diskon')->default("0");
            $table->integer('Total')->default("0");
            $table->integer('Bayar')->default("0");
            $table->integer('Kurang')->default("0");
            $table->integer('Kembali')->default("0");
            $table->string('admin')->nullable();
            $table->enum('status',['lunas','belum']);            
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
        Schema::dropIfExists('m_trxes');
    }
}
