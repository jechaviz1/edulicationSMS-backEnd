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
        Schema::table('fees_discounts', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(0); // Add the is_deleted column with a default value of 0 (not deleted)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fees_discounts', function (Blueprint $table) {
            $table->dropColumn('is_deleted'); // Remove the is_deleted column
        });
    }
};
