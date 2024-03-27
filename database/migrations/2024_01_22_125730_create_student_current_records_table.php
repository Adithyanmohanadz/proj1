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
        Schema::create('student_current_records', function (Blueprint $table) {
            $table->id();
            $table->string('student_current_record_id', 100)->unique();
            $table->string('student_id', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('material_category_id', 100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->integer('current_level_material_purchase_status')->nullable();
            $table->integer('current_level_exam_attended_status')->default(0);
            $table->integer('current_level_exam_result_status')->default(0);
            $table->integer('final_status')->default(0);
            $table->integer('status')->default(1);
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_current_records');
    }
};
