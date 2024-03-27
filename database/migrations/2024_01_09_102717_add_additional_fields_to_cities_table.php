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
        Schema::table('cities', function (Blueprint $table) {
            $table->string('city_id', 100)->unique()->after('id');
            $table->string('state_id', 100)->after('city_id');
            $table->string('city', 50)->nullable()->after('state_id');
            $table->integer('status')->default(1)->after('city');
            $table->integer('deleted')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            //
        });
    }
};
