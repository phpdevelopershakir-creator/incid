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
        Schema::create('government_direct_victim_q27', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('victim_care_q27')->nullable();
            $table->string('central_government_q27')->nullable();
            $table->string('central_government_title_q27')->nullable();
            $table->string('local_government_q27')->nullable();
            $table->string('local_government_title_q27')->nullable();
            $table->string('ngo_ingo_q27')->nullable();
            $table->string('ngo_ingo_title_q27')->nullable();
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
        Schema::dropIfExists('government_direct_victim_q27');
    }
};