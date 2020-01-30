<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('idk')->nullable();
            $table->string('produk')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('keunggulan')->nullable();
            $table->text('penggunaan')->nullable();
            $table->integer('harg_kg')->nullable();
            $table->integer('harg_ton')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('diskon')->nullable();
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
        Schema::dropIfExists('pakans');
    }
}
