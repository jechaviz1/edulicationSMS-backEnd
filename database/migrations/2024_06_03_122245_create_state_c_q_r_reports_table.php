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
        Schema::create('state_c_q_rreports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('state')->nullable();
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('generated_by')->nullable();
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
        Schema::dropIfExists('state_c_q_rreports');
    }
};
