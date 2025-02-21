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
        // identitas program studi
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kode_sistem')->nullable();
            $table->string('singkat')->nullable();
            $table->string('mapel')->nullable();
            $table->string('pt')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('kode_prodi')->nullable();
            $table->text('visi_misi')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('gelar_lulusan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tahun_pendirian')->nullable();
            $table->string('sk_pendirian')->nullable();
            $table->string('tahun_terakhir_akreditasi')->nullable();
            $table->string('sk_terkahir_akreditasi')->nullable();
            $table->string('tahun_terakhir_akreditasi_internasional')->nullable();
            $table->string('sk_terakhir_akreditasi_internasional')->nullable();
            $table->timestamps();
        });
        // tambah kolom di tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('name');
            $table->string('nidn')->unique()->nullable()->after('username');
            $table->string('nip')->unique()->nullable()->after('nidn');
            $table->string('phone')->unique()->nullable()->after('nip');
            $table->foreignId('prodi_id')->constrained()->default(0)->after('phone');
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
            $table->dropForeign('users_prodi_id_foreign');
        });
        Schema::dropIfExists('prodis');
    }
};
