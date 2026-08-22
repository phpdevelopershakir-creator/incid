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
        Schema::create('instances_trafficking_q56', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('instances_trafficking_country_q56')->nullable();
            $table->string('instances_trafficking_desc_q56')->nullable();
            $table->string('instances_trafficking_men_q56')->nullable();
            $table->string('instances_trafficking_women_q56')->nullable();
            $table->string('instances_trafficking_tg_q56')->nullable();
            $table->string('instances_trafficking_total_q56')->nullable();
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
        Schema::dropIfExists('instances_trafficking_q56');
    }
};