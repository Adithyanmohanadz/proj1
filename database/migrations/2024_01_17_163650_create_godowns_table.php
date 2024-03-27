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
        Schema::create('godowns', function (Blueprint $table) {
            $table->id();
            $table->string('godown_id', 100)->unique();
            $table->string('godown_name', 100)->nullable();
            $table->string('state_id', 100)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('mobile', 150)->nullable();
            $table->string('email', 150)->nullable();
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
        Schema::dropIfExists('godowns');
    }
};
