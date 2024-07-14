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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('assessor_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('location')->nullable();
            $table->string('rooms')->nullable();
            $table->string('start_date')->nullable();
            $table->string('dftstarthour')->nullable();
            $table->string('dftstartmin')->nullable();
            $table->string('dftstartampm')->nullable();
            $table->string('end_date')->nullable();
            $table->string('dftendhour')->nullable();
            $table->string('dftendmin')->nullable();
            $table->string('dftendampm')->nullable();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('assessor_id')->references('id')->on('teachers')->onDelete('cascade');
            // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
