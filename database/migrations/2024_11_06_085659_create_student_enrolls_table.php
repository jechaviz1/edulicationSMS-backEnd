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
        Schema::create('student_enrolls', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('student_id'); // ID of the student
            $table->unsignedBigInteger('program_id'); // Program ID
            $table->unsignedBigInteger('session_id'); // Session ID
            $table->unsignedBigInteger('semester_id'); // Semester ID
            $table->unsignedBigInteger('section_id'); // Section ID
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active'); // Enrollment status
            $table->unsignedBigInteger('created_by'); // ID of the user who created the record
            $table->unsignedBigInteger('updated_by')->nullable(); // ID of the user who updated the record (nullable)
            $table->timestamps(); // Created at and Updated at columns
            
            // Optionally, you can add foreign key constraints here, if needed.
            // $table->foreign('student_id')->references('id')->on('students');
            // $table->foreign('program_id')->references('id')->on('programs');
            // $table->foreign('session_id')->references('id')->on('sessions');
            // $table->foreign('semester_id')->references('id')->on('semesters');
            // $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enrolls');
    }
};
