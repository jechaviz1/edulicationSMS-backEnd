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
        Schema::create('unit_of_competency', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->string('recognition_identifier');
            $table->string('qualification_category');
            $table->string('field_of_education');
            $table->string('nominal_hours');
            $table->string('vet');
            $table->string('competency_flag');
            $table->string('type');
            $table->enum('status', ['A','D']);
            $table->string('is_deleted');
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
        Schema::dropIfExists('unit_of_competency');
    }
};
