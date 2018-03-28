<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAliansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliansi', function(Blueprint $table){
          $table->increments('id');
          $table->string('nama_aliansi');
          $table->string('logo');
          $table->string('alamat')->nullable();
          $table->string('no_kontak')->nullable();
          $table->text('desc')->nullable();
          $table->integer('tingkat')->nullable();
          $table->timestamps();
          $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aliansi');
    }
}
