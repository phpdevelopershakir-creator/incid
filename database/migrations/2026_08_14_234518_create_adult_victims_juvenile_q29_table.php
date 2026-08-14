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
        Schema::create('adult_victims_juvenile_q29', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('adult_victims_juvenile_title_q29')->nullable();
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
        Schema::dropIfExists('adult_victims_juvenile_q29');
    }
};