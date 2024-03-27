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
        Schema::create('office_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('office_contact_id', 100)->unique();
            $table->string('office_name', 100)->nullable();
            $table->string('mobile_number',150)->nullable();
            $table->string('email',150)->nullable(); 
            $table->string('address',200)->nullable(); 
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
        Schema::dropIfExists('office_contacts');
    }
};
