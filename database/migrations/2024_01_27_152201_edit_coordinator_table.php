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
        Schema::table('coordinators', function (Blueprint $table) {
            $table->string('username', 100)->nullable()->after('coordinator_name');
            $table->string('mobile', 150)->nullable()->after('username');
            $table->string('email', 150)->nullable()->after('mobile');
            $table->string('password', 150)->nullable()->after('email');
            $table->string('city_id', 100)->nullable()->after('password');
            $table->string('state_id', 100)->nullable()->after('city_id');
            $table->string('country_id', 100)->nullable()->after('state_id');
            $table->string('pincode_id', 100)->nullable()->before('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coordinators', function (Blueprint $table) {
            //
        });
    }
};
