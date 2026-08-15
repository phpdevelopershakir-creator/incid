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
        Schema::create('authorities_systematically_q16b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('location_q16')->nullable();
            $table->string('category_q16')->nullable();
            $table->string('ngo_rating_q16')->nullable();
            $table->string('men_q16')->nullable();
            $table->string('women_q16')->nullable();
            $table->string('total_q16')->nullable();
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
        Schema::dropIfExists('authorities_systematically_q16b');
    }
};