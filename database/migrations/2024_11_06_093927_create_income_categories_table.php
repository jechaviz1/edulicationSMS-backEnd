<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('income_categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Category title
            $table->string('slug')->unique(); // Slug for URL
            $table->text('description'); // Description of the category
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status (active or inactive)
            $table->boolean('is_deleted')->default(0); // Flag to mark deletion (0 = not deleted, 1 = deleted)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('income_categories');
    }
}
