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
        Schema::create('exam_types', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Title of the exam type (e.g., Midterm, Final Exam)
            $table->integer('marks'); // Marks for the exam type
            $table->decimal('contribution', 5, 2); // Contribution percentage or weight of the exam
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the exam type
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_types');
    }
};
