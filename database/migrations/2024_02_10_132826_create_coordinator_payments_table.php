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
        Schema::create('coordinator_payments', function (Blueprint $table) {
            $table->id();
            $table->string('coordinator_payment_id', 100)->unique();
            $table->string('coordinator_id',100)->nullable();
            $table->date('paid_date')->nullable();
            $table->string('particulars', 100)->nullable();
            $table->string('paid_amount', 100)->nullable();
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
        Schema::dropIfExists('coordinator_payments');
    }
};
