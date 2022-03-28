<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g5e1D_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('dateHour');
            $table->string('notes');
            $table->boolean('archived');

            $table->foreign('id_g5e1D_users')
                ->references('id')
                ->on('g5e1D_users')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_realEstate')
                ->references('id')
                ->on('g5e1D_realEstate')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_appointmentsSubjects')
                ->references('id')
                ->on('g5e1D_appointmentsSubjects')
                ->onDelete('cascade');

            $table->foreign('id_g5e1D_users_agentsCanHaveAppointments')
                ->references('id')
                ->on('g5e1D_users_agentsCanHaveAppointments')
                ->onDelete('cascade');

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
        Schema::dropIfExists('g5e1D_appointments');
    }
}