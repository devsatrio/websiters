<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip')->default('text');
            $table->string('nama')->default('text');
            $table->string('telp')->default('text');
            $table->string('alamat')->default('text');
            $table->string('kecamatan')->default('text');
            $table->string('kot_kab')->default('text');
            $table->string('provinsi')->default('text');
            $table->string('username')->default('text');
            $table->text('password')->default('text');
            $table->text('api_token')->default('text');
            $table->enum('status', ['baru','lama','out']);
            $table->string('tgl_masuk')->default('text');
            $table->string('tgl_kotrak')->default('text');
            $table->string('tgl_kotrak_habis')->default('text');
            $table->string('foto')->nullable();
            $table->string('idj')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
}
