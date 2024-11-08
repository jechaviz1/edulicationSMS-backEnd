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
        Schema::table('fees_fines', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false); // Adding the `is_deleted` column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fees_fines', function (Blueprint $table) {
            $table->dropColumn('is_deleted'); // Remove the `is_deleted` column
        });
    }
};
