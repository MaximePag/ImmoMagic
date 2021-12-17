<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('phoneNumber');
            $table->string('email')->unique()->notNullable();
            $table->string('password');
            $table->string('adress');
            $table->string('additionnalAdress');
            $table->string('zipCode');
            $table->string('city');
            $table->string('profesionnalNumber');
            $table->boolean('archive');
            $table->timestamps();

        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}