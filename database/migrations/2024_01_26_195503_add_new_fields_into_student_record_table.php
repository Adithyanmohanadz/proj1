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
            $table->string('type_of_exam', 50)->default('none')->after('current_level_material_purchase_status');
        $table->integer('win_or_lose')->default(2)->after('final_status');
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
