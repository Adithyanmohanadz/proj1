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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 100)->unique();
            $table->string('school_id', 100);
            $table->string('product_id', 100);
            $table->string('material_category_id', 100);
            $table->string('class_id', 100);
            $table->string('student_name', 50)->nullable();
            $table->string('student_username', 50)->nullable();
            $table->string('mobile', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('password', 150)->nullable();
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
        Schema::dropIfExists('students');
    }
};
