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
        Schema::create('admin_resources', function (Blueprint $table) {
            $table->id();
            $table->string('admin_resource_id', 100)->unique();
            $table->string('file_name', 100)->nullable();
            $table->string('file_details',150)->nullable();
            $table->string('file_path',150)->nullable(); 
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
        Schema::dropIfExists('admin_resources');
    }
};
