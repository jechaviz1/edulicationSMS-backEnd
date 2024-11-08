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
        Schema::create('content', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
        $table->string('title'); // Title of the content
        $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the content (active/inactive)
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
        Schema::dropIfExists('content');
    }
};
