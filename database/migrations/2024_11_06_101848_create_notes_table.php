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
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
        $table->foreignId('noteable_id'); // Foreign key to related model
        $table->string('noteable_type'); // This will store the model class name (e.g., App\Models\Employee)
        $table->string('title'); // Title of the note
        $table->text('description'); // Description or content of the note
        $table->string('attach')->nullable(); // Optional attachment column
        $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the note
        $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Created by user (foreign key to users table)
        $table->foreignId('updated_by')->constrained('users')->onDelete('cascade'); // Updated by user (foreign key to users table)
        $table->timestamps(); // Created at and updated at timestamps
        $table->boolean('is_deleted')->default(0); // Soft delete flag (optional)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
