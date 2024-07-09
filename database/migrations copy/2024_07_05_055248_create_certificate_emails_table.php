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
        Schema::create('certificate_emails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('certificate_id')->nullable();
            $table->foreign('certificate_id')->references('id')->on('templates')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('certificate_emails');
    }
};
