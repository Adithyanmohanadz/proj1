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
        Schema::create('coordinator_orders', function (Blueprint $table) {
            $table->id();
            $table->string('coordinator_order_id', 100)->unique();
            $table->string('coordinator_id', 100)->nullable();
            $table->string('material_id', 100)->nullable();
            $table->string('product_id', 100)->nullable();
            $table->string('material_category_id', 100)->nullable();
            $table->string('class_id', 100)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
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
        Schema::dropIfExists('coordinator_orders');
    }
};
