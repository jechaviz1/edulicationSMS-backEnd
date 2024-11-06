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
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
        $table->string('title'); // Title of the leave type
        $table->string('slug')->unique(); // Slug for URL-friendly naming
        $table->integer('limit')->nullable(); // Limit of leave days (nullable if not applicable)
        $table->text('description')->nullable(); // Description of the leave type (nullable)
        $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the leave type (active/inactive)
        $table->boolean('is_deleted')->default(0); // Soft delete flag (optional)
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
        Schema::dropIfExists('leave_types');
    }
};
