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
            $table->boolean('current_level_mockexam_attended_status')->default(0)->after('current_level_material_purchase_status');
            $table->boolean('current_level_mockexam_result_status')->default(0)->after('current_level_mockexam_attended_status');
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
