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
        Schema::create('fees_fines', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->date('start_day'); // The start date of the fine
            $table->date('end_day'); // The end date of the fine
            $table->decimal('amount', 10, 2); // The fine amount
            $table->string('type'); // The type of the fine (e.g., late fee, penalty)
            $table->string('status')->default('active'); // The status of the fine (active, inactive, etc.)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_fines');
    }
};
