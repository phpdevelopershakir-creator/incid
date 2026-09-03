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
        Schema::create('enforcement_consistently_q36b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('q36_support_type')->nullable();
            $table->string('q36_men')->nullable();
            $table->string('q36_women')->nullable();
            $table->string('q36_tg')->nullable();
            $table->string('q36_total')->nullable();
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
        Schema::dropIfExists('enforcement_consistently_q36b');
    }
};