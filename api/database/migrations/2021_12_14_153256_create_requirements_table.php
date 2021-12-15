<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('maxPrice');
            $table->integer('minPrice');
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
            $table->timestamp('constructionYear');
            $table->boolean('worksToBeDone');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}