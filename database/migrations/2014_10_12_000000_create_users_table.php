<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
     
        Schema::create('user_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unique();
            $table->char('permission',1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_permission');
    }
}
