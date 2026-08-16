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
        Schema::create('government_officials_q18', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('location_q18')->nullable();
            $table->string('category_q18')->nullable();
            $table->string('ngo_rating_q18')->nullable();
            $table->string('men_q18')->nullable();
            $table->string('women_q18')->nullable();
            $table->string('total_q18')->nullable();
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
        Schema::dropIfExists('government_officials_q18');
    }
};