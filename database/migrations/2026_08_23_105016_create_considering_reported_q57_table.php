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
        Schema::create('considering_reported_q57', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('mejor_q57')->nullable();
            $table->string('suggested_q57')->nullable();
            $table->string('document_upload_q57')->nullable();
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
        Schema::dropIfExists('considering_reported_q57');
    }
};