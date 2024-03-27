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
        Schema::create('examiner_meet_links', function (Blueprint $table) {
            $table->id();
            $table->string('examiner_meet_link_id', 100)->unique();
            $table->string('coordinator_id',100)->nullable();
            $table->string('examiner_id', 100)->nullable();
            $table->string('meet_link',200)->nullable();          
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
        Schema::dropIfExists('examiner_meet_links');
    }
};
