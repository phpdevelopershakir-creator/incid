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
        Schema::create('government_monitor_immigrations_q33', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id')->nullable();
            $table->string('involved_directly_trafficking_title_q33')->nullable();
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
        Schema::dropIfExists('government_monitor_immigrations_q33');
    }
};
