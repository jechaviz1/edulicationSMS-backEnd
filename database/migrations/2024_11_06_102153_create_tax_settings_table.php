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
        Schema::create('tax_settings', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->decimal('min_amount', 10, 2); // Minimum amount for the tax setting
            $table->decimal('max_amount', 10, 2); // Maximum amount for the tax setting
            $table->decimal('percentage', 5, 2); // Tax percentage (e.g., 15.00 for 15%)
            $table->decimal('max_no_taxable_amount', 10, 2)->nullable(); // Max non-taxable amount (nullable)
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status of the tax setting (active/inactive)
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
        Schema::dropIfExists('tax_settings');
    }
};
