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
        Schema::create('academic_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('is_default')->nullable();
            $table->string('description')->nullable();
            $table->string('options')->nullable();
            $table->string('created_by_id')->nullable();
            $table->string('modified_by_id')->nullable();
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
        Schema::dropIfExists('academic_sessions');
    }
};
