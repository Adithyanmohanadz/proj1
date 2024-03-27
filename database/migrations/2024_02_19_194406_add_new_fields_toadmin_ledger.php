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
        Schema::table('admin_ledgers', function (Blueprint $table) {
            $table->dateTime('affected_date')->nullable()->after('date');
            $table->string('narration',150)->nullable()->after('particulars');
            $table->decimal('balance',10,2)->nullable()->after('out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_ledgers', function (Blueprint $table) {
            //
        });
    }
};
