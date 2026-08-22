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
        Schema::create('victims_restitution_q39', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('victims_restitution_title_one_q39')->nullable();
            $table->text('victims_restitution_title_two_q39')->nullable();
            $table->text('victims_restitution_title_three_q39')->nullable();
            $table->text('victims_restitution_title_four_q39')->nullable();
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
        Schema::dropIfExists('victims_restitution_q39');
    }
};