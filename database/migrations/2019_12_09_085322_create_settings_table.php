<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web')->nullable();
            $table->string('ico')->nullable();
            $table->string('logo')->nullable();
            $table->string('telp1')->nullable();
            $table->string('telp2')->nullable();
            $table->string('email')->nullable();
            $table->string('yt')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('twitter')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kokab')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('motto')->nullable();
            $table->string('keterangan')->nullable();
            $table->text('informasi')->nullable();
            $table->string('map')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
