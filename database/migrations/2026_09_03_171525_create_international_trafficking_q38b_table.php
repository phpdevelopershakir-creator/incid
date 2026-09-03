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
        Schema::create('international_trafficking_q38b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('international_men_q38')->nullable();
            $table->string('international_women_q38')->nullable();
            $table->string('international_tg_q38')->nullable();
            $table->string('international_boy_q38')->nullable();
            $table->string('international_girl_q38')->nullable();
            $table->string('international_total_q38')->nullable();
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
        Schema::dropIfExists('international_trafficking_q38b');
    }
};