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
        Schema::create('academic_class', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('academic_session_id')->nullable();
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
        Schema::dropIfExists('academic_class');
    }
};
