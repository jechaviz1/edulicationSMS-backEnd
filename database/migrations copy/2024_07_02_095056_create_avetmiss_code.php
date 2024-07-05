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
        Schema::create('avetmiss_code', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('course_code');
            $table->string('state_course_code');
            $table->string('reporting_state');
            $table->string('nominal_hours');
            $table->string('recognition_identifier');
            $table->string('qualification_category');
            $table->string('anzscod_id');
            $table->string('vet_flag');
            $table->string('field_of_education');
            $table->string('associated_course_identifier');
            $table->enum('status', ['A','D']);
            $table->string('is_deleted')->nullable();
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
        Schema::dropIfExists('avetmiss_code');
    }
};
