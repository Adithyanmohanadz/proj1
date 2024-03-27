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
        Schema::table('school_registrations', function (Blueprint $table) {
            $table->string('school_registration_id', 100)->unique()->after('id');
            $table->string('coordinator_id', 100)->nullable()->after('school_registration_id');
            $table->string('school_id', 100)->nullable()->after('coordinator_id');
            $table->string('product_id', 100)->nullable()->after('school_id');
            $table->string('class_id', 100)->nullable()->after('product_id');
            $table->string('school_principal_name', 100)->nullable()->after('class_id');
            $table->string('username', 100)->nullable()->after('school_principal_name');
            $table->string('password', 100)->nullable()->after('username');
            $table->string('school_file', 200)->nullable()->after('password');
            $table->integer('status')->default(1)->after('school_file');
            $table->integer('deleted')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_registrations', function (Blueprint $table) {
            //
        });
    }
};
