<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('student_current_records', function (Blueprint $table) {
            $table->string('mock_exam_id',100)->nullable()->after('type_of_exam');
            $table->string('final_exam_id',100)->nullable()->after('mock_exam_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_current_records', function (Blueprint $table) {
            //
        });
    }
};
