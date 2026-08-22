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
        Schema::create('instances_trafficking_q56b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('instances_trafficking_ministry_q56b')->nullable();
            $table->string('instances_trafficking_men_q56b')->nullable();
            $table->string('instances_trafficking_women_q56b')->nullable();
            $table->string('instances_trafficking_total_q56b')->nullable();
            $table->string('instances_trafficking_measures_q56b')->nullable();
            
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
        Schema::dropIfExists('instances_trafficking_q56b');
    }
};