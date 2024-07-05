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
        Schema::create('default_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
            $table->unsignedBigInteger('dftCity')->nullable();
            $table->foreign('dftCity')->references('id')->on('city_town')->onDelete('cascade');
            
            $table->unsignedBigInteger('dftTrainer')->nullable();
            $table->foreign('dftTrainer')->references('id')->on('teachers')->onDelete('cascade'); // Ensure the table name is correct
            
            $table->string('dftstarttime')->nullable();
            $table->string('dftendtime')->nullable();
            
            $table->unsignedBigInteger('dftAssessor')->nullable();
            $table->foreign('dftAssessor')->references('id')->on('teachers')->onDelete('cascade'); // Ensure the table name is correct
            
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
        Schema::dropIfExists('default_sessions');
    }
};
