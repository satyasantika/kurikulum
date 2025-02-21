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
        // jenis_kurikulum
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kode')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('prodi_id')->constrained();
            $table->timestamps();
        });
        // profil lulusan
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('kurikulum_id')->constrained();
            $table->timestamps();
        });
        // indikator profil lulusan
        Schema::create('profil_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained();
            $table->text('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        // capaian pembelajaran lulusan
        Schema::create('cpls', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->string('cakupan')->nullable();
            $table->timestamps();
        });
        // profil-cpl
        Schema::create('profil_cpls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained();
            $table->foreignId('cpl_id')->constrained();
            $table->timestamps();
        });
        // bahan kajian
        Schema::create('bks', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->text('dekripsi')->nullable();
            $table->timestamps();
        });
        // cpl-bk
        Schema::create('cpl_bks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cpl_id')->constrained();
            $table->foreignId('bk_id')->constrained();
            $table->timestamps();
        });
        // mata kuliah
        Schema::create('cpmks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bk_id')->constrained();
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->string('kodemk')->nullable();
            $table->string('mk')->nullable();
            $table->integer('semester')->default(0);
            $table->integer('sks')->default(0);
            $table->integer('sks_teori')->default(0);
            $table->integer('sks_praktik')->default(0);
            $table->integer('sks_lapangan')->default(0);
            $table->text('deskripsi')->nullable();
            $table->text('prasyarat')->nullable();
            $table->timestamps();
        });
        // sub cpmk
        Schema::create('subcpmks', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->foreignId('cpmk_id')->constrained();
            $table->timestamps();
        });
        // pertemuan
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcpmk_id')->constrained();
            $table->text('materi')->nullable();
            $table->foreignId('user_id')->constrained(); // dosen pengajar
            $table->integer('ke')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->text('dokumen')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        // sub materi
        Schema::create('submateris', function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable();
            $table->foreignId('pertemuan_id')->constrained();
            $table->timestamps();
        });
        // dokumen pembelajaran
        Schema::create('berkas_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->text('nama')->nullable();
            $table->foreignId('pertemuan_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berkas_pembelajarans', function (Blueprint $table) {
            $table->dropForeign('berkas_pembelajarans_pertemuan_id_foreign');
        });
        Schema::dropIfExists('berkas_pembelajarans');
        Schema::table('submateris', function (Blueprint $table) {
            $table->dropForeign('submateris_pertemuan_id_foreign');
        });
        Schema::dropIfExists('submateris');
        Schema::table('pertemuans', function (Blueprint $table) {
            $table->dropForeign('pertemuans_subcpmk_id_foreign');
        });
        Schema::dropIfExists('pertemuans');
        Schema::table('subcpmks', function (Blueprint $table) {
            $table->dropForeign('subcpmks_cpmk_id_foreign');
        });
        Schema::dropIfExists('subcpmks');
        Schema::table('cpmks', function (Blueprint $table) {
            $table->dropForeign('cpmks_bk_id_foreign');
        });
        Schema::dropIfExists('cpmks');
        Schema::table('cpl_bks', function (Blueprint $table) {
            $table->dropForeign('cpl_bks_cpl_id_foreign');
            $table->dropForeign('cpl_bks_bk_id_foreign');
        });
        Schema::dropIfExists('cpl_bks');
        Schema::dropIfExists('bks');
        Schema::table('profil_cpls', function (Blueprint $table) {
            $table->dropForeign('profil_cpls_profil_id_foreign');
            $table->dropForeign('profil_cpls_cpl_id_foreign');
        });
        Schema::dropIfExists('profil_cpls');
        Schema::dropIfExists('cpls');
        Schema::table('profil_indikators', function (Blueprint $table) {
            $table->dropForeign('profil_indikators_profil_id_foreign');
        });
        Schema::dropIfExists('profil_indikators');
        Schema::table('profils', function (Blueprint $table) {
            $table->dropForeign('profils_kurikulum_id_foreign');
        });
        Schema::dropIfExists('profils');
        Schema::table('kurikulums', function (Blueprint $table) {
            $table->dropForeign('kurikulums_prodi_id_foreign');
        });
        Schema::dropIfExists('kurikulums');
    }
};
