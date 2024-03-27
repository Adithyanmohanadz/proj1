<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Update default value for 'status' column in 'mock_exams' table
        Schema::table('mock_exams', function (Blueprint $table) {
            $table->integer('status')->default(1)->change();
        });

        // Update default value for 'status' column in 'years' table
        Schema::table('years', function (Blueprint $table) {
            $table->integer('status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mock_exams_and_years_tables', function (Blueprint $table) {
            //
        });
    }
};
