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
        Schema::create('consistent_victim_approach_q26b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('location_q26b')->nullable();
            $table->string('category_q26b')->nullable();
            $table->string('men_q26b')->nullable();
            $table->string('women_q26b')->nullable();
            $table->string('total_q26b')->nullable();
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
        Schema::dropIfExists('consistent_victim_approach_q26b');
    }
};