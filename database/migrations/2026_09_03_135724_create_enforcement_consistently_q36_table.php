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
        Schema::create('enforcement_consistently_q36', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('q36_p1_status')->nullable();
            $table->string('q36_p1_yes_desc')->nullable();
            $table->string('q36_p1_others_desc')->nullable();
            $table->string('q36_p2_status')->nullable();
            $table->string('q36_p2_yes_desc')->nullable();
            $table->string('q36_p2_others_desc')->nullable();
            $table->string('q36_p3_status')->nullable();
            $table->string('q36_p3_yes_desc')->nullable();
            $table->string('q36_p3_others_desc')->nullable();
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
        Schema::dropIfExists('enforcement_consistently_q36');
    }
};