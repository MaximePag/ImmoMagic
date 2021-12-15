<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phoneNumber');
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('adress');
            $table->string('additionalAdress');
            $table->string('zipCode');
            $table->string('city');
            $table->string('profesionnalNumber');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}