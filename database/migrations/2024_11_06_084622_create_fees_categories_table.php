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
        Schema::create('fees_categories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Column for the title
            $table->string('status'); // Column for the status
            $table->string('slug')->unique(); // Slug should be unique
            $table->text('description'); // Column for description
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_categories');
    }
};
