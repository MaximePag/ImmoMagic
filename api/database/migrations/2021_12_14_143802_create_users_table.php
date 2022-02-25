<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
