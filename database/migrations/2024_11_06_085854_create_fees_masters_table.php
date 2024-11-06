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
        Schema::create('fees_masters', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('category_id'); // Fee category
            $table->unsignedBigInteger('faculty_id'); // Faculty ID
            $table->unsignedBigInteger('program_id'); // Program ID
            $table->unsignedBigInteger('session_id'); // Session ID
            $table->unsignedBigInteger('semester_id'); // Semester ID
            $table->unsignedBigInteger('section_id'); // Section ID
            $table->decimal('amount', 10, 2); // Fee amount
            $table->enum('type', ['regular', 'discounted', 'extra'])->default('regular'); // Type of fee
            $table->date('assign_date'); // Date the fee was assigned
            $table->date('due_date'); // Due date for the fee
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the fee record
            $table->unsignedBigInteger('created_by'); // ID of the user who created the record
            $table->unsignedBigInteger('updated_by')->nullable(); // ID of the user who last updated the record (nullable)
            $table->timestamps(); // Created at and Updated at columns
            
            // Optionally, you can add foreign key constraints here, if needed.
            // $table->foreign('category_id')->references('id')->on('fee_categories');
            // $table->foreign('faculty_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('fees_masters');
    }
};
