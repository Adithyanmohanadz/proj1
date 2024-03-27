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
        Schema::create('admin_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('admin_ledger_id', 100)->unique();
            $table->string('coordinator_id', 100)->nullable();
            $table->string('consolidate_order_id', 100)->nullable();
            $table->string('order_id', 100)->nullable();
            $table->dateTime('date',)->nullable();
            $table->string('number', 150)->nullable();
            $table->string('particulars', 150)->nullable();
            $table->decimal('in', 10, 2)->default(0.00); // Assuming decimal with 2 decimal places
            $table->decimal('out', 10, 2)->default(0.00); // Assuming decimal with 2 decimal places
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
        Schema::dropIfExists('admin_ledgers');
    }
};
