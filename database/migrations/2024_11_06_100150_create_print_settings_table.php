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
        Schema::create('print_settings', function (Blueprint $table) {
            $table->id();
        $table->string('slug')->unique();
        $table->string('title');
        $table->string('header_left')->nullable();
        $table->string('header_center')->nullable();
        $table->string('header_right')->nullable();
        $table->text('body')->nullable();
        $table->string('footer_left')->nullable();
        $table->string('footer_center')->nullable();
        $table->string('footer_right')->nullable();
        $table->string('logo_left')->nullable();
        $table->string('logo_right')->nullable();
        $table->string('background')->nullable();
        $table->integer('width')->nullable();
        $table->integer('height')->nullable();
        $table->string('student_photo')->nullable();
        $table->string('barcode')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('print_settings');
    }
};
