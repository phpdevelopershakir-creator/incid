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
        Schema::create('citizen_victims_abroad_q31', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('citizen_victims_abroad_name_q31')->nullable();
            $table->text('citizen_victims_abroad_status_q31')->nullable();
            $table->text('citizen_victims_abroad_men_q31')->nullable();
            $table->text('citizen_victims_abroad_women_q31')->nullable();
            $table->text('citizen_victims_abroad_tg_q31')->nullable();
            $table->text('citizen_victims_abroad_boy_q31')->nullable();
            $table->text('citizen_victims_abroad_girl_q31')->nullable();
            $table->text('citizen_victims_abroad_total_q31')->nullable();
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
        Schema::dropIfExists('citizen_victims_abroad_q31');
    }
};
