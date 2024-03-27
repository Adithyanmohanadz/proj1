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
        Schema::create('material_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('material_enquiry_id', 100)->unique();
            $table->string('school_id', 100)->nullable();
            $table->string('student_id', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('material_category_id', 100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->string('material_id', 100)->nullable();
            $table->integer('material_availability')->default(0);
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
        Schema::dropIfExists('material_enquiries');
    }
};
