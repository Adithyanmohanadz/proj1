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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_address_id', 100)->unique();
            $table->string('coordinator_id',100)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('landmark', 100)->nullable();
            $table->string('city_id', 100)->nullable();
            $table->string('state_id', 100)->nullable();
            $table->string('country_id', 100)->nullable();
            $table->integer('pincode_id')->nullable();
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
        Schema::dropIfExists('shipping_addresses');
    }
};
