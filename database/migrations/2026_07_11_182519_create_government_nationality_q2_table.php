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
        Schema::create('government_nationality_q2', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('government_nationality_q2')->nullable();
            $table->text('government_sector_q2')->nullable();
            $table->text('government_total_q2')->nullable();
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
        Schema::dropIfExists('government_nationality_q2');
    }
};