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
    Schema::table('absensis', function (Blueprint $table) {
        $table->string('status')->nullable(); // 'hadir', 'terlambat', 'tidak_hadir'
    });
}

public function down(): void
{
    Schema::table('absensis', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
