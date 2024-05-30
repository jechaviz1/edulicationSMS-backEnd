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
        Schema::create('templates_background', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('templates_id')->nullable();
            $table->foreign('templates_id')->references('id')->on('templates');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('dpi')->nullable();
            $table->string('added_by')->nullable();
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
        Schema::dropIfExists('templates_background');
    }
};
