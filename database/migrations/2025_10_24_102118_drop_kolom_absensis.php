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
            $table->dropColumn([ 'waktu_masuk', 'waktu_pulang', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->timestamp('waktu_masuk')->nullable();
            $table->timestamp('waktu_pulang')->nullable();
            $table->string('status')->default('hadir');
        });
    }
};
