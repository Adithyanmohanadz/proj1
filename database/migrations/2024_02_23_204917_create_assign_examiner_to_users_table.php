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
        Schema::create('assign_examiner_to_users', function (Blueprint $table) {
            $table->id();
            $table->string('assign_examiner_to_user_id', 100)->unique();
            $table->string('user_type',50)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->string('examiner_id',100)->nullable();          
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
        Schema::dropIfExists('assign_examiner_to_users');
    }
};
