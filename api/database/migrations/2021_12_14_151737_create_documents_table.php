<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g5e1D_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('path');
            $table->boolean('archived');
            $table->bigInteger('id_g5e1D_users')->unsigned();
            $table->timestamps();
        });

        Schema::table('g5e1D_documents', function($table) {
            $table->foreign('id_g5e1D_users')
                ->references('id')
                ->on('g5e1D_users')
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
        Schema::dropIfExists('g5e1D_documents');
    }
}