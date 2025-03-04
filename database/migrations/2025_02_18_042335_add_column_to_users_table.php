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
        // tambah kolom di tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
            $table->string('nidn')->unique()->nullable()->after('username');
            $table->string('nip')->unique()->nullable()->after('nidn');
            $table->string('phone')->unique()->nullable()->after('nip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'nidn',
                'nip',
                'phone',
            ]);
        });
    }
};
