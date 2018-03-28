<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ---- LEVEL USER ----
        // 1 - Administrator
        // 2 - Akademik
        // 3 - Marketing
        // 4 - Teknisi IT
        // 5 - Keuangan
        // 6 - Sekretariat

        // ---- STATUS ----
        // 0 - Deactive
        // 1 - Active

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->integer('level');
            $table->integer('status')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
