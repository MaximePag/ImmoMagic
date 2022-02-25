<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('g5e1D_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('phoneNumber');
            $table->string('mail')->unique()->notNullable();
            $table->string('password');
            $table->string('passwordToken');
            $table->string('address');
            $table->string('zipCode');
            $table->string('city');
            $table->boolean('archive');
            $table->foreign('id_g5e1D_roles')
                ->references('id')
                ->on('g5e1D_roles')
                ->onDelete('cascade');
            $table->timestamps();

        });
    }
    public function down()
    {
        Schema::dropIfExists('g5e1D_users');
    }
}