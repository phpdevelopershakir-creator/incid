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
        Schema::create('newly_identified_victims_q34', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('number_victims_q34')->nullable();
            $table->string('men_victims_q34')->nullable();
            $table->string('women_victims_q34')->nullable();
            $table->string('tg_victims_q34')->nullable();
            $table->string('total_victims_q34')->nullable();
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
        Schema::dropIfExists('newly_identified_victims_q34');
    }
};