<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g5e1D_realEstate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->integer('price');
            $table->float('expenses');
            $table->string('description');
            $table->integer('numberOfViews');
            $table->integer('livingArea');
            $table->integer('landArea');
            $table->integer('roomNumber');
            $table->integer('bedroomNumber');
            $table->integer('bathroomNumber');
            $table->integer('toiletNumber');
            $table->integer('floorNumber');
            $table->string('constructionYear')->nullable();
            $table->boolean('worksToBeDone');
            $table->integer('GES');
            $table->integer('DPE');
            $table->boolean('archived');
            $table->bigInteger('id_g5e1D_typeOfWaterEvacuation')->unsigned();
            $table->bigInteger('id_g5e1D_typeOfHeating')->unsigned();  
            $table->bigInteger('id_g5e1D_typeOfRealEstate')->unsigned();   
            $table->bigInteger('id_g5e1D_typeOfContract')->unsigned();   
            $table->bigInteger('id_g5e1D_cities')->unsigned();
            $table->bigInteger('id_g5e1D_status')->unsigned();
            $table->timestamps();
        });

        Schema::table('g5e1D_realEstate', function($table) {
            $table->foreign('id_g5e1D_typeOfWaterEvacuation')
                ->references('id')
                ->on('g5e1D_typeOfWaterEvacuation')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_typeOfHeating')
                ->references('id')
                ->on('g5e1D_typeOfHeating')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_typeOfRealEstate')
                ->references('id')
                ->on('g5e1D_typeOfRealEstate')
                ->onDelete('cascade');
                
            $table->foreign('id_g5e1D_typeOfContract')
                ->references('id')
                ->on('g5e1D_typeOfContract')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_cities')
                ->references('id')
                ->on('g5e1D_cities')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_status')
                ->references('id')
                ->on('g5e1D_status')
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
        Schema::dropIfExists('g5e1D_realEstate');
    }
}