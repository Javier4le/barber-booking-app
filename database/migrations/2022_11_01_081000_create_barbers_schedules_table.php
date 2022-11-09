<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbers_schedules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('barber_id');
            $table->foreign('barber_id')->references('id')->on('barbers')->onDelete('cascade');

            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');

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
        Schema::dropIfExists('barbers_schedules');
    }
};
