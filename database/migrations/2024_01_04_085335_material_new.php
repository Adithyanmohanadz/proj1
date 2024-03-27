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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('material_id',100)->unique();
            $table->string('material_name', 50)->nullable();
            $table->integer('material_price')->nullable();
            $table->string('product_id',100)->nullable();
            $table->string('material_category_id',100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->string('material_resource', 100)->nullable();
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
        Schema::dropIfExists('materials');
    }
};
