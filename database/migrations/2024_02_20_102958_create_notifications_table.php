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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_id', 100)->unique();
            $table->string('product_id',100)->nullable();
            $table->string('level_id', 100)->nullable();
            $table->string('class_id',100)->nullable();
            $table->string('title',150)->nullable(); 
            $table->string('file_path',200)->nullable(); 
            $table->integer('school')->default(0);
            $table->integer('coordinator')->default(0);
            $table->integer('student')->default(0);

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
        Schema::dropIfExists('notifications');
    }
};
