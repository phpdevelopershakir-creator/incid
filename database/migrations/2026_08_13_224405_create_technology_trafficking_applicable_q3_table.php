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
        Schema::create('technology_trafficking_applicable_q3', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('category_q3')->nullable();
            $table->string('purpose_q3')->nullable();
            $table->string('technology_q3')->nullable();
            $table->text('description_q3')->nullable();
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
        Schema::dropIfExists('technology_trafficking_applicable_q3');
    }
};