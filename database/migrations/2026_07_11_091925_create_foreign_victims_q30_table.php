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
        Schema::create('foreign_victims_q30', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('citizen_victims_services_q30')->nullable();
            $table->text('citizen_victims_quality_q30')->nullable();
            $table->text('citizen_victims_men_q30')->nullable();
            $table->text('citizen_victims_women_q30')->nullable();
            $table->text('citizen_victims_tg_q30')->nullable();
            $table->text('citizen_victims_boy_q30')->nullable();
            $table->text('citizen_victims_girl_q30')->nullable();
            $table->text('citizen_victims_total_q30')->nullable();
            $table->json('citizen_victims_country_q30')->nullable();
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
        Schema::dropIfExists('foreign_victims_q30');
    }
};