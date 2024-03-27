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
        Schema::table('students', function (Blueprint $table) {
            $table->string('address',150)->nullable()->after('email');
            $table->string('parent_name',50)->nullable()->after('address');
            $table->string('parent_email',150)->nullable()->after('parent_name');
            $table->string('parent_mobile',150)->nullable()->after('parent_email');
            $table->string('parent_occupation',50)->nullable()->after('parent_mobile');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
