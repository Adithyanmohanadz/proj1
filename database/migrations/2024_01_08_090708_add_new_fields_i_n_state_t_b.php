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
        Schema::table('states', function (Blueprint $table) {
            $table->string('state_id', 100)->unique()->after('id');
            $table->string('country_id', 100)->after('state_id');
            $table->string('state', 50)->nullable()->after('country_id');
            $table->integer('status')->default(1)->after('state');
            $table->integer('deleted')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('states', function (Blueprint $table) {
            //
        });
    }
};
