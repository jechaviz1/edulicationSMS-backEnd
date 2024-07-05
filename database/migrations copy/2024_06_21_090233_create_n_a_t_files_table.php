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
        Schema::create('n_a_t_files', function (Blueprint $table) {
            $table->id();
            $table->string('date_from');
            $table->string('date_to');
            $table->string('nat_file');
            $table->string('no_out_come');
            $table->string('generated_by');
            $table->string('exclusion');
            $table->string('inclusions');
            $table->string('version');
            $table->string('reporting_state');
            $table->string('start_enrolments');
            $table->string('forstate');
            $table->string('report_type');
            $table->string('status');
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
        Schema::dropIfExists('n_a_t_files');
    }
};
