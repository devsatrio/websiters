<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');          
            $table->string('kode')->nullable();
            $table->string('idk')->nullable();
            $table->string('produk')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('keunggulan')->nullable();
            $table->text('penggunaan')->nullable();
            $table->integer('harg_pcs')->nullable();
            $table->integer('harg_pack')->nullable();
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
        Schema::dropIfExists('barangs');
    }
}
