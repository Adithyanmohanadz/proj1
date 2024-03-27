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
        Schema::create('mock_exams', function (Blueprint $table) {
            $table->id();
            $table->string('mock_exam_id', 100)->unique();
            $table->string('product_id', 100)->nullable();
            $table->string('material_category_id', 100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->string('year_id', 100)->nullable();
            $table->string('mock_exam_name', 100)->nullable();
            $table->string('google_link', 250)->nullable();
            $table->dateTime('exam_start_date_time')->nullable();
            $table->dateTime('exam_end_date_time')->nullable();
            $table->integer('status')->default(0);
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mock_exams');
    }
};
