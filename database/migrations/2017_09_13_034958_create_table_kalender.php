<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKalender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kalender', function(Blueprint $table){
          $table->increments('id');
          $table->string('title');
          $table->date('start_date');
          $table->date('end_date')->nullable();
          $table->text('desc')->nullable();
          $table->integer('flag')->default(1);
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
        //
    }
}
