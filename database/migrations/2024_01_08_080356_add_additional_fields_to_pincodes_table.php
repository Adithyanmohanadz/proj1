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
        Schema::table('pincodes', function (Blueprint $table) {
            $table->string('pincode_id', 100)->unique()->after('id');
            $table->string('pincode', 50)->nullable()->after('pincode_id');
            $table->integer('status')->default(1)->after('pincode');
            $table->integer('deleted')->default(0)->after('status');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pincodes', function (Blueprint $table) {
            //
        });
    }
};
