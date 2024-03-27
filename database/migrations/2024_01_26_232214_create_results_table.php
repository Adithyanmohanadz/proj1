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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('result_id', 100)->unique();
            $table->string('student_id', 100)->nullable();
            $table->string('school_id', 100)->nullable();
            $table->string('coordinator_id', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('material_category_id', 100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->string('year_id', 100)->nullable();
            $table->string('exam_type', 50)->nullable();
            $table->string('exam_id', 100)->nullable();
            $table->integer('exam_score')->nullable();
            $table->integer('exam_status')->default(0);
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
        Schema::dropIfExists('results');
    }
};
