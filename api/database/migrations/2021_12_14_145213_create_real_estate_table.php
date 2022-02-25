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
        Schema::create('RealEstate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adress');
            $table->integer('price');
            $table->float('expenses');
            $table->string('description');
            $table->integer('numberOfViews');
            $table->integer('livingArea');
            $table->integer('landArea');
            $table->integer('livingRoomArea');
            $table->integer('roomNumber');
            $table->integer('bedroomNumber');
            $table->integer('bathroomNumber');
            $table->integer('toiletNumber');
            $table->integer('floorNumber');
            $table->boolean('garage');
            $table->boolean('parking');
            $table->timestamp('constructionYear')->nullable();
            $table->boolean('worksToBeDone');
            $table->integer('GES');
            $table->integer('DPE');
            $table->boolean('archives');
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
        Schema::dropIfExists('RealEstate');
    }
}