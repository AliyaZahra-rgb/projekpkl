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
        Schema::table('karyawans', function (Blueprint $table) {
            if (!Schema::hasColumn('karyawans', 'nama')) {
                $table->string('nama')->nullable()->after('id');
            }

            if (!Schema::hasColumn('karyawans', 'jabatan')) {
                $table->string('jabatan')->nullable()->after('nama');
            }

            if (!Schema::hasColumn('karyawans', 'gaji')) {
                $table->decimal('gaji', 12, 2)->nullable()->after('jabatan');
            }

            if (!Schema::hasColumn('karyawans', 'foto')) {
                $table->string('foto')->nullable()->after('gaji');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karyawans', function (Blueprint $table) {
            $table->dropColumn(['nama', 'jabatan', 'gaji', 'foto', 'qr']);
        });
    }
};
