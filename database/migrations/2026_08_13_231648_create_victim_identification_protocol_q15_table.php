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
        Schema::create('victim_identification_protocol_q15', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->text('description_one_q15')->nullable();
            $table->text('description_two_q15')->nullable();
            $table->text('description_three_q15')->nullable();
            $table->string('document_upload_q15')->nullable();
            
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
        Schema::dropIfExists('victim_identification_protocol_q15');
    }
};