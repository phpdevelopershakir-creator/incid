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
        Schema::create('convicted_traffickers_q41', function (Blueprint $table) {
            $table->id();
             $table->integer('case_id')->nullable();
            $table->text('convicted_traffickers_title_one_q41')->nullable();
            $table->text('convicted_traffickers_title_two_q41')->nullable();
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
        Schema::dropIfExists('convicted_traffickers_q41');
    }
};