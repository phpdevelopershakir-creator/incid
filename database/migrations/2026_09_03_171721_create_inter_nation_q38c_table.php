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
        Schema::create('inter_nation_q38c', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('location_q38c')->nullable();
            $table->string('type_q38c')->nullable();
            $table->string('men_q38c')->nullable();
            $table->string('women_q38c')->nullable();
            $table->string('tg_q38c')->nullable(); 
            $table->string('boy_q38c')->nullable();
            $table->string('girl_q38c')->nullable();
            $table->string('total_q38c')->nullable();

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
        Schema::dropIfExists('inter_nation_q38c');
    }
};