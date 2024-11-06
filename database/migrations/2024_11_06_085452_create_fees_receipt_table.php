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
        Schema::create('fees_receipt', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('slug')->unique(); // Unique slug
            $table->string('title'); // Title field
            $table->text('header_left'); // Left header content
            $table->text('header_center'); // Center header content
            $table->text('header_right'); // Right header content
            $table->text('body'); // Body content
            $table->text('footer_left'); // Left footer content
            $table->text('footer_center'); // Center footer content
            $table->text('footer_right'); // Right footer content
            $table->string('logo_left'); // Path to left logo
            $table->string('logo_right'); // Path to right logo
            $table->string('background'); // Background image or color
            $table->integer('width'); // Width of the receipt
            $table->integer('height'); // Height of the receipt
            $table->string('student_photo'); // Path to student photo
            $table->string('barcode'); // Barcode field
            $table->enum('status', ['active', 'inactive']); // Status field (active or inactive)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_receipt');
    }
};
