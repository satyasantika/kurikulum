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
            $table->uuid('id')->primary('id');
            $table->string('kode_unsil')->nullable();
            $table->string('nama')->nullable();
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
            $table->string('tahun_akreditasi')->nullable();
            $table->string('sk_akreditasi')->nullable();
            $table->string('tahun_internasional')->nullable();
            $table->string('sk_internasional')->nullable();
            $table->timestamps();
        });
        // jenis_kurikulum
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('nama')->nullable();
            $table->string('kode')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignUuid('prodi_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // profil lulusan
        Schema::create('profils', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignUuid('kurikulum_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // indikator profil lulusan
        Schema::create('profil_indikators', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('profil_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->text('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        // capaian pembelajaran lulusan
        Schema::create('cpls', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->string('cakupan')->nullable();
            $table->timestamps();
        });
        // interaksi profil-cpl
        Schema::create('join_profil_cpls', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('profil_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignUuid('cpl_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // bahan kajian
        Schema::create('bks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        // interaksi cpl-bk
        Schema::create('join_cpl_bks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('cpl_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignUuid('bk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // mata kuliah
        Schema::create('mks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('bk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->string('kodemk')->nullable();
            $table->string('nama')->nullable();
            $table->integer('semester')->default(0);
            $table->integer('sks')->default(0);
            $table->integer('sks_teori')->default(0);
            $table->integer('sks_praktik')->default(0);
            $table->integer('sks_lapangan')->default(0);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        // cpmk
        Schema::create('cpmks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('mk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        // interaksi cpl-cpmk
        Schema::create('join_cpl_cpmks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuid('cpl_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->foreignUuid('cpmk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // sub cpmk
        Schema::create('subcpmks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('kode')->nullable();
            $table->text('nama')->nullable();
            $table->foreignUuId('cpmk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // kuliah
        Schema::create('kuliahs', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->foreignUuId('subcpmk_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->text('materi')->nullable();
            $table->foreignid('user_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete(); // dosen pengajar
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
            $table->uuid('id')->primary('id');
            $table->text('nama')->nullable();
            $table->foreignUuId('kuliah_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // bentuk pembelajaran
        Schema::create('kuliah_bentuks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->text('nama')->nullable();
            $table->foreignUuId('kuliah_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // evaluasi pembelajaran
        Schema::create('kuliah_evaluasis', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->text('nama')->nullable();
            $table->foreignUuId('kuliah_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
        // berkas pembelajaran
        Schema::create('kuliah_berkass', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->text('nama')->nullable();
            $table->foreignUuId('kuliah_id')->nullable()->constrained()->onUpdate('cascade')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // berkas pembelajaran
        Schema::table('kuliah_berkass', function (Blueprint $table) {
            $table->dropForeign('kuliah_berkass_kuliah_id_foreign');
        });
        Schema::dropIfExists('kuliah_berkass');
        // evaluasi pembelajaran
        Schema::table('kuliah_evaluasis', function (Blueprint $table) {
            $table->dropForeign('kuliah_evaluasis_kuliah_id_foreign');
        });
        Schema::dropIfExists('kuliah_evaluasis');
        // bentuk pembelajaran
        Schema::table('kuliah_bentuks', function (Blueprint $table) {
            $table->dropForeign('kuliah_bentuks_kuliah_id_foreign');
        });
        Schema::dropIfExists('kuliah_bentuks');
        // sub materi
        Schema::table('submateris', function (Blueprint $table) {
            $table->dropForeign('submateris_kuliah_id_foreign');
        });
        Schema::dropIfExists('submateris');
        // kuliah
        Schema::table('kuliahs', function (Blueprint $table) {
            $table->dropForeign('kuliahs_subcpmk_id_foreign');
        });
        Schema::dropIfExists('kuliahs');
        // sub cpmk
        Schema::table('subcpmks', function (Blueprint $table) {
            $table->dropForeign('subcpmks_cpmk_id_foreign');
        });
        Schema::dropIfExists('subcpmks');
        // interaksi cpl-cpmk
        Schema::table('join_cpl_cpmks', function (Blueprint $table) {
            $table->dropForeign('join_cpl_cpmks_cpl_id_foreign');
            $table->dropForeign('join_cpl_cpmks_cpmk_id_foreign');
        });
        Schema::dropIfExists('join_cpl_cpmks');
        // cpmk
        Schema::table('cpmks', function (Blueprint $table) {
            $table->dropForeign('cpmks_mk_id_foreign');
        });
        Schema::dropIfExists('cpmks');
        // mata kuliah
        Schema::table('mks', function (Blueprint $table) {
            $table->dropForeign('mks_bk_id_foreign');
        });
        Schema::dropIfExists('mks');
        // interaksi cpl-bk
        Schema::table('join_cpl_bks', function (Blueprint $table) {
            $table->dropForeign('join_cpl_bks_cpl_id_foreign');
            $table->dropForeign('join_cpl_bks_bk_id_foreign');
        });
        Schema::dropIfExists('join_cpl_bks');
        // bahan kajian
        Schema::dropIfExists('bks');
        // interaksi profil-cpl
        Schema::table('join_profil_cpls', function (Blueprint $table) {
            $table->dropForeign('join_profil_cpls_profil_id_foreign');
            $table->dropForeign('join_profil_cpls_cpl_id_foreign');
        });
        Schema::dropIfExists('join_profil_cpls');
        // capaian pembelajaran lulusan
        Schema::dropIfExists('cpls');
        // indikator profil lulusan
        Schema::table('profil_indikators', function (Blueprint $table) {
            $table->dropForeign('profil_indikators_profil_id_foreign');
        });
        Schema::dropIfExists('profil_indikators');
        // profil lulusan
        Schema::table('profils', function (Blueprint $table) {
            $table->dropForeign('profils_kurikulum_id_foreign');
        });
        Schema::dropIfExists('profils');
        // jenis_kurikulum
        Schema::table('kurikulums', function (Blueprint $table) {
            $table->dropForeign('kurikulums_prodi_id_foreign');
        });
        Schema::dropIfExists('kurikulums');
        // identitas program studi
        Schema::dropIfExists('prodis');
    }
};
