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
        Schema::table('fees_categories', function (Blueprint $table) {
            // Adding 'is_deleted' column to the table (defaulting to 0, for not deleted)
            $table->boolean('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fees_categories', function (Blueprint $table) {
            // Removing 'is_deleted' column
            $table->dropColumn('is_deleted');
        });
    }
};
