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
        Schema::create('avetmiss_funding_state', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('funding_state_id')->nullable();
            $table->foreign('funding_state_id')->references('id')->on('funding_states')->onDelete('cascade');
            $table->unsignedBigInteger('avitmiss_id')->nullable();
            $table->foreign('avitmiss_id')->references('id')->on('avetmisses')->onDelete('cascade');
            $table->string('value'); // or any other type you need
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
        Schema::dropIfExists('avetmiss_funding_state');
    }
};
