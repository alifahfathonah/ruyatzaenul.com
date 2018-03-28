<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSupportingDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('supporting_doc', function(Blueprint $table){
        $table->increments('id');
        $table->string('title');
        $table->text('desc');
        $table->string('file');
        $table->integer('view')->default(0);
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
