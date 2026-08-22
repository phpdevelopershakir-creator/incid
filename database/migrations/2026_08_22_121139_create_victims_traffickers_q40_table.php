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
        Schema::create('victims_traffickers_q40', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('victims_traffickers_title_one_q40')->nullable();
            $table->text('victims_traffickers_title_two_q40')->nullable();
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
        Schema::dropIfExists('victims_traffickers_q40');
    }
};