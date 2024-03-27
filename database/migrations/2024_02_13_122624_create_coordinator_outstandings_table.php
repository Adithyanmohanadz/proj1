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
        Schema::create('coordinator_outstandings', function (Blueprint $table) {
            $table->id();
            $table->string('coordinator_outstanding_id', 100)->unique();
            $table->string('coordinator_id', 100)->nullable();
            $table->decimal('total_in', 10, 2)->default(0.00);
            $table->decimal('total_out', 10, 2)->default(0.00); 
            $table->decimal('total_outstanding', 10, 2)->default(0.00); 
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
        Schema::dropIfExists('coordinator_outstandings');
    }
};
