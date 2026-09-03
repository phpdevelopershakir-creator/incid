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
        Schema::create('internal_trafficking_q38', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('internal_men_q38')->nullable();
            $table->string('internal_women_q38')->nullable();
            $table->string('internal_tg_q38')->nullable();
            $table->string('internal_boy_q38')->nullable();
            $table->string('internal_girl_q38')->nullable();
            $table->string('internal_total_q38')->nullable();
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
        Schema::dropIfExists('internal_trafficking_q38');
    }
};