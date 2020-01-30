<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul')->nullable();
            $table->string('link')->nullable();
            $table->string('deskripsi')->nullable();
            $table->text('isi')->nullable();
            $table->string('tgl')->nullable();
            $table->text('foto')->nullable();
            $table->string('idsk')->nullable();
            $table->enum('aktif', ['y', 'n'])->default('y');
            $table->string('admin')->nullable();
            $table->bigInteger('counter')->default('0');
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
        Schema::dropIfExists('artikels');
    }
}
