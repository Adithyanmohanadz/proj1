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
            $table->string('order_id',255)->nullable()->after('coordinator_id');
            $table->integer('processed')->default(0)->after('status');
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
