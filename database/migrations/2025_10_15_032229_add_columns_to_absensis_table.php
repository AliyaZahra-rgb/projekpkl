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
            if (!Schema::hasColumn('absensis', 'karyawan_id')) {
                $table->unsignedBigInteger('karyawan_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('absensis', 'waktu_masuk')) {
                $table->timestamp('waktu_masuk')->nullable()->after('karyawan_id');
            }

            if (!Schema::hasColumn('absensis', 'waktu_pulang')) {
                $table->timestamp('waktu_pulang')->nullable()->after('waktu_masuk');
            }

            if (!Schema::hasColumn('absensis', 'status')) {
                $table->string('status')->nullable()->after('waktu_pulang');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->dropColumn(['karyawan_id', 'waktu_masuk', 'waktu_pulang', 'status']);
        });
    }
};
