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
        Schema::create('official_agency_q42', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('official_title_q42')->nullable();
            $table->string('official_type_q42')->nullable();
            $table->LongText('official_desc_q42')->nullable();
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
        Schema::dropIfExists('official_agency_q42');
    }
};