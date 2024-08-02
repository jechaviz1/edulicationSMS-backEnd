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
        Schema::create('enuquiry_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('enuquiry_id')->constrained()->onDelete('cascade');
            $table->foreignId('note_category')->constrained()->onDelete('cascade');
            $table->string('followUpDate')->nullable();
            $table->string('assignTo')->nullable();
            $table->string('chance_success')->nullable();
            $table->string('likelyMonth')->nullable();
            $table->string('template')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('enuquiry_notes');
    }
};
