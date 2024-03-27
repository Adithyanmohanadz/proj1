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
        Schema::create('school_examiners', function (Blueprint $table) {
            $table->id();
            $table->string('school_examiner_id', 100)->unique();
            $table->string('coordinator_id',100)->nullable();
            $table->string('examiner_id', 100)->nullable();
            $table->string('school_id',200)->nullable();          
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
        Schema::dropIfExists('school_examiners');
    }
};
