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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name', 50)->nullable();
            $table->string('classes', 100)->nullable();
            $table->string('level1', 50)->nullable();
            $table->string('level2', 50)->nullable();
            $table->string('level3', 50)->nullable();
            $table->string('level4', 50)->nullable();
            $table->string('level5', 50)->nullable();
            $table->string('level6', 50)->nullable();
            $table->string('level7', 50)->nullable();
            $table->string('level8', 50)->nullable();
            $table->string('level9', 50)->nullable();
            $table->string('level10', 50)->nullable();
            $table->string('level11', 50)->nullable();
            $table->string('level12', 50)->nullable();
            $table->string('level13', 50)->nullable();
            $table->string('level14', 50)->nullable();
            $table->string('level15', 50)->nullable();

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
        Schema::dropIfExists('products');
    }
};
