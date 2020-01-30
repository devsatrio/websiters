<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idrole')->default('text');
            $table->string('idmodul')->nullable();
            $table->enum('view',['y','n'])->nullable();
            $table->enum('c',['y','n'])->nullable();            
            $table->enum('r',['y','n'])->nullable();
            $table->enum('u',['y','n'])->nullable();
            $table->enum('d',['y','n'])->nullable();
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
        Schema::dropIfExists('moduls');
    }
}
