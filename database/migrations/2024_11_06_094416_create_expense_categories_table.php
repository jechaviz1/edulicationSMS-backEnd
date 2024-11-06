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
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the expense category
            $table->string('slug')->unique(); // Slug for URL
            $table->text('description'); // Description of the category
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status (active or inactive)
            $table->boolean('is_deleted')->default(0); // Flag to mark deleted (0 = not deleted, 1 = deleted)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense_categories');
    }
};
