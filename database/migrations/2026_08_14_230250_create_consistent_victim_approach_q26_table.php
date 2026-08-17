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
        Schema::create('consistent_victim_approach_q26', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('location_q26')->nullable();
            $table->string('category_q26')->nullable();
            $table->string('ngo_rating_q26')->nullable();
            $table->string('men_q26')->nullable();
            $table->string('women_q26')->nullable();
            $table->string('total_q26')->nullable();
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
        Schema::dropIfExists('consistent_victim_approach_q26');
    }
};