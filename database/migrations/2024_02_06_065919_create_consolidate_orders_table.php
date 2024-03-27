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
        Schema::create('consolidate_orders', function (Blueprint $table) {
            $table->id();
            $table->string('consolidate_order_id', 100)->unique();
            $table->string('coordinator_id',100)->nullable();
            $table->string('order_id',255)->nullable();
            $table->date('order_date')->nullable();
            $table->string('shipping_address_id', 100)->nullable();
            $table->string('godown_id', 100)->nullable();
            $table->string('executive_name', 100)->nullable();
            $table->datetime('executed_date')->nullable();
            $table->datetime('courier_date')->nullable();
            $table->string('tracking_id', 255)->nullable();
            $table->string('method_of_delivery', 100)->nullable();
            $table->string('remark', 150)->nullable();
            $table->string('order_status', 50)->default('pending');
            $table->integer('completed')->default(0);
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
        Schema::dropIfExists('consolidate_orders');
    }
};
