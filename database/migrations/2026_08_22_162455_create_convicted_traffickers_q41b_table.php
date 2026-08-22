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
        Schema::create('convicted_traffickers_q41b', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('convicted_traffickers_location_q41b')->nullable();
            $table->string('convicted_traffickers_case_q41b')->nullable();
            $table->string('convicted_traffickers_men_q41b')->nullable();
            $table->string('convicted_traffickers_men_amount_q41b')->nullable();
            $table->string('convicted_traffickers_women_q41b')->nullable();
            $table->string('convicted_traffickers_women_amount_q41b')->nullable();
            $table->string('convicted_traffickers_total_trafic_q41b')->nullable();
            $table->string('convicted_traffickers_total_amount_q41b')->nullable();
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
        Schema::dropIfExists('convicted_traffickers_q41b');
    }
};