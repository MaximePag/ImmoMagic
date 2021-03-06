<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g5e1D_pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->bigInteger('id_g5e1D_realEstate')->unsigned();
            $table->timestamps();
        });

        Schema::table('g5e1D_pictures', function($table) {
            $table->foreign('id_g5e1D_realEstate')
                ->references('id')
                ->on('g5e1D_realEstate')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('g5e1D_pictures');
    }
}