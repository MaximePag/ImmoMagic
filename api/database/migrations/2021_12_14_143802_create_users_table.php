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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phoneNumber');
            $table->timestamp('registerDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('mail')->unique();
            $table->string('password');
            $table->rememberToken();
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