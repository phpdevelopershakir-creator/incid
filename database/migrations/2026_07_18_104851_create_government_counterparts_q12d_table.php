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
        Schema::create('government_counterparts_q12d', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('government_country_q12d')->nullable();
            $table->string('government_sex_trafficking_q12d')->nullable();
            $table->string('government_labour_trafficking_q12d')->nullable();
            $table->string('government_other_trafficking_q12d')->nullable();
            $table->string('government_total_trafficking_q12d')->nullable();
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
        Schema::dropIfExists('government_counterparts_q12d');
    }
};