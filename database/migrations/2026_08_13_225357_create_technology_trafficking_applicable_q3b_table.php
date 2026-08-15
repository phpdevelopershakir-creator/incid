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
        Schema::create('technology_trafficking_applicable_q3b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('question_q3b')->nullable();
            $table->string('response_q3b')->nullable();
            $table->text('description_q3b')->nullable();
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
        Schema::dropIfExists('technology_trafficking_applicable_q3b');
    }
};