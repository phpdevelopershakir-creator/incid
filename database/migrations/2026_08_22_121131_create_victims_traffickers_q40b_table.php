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
        Schema::create('victims_traffickers_q40b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('victims_traffickers_location_q40b')->nullable();
            $table->string('victims_traffickers_men_q40b')->nullable();
            $table->string('victims_traffickers_women_q40b')->nullable();
            $table->string('victims_traffickers_total_q40b')->nullable();
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
        Schema::dropIfExists('victims_traffickers_q40b');
    }
};