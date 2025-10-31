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
            $table->timestamp('waktu_masuk')->nullable()->after('karyawan_id');
            $table->timestamp('waktu_pulang')->nullable()->after('waktu_masuk');
            $table->string('status')->default('HADIR')->after('waktu_pulang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
              $table->dropColumn(['waktu_masuk', 'waktu_pulang', 'status']);
        });
    }
};
