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
        Schema::create('victims_restitution_q39b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('victims_restitution_location_q39b')->nullable();
            $table->string('victims_restitution_category_q39b')->nullable();
            $table->string('victims_restitution_men_q39b')->nullable();
            $table->string('victims_restitution_women_q39b')->nullable();
            $table->string('victims_restitution_total_q39b')->nullable();
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
        Schema::dropIfExists('victims_restitution_q39b');
    }
};