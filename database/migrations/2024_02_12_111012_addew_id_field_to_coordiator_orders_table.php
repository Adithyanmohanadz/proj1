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
        Schema::table('coordinator_orders', function (Blueprint $table) {
            $table->string('consolidate_order_id',100)->nullable()->after('coordinator_order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coordinator_orders', function (Blueprint $table) {
            //
        });
    }
};
