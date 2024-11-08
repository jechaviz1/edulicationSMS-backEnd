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
        Schema::create('id_card_settings', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle');
            $table->string('logo');
            $table->string('background');
            $table->string('website_url');
            $table->string('validity');
            $table->string('address');
            $table->string('student_photo');
            $table->string('signature');
            $table->string('barcode');
            $table->boolean('status')->default(1);  // Active by default
            $table->boolean('is_deleted')->default(0);  // Soft delete column, default not deleted
            $table->timestamps();  // Created at, updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('id_card_settings');
    }
};
