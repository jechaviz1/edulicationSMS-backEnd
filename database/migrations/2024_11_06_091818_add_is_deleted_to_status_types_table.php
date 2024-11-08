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
        Schema::table('status_types', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(0); // Add the is_deleted column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_types', function (Blueprint $table) {
            $table->dropColumn('is_deleted'); // Rollback the column addition
        });
    }
};
