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
        Schema::create('fees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('student_enroll_id'); // Student Enrollment ID
            $table->unsignedBigInteger('category_id'); // Category ID
            $table->decimal('fee_amount', 10, 2); // Fee amount
            $table->decimal('fine_amount', 10, 2)->default(0); // Fine amount (default 0)
            $table->decimal('discount_amount', 10, 2)->default(0); // Discount amount (default 0)
            $table->decimal('paid_amount', 10, 2)->default(0); // Paid amount (default 0)
            $table->date('assign_date'); // Fee assignment date
            $table->date('due_date'); // Fee due date
            $table->date('pay_date')->nullable(); // Fee payment date (nullable)
            $table->string('payment_method'); // Payment method
            $table->text('note')->nullable(); // Note (nullable)
            $table->enum('status', ['paid', 'unpaid', 'partial'])->default('unpaid'); // Fee status
            $table->unsignedBigInteger('created_by'); // ID of the user who created the record
            $table->unsignedBigInteger('updated_by')->nullable(); // ID of the user who updated the record (nullable)
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
};
