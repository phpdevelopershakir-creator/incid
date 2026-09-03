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
        Schema::create('law_enforcement_q35', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('q35_p1_radio')->nullable();
            $table->string('q35_p1_yes_text')->nullable();
            $table->string('q35_p1_others_text')->nullable();
            $table->string('q35_p2_radio')->nullable();
            $table->string('q35_p2_yes_text')->nullable();
            $table->string('q35_p2_others_text')->nullable();
            $table->string('q35_p3_radio')->nullable();
            $table->string('q35_p3_yes_text')->nullable();
            $table->string('q35_p3_others_text')->nullable();
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
        Schema::dropIfExists('law_enforcement_q35');
    }
};