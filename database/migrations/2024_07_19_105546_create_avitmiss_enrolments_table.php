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
        Schema::create('avitmiss_enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('deliverymodeId')->nullable();
            $table->string('scheduledHours')->nullable();
            $table->string('studyReasonId')->nullable();
            $table->string('commencourseId')->nullable();
            $table->string('isVETSchool')->nullable();
            $table->string('contractApprenticeshipId')->nullable();
            $table->string('clientApprenticeshipId')->nullable();
            $table->string('associatedCourseId')->nullable();
            $table->string('tuitionFee')->nullable();
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
        Schema::dropIfExists('avitmiss_enrolments');
    }
};
