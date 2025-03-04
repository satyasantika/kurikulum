<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // data Prodi
        \App\Models\Prodi::create([
            'kode_unsil'=>'21',
            'pt'=>'Universitas Siliwangi',
            'fakultas'=>'Fakultas Keguruan dan Ilmu Pendidikan',
            'nama'=>'FKIP',
            'alamat'=>'Jl. Siliwangi no. 24 Kota Tasikmalaya',
            'email'=>'fkip@unsil.ac.id',
            'website'=>'fkip.unsil.ac.id',
        ]);
        $prodimat = \App\Models\Prodi::create([
            'kode_unsil'=>'2151',
            'pt'=>'Universitas Siliwangi',
            'fakultas'=>'Fakultas Keguruan dan Ilmu Pendidikan',
            'nama'=>'Pendidikan Matematika',
            'kode_prodi'=>'84202',
            'visi_misi'=>'Mengembangkan Keilmuan Pendidikan dan pembelajaran Matematika Melalui Transformative Learning dan Edupreneur Matematika untuk Menghasilkan Lulusan Unggul yang Berwawasan Kebangsaan dan Berkarakter Wirausaha',
            'jenjang'=>'S1',
            'gelar_lulusan'=>'Sarjana Pendidikan (S.Pd.)',
            'alamat'=>'Jl. Siliwangi no. 24 Kota Tasikmalaya',
            'email'=>'mat@unsil.ac.id',
            'website'=>'matematika.unsil.ac.id',
            'tahun_pendirian'=>'2014',
            'sk_pendirian'=>'Perpres No. 24 Tahun 2014',
            'tahun_akreditasi'=>'2024',
            'sk_akreditasi'=>'1552/SK/LAMDIK/Ak/S/X/2024',
        ]);

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
        ]);

        // data kurikulum
        $kurikulum = $prodimat->kurikulums()->create([
            'nama'=>'Kurikulum OBE 2025',
            'kode'=>'mat-OBE-2025',
        ]);

        // data profil lulusan
        $profil1 = $kurikulum->profils()->create([
            'nama'=>'Pendidik Matematika',
            'deskripsi'=>'Orang yang melakukan proses pengubahan sikap dan perilaku seseorang atau kelompok orang dalam usaha mendewasakan manusia melalui upaya pengajaran, bimbingan dan latihan di bidang matematika dengan menguasai materi matematika (Content Knowledge), pedagogik (Pedagogical Knowledge) dan teknologi (Technological Knowledge)',
        ]);
        $profil2 = $kurikulum->profils()->create([
            'nama'=>'Peneliti',
            'deskripsi'=>'Orang yang menguasai konsep teoritis penelitian pendidikan matematika dan terampil dalam menyelesaikan masalah secara prosedural dalam kehidupan sehari-hari',
        ]);
        $profil3 = $kurikulum->profils()->create([
            'nama'=>'Edupreneur',
            'deskripsi'=>'Orang yang memiliki jiwa kewirausahaan untuk memecahkan permasalahan dan mampu beradaptasi, baik dalam pembelajaran maupun dalam kehidupan sehari-hari',
        ]);

        // data indikator dari profil
        $profil1->profil_indikators()->create([
            'nama'=>'Menguasai konsep teoritis tentang konsep-konsep dasar matematika'
        ]);
        $profil1->profil_indikators()->create([
            'nama'=>'Menguasai dan mengaplikasikan strategi dan metode pembelajaran dasar yang efektif untuk menyampaikan materi matematika'
        ]);
        $profil1->profil_indikators()->create([
            'nama'=>'Mampu memanfaatkan teknologi untuk mendukung proses dan evaluasi pembelajaran'
        ]);
        $profil1->profil_indikators()->create([
            'nama'=>'Mampu mendesain pengelolaan kelas yang baik untuk terciptanya lingkungan belajar yang kondusif'
        ]);
        $profil2->profil_indikators()->create([
            'nama'=>'Menguasai konsep pengumpulan, pengolahan, analisis, penyajian, dan interpretasi data yang dilakukan secara sistematis dan objektif'
        ]);
        $profil2->profil_indikators()->create([
            'nama'=>'Memiliki keterampilan literasi informasi untuk mendukung topik penelitiannya'
        ]);
        $profil2->profil_indikators()->create([
            'nama'=>'Mampu menyusun laporan penelitian dan artikel ilmiah yang mendukung penerapan teori-teori pendidikan matematika'
        ]);
        $profil3->profil_indikators()->create([
            'nama'=>'Menguasai konsep teoritis tentang konsep-konsep dasar kewirausahaan untuk menghasilkan ide-ide kreatif dan inovatif dalam pembelajaran'
        ]);
        $profil3->profil_indikators()->create([
            'nama'=>'Mampu merancang produk atau layanan pendidikan yang inovatif'
        ]);
        $profil3->profil_indikators()->create([
            'nama'=>'Mampu mengomunikasikan hasil rancangan produk atau layanan pendidikan secara sistematis untuk perbaikan pembelajaran'
        ]);

        // data bahan kajian
        $bk1 = \App\Models\Bk::create([
            'kode'=>'BK-1',
            'nama'=>'Sikap, nilai, pengetahuan, dan keterampilan kognitif',
            'deskripsi'=>'Menginternalisasi ajaran agama dalam setiap aspek kehidupan, baik dalam sikap, perilaku, maupun keputusan akademik, dengan menjadikan nilai-nilai spiritual sebagai landasan moral, serta menjunjung tinggi integritas akademik dan menghormati aturan serta norma yang berlaku. Sikap ini mencerminkan etika akademik yang baik dan tanggung jawab sebagai warga negara yang aktif berkontribusi bagi masyarakat. Tanggung jawab mandiri dan profesional dalam menjalankan profesi sesuai bidang keahlian menjadi keharusan, diiringi dengan penguasaan soft skill seperti komunikasi, kerja sama tim, kepemimpinan, dan manajemen waktu. Semua ini didukung oleh semangat kemandirian, kejuangan, dan kewirausahaan dalam menghadapi tantangan kehidupan bermasyarakat. Menerapkan pemikiran logis, kritis, sistematis, dan inovatif penting untuk mengembangkan kemampuan berpikir terstruktur dalam menganalisis, menyelesaikan masalah, serta menghasilkan solusi atau inovasi sesuai bidang keahlian. Pengintegrasian nilai-nilai humaniora dalam pengembangan ilmu pengetahuan dan teknologi memastikan setiap keputusan ilmiah mempertimbangkan aspek etika, sosial, dan budaya. Penguasaan metode ilmiah, termasuk penerapan kaidah, tata cara, dan etika ilmiah dalam penelitian, sangat esensial untuk menghasilkan deskripsi ilmiah terstruktur dalam bentuk skripsi atau laporan tugas akhir. Publikasi hasil penelitian di laman perguruan tinggi menjadi langkah penting sebagai komitmen terhadap penyebaran ilmu pengetahuan yang bermanfaat bagi publik.'
        ]);
        $bk2 = \App\Models\Bk::create([
            'kode'=>'BK-2',
            'nama'=>'Teori dan Praktik Pendidikan Inovatif Berbasis Teknologi',
            'deskripsi'=>'Teori dan Praktik Pendidikan Inovatif Berbasis Teknologi meliputi penerapan konsep pendidikan, pemahaman peserta didik, dan pengelolaan program untuk menciptakan lingkungan belajar adaptif yang mengintegrasikan teknologi secara efektif.'
        ]);
        $bk3 = \App\Models\Bk::create([
            'kode'=>'BK-3',
            'nama'=>'Perancangan, Pelaksanaan, dan Evaluasi Pembelajaran Digital',
            'deskripsi'=>'Desain Pembelajaran Digital dan Interaktif memadukan elemen multimedia dan alat interaktif dengan strategi komunikasi serta evaluasi berbasis teknologi untuk menciptakan pembelajaran yang dinamis dan partisipatif.'
        ]);
        $bk4 = \App\Models\Bk::create([
            'kode'=>'BK-4',
            'nama'=>'Pengembangan Keterampilan Abad 21',
            'deskripsi'=>'Penerapan keterampilan berpikir kritis dan kreativitas dalam pembelajaran didukung oleh teknologi digital melalui analisis masalah, proyek kolaboratif, dan peningkatan komunikasi efektif secara lisan dan tulisan.'
        ]);
        $bk5 = \App\Models\Bk::create([
            'kode'=>'BK-5',
            'nama'=>'Keilmuan Matematika'
        ]);
        $bk6 = \App\Models\Bk::create([
            'kode'=>'BK-6',
            'nama'=>'Pembelajaran Matematika'
        ]);
        $bk7 = \App\Models\Bk::create([
            'kode'=>'BK-7',
            'nama'=>'Penguatan Kompetensi Lanjutan'
        ]);
        $bk8 = \App\Models\Bk::create([
            'kode'=>'BK-8',
            'nama'=>'Penelitian dan Publikasi'
        ]);
        $bk9 = \App\Models\Bk::create([
            'kode'=>'BK-9',
            'nama'=>'Pengembangan Jiwa Kewirausahaan'
        ]);

        // data capaian pembelajaran lulusan
        $cpl1 = \App\Models\Cpl::create([
            'kode'=>'CPL-1',
            'nama'=>'Menunjukkan sikap bertakwa kepada Tuhan Yang Maha Esa, menjunjung tinggi dan menginternalisasi nilai, norma dan etika akademik, menjadi warga negara yang baik, bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri serta unggul dalam aspek softskill, semangat kemandirian, kejuangan, dan kewirausahaan pada perannya di kehidupan bermasyarakat berbangsa dan bernegara.',
            'cakupan'=>'Universitas'
        ]);
        $cpl2 = \App\Models\Cpl::create([
            'kode'=>'CPL-2',
            'nama'=>'Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan atau implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya berdasarkan kaidah, tata cara dan etika ilmiah dalam rangka menghasilkan solusi, gagasan, desain atau kritik seni, menyusun deskripsi saintifik hasil kajiannya dalam bentuk skripsi atau laporan tugas akhir dan mengunggahnya dalam laman perguruan tinggi.',
            'cakupan'=>'Universitas'
        ]);
        $cpl3 = \App\Models\Cpl::create([
            'kode'=>'CPL-3',
            'nama'=>'Mampu mengambil keputusan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi dan data secara mandiri, bermutu, dan terukur.',
            'cakupan'=>'Universitas'
        ]);
        $cpl4 = \App\Models\Cpl::create([
            'kode'=>'CPL-4',
            'nama'=>'Memiliki pemahaman mendalam tentang teori dan praktik pendidikan yang inovatif serta berbasis teknologi, mampu merancang, melaksanakan, dan mengevaluasi pembelajaran yang mendukung pembelajaran digital dan interaktif, serta mengembangkan keterampilan berpikir kritis, kreativitas, kolaborasi, dan komunikasi sebagai bagian dari kompetensi abad 21. Selain itu, mampu menerapkan metode pembelajaran berbasis proyek dan pengalaman yang relevan dengan tantangan global, guna mempersiapkan peserta didik menghadapi dinamika dunia kerja dan masyarakat global yang terus berkembang.',
            'cakupan'=>'Fakultas'
        ]);
        $cpl5 = \App\Models\Cpl::create([
            'kode'=>'CPL-5',
            'nama'=>'Menguasai dan mengaplikasikan konsep teoritis dengan memanfaatkan IPTEKS tentang keilmuan matematika yang diperlukan dalam meningkatkan kemampuan intelektual untuk berpikir secara mandiri dan kritis yang berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, bernegara, dan kemajuan peradaban berdasarkan Pancasila',
            'cakupan'=>'Program Studi'
        ]);
        $cpl6 = \App\Models\Cpl::create([
            'kode'=>'CPL-6',
            'nama'=>'Menguasai dan mengaplikasikan konsep teoritis serta mampu mendesain pembelajaran matematika yang diperlukan untuk merencanakan, melaksanakan, dan mengevaluasi pembelajaran yang inovatif dengan menginternalisasi nilai, norma, dan etika akademik',
            'cakupan'=>'Program Studi'
        ]);
        $cpl7 = \App\Models\Cpl::create([
            'kode'=>'CPL-7',
            'nama'=>'Menguasai dan mengaplikasikan konsep teoritis untuk penguatan kompetensi lanjutan yang diperlukan untuk melanjutkan studi atau keahlian tambahan dalam peningkatan mutu kehidupan bermasyarakat',
            'cakupan'=>'Program Studi'
        ]);
        $cpl8 = \App\Models\Cpl::create([
            'kode'=>'CPL-8',
            'nama'=>'Menguasai, mengkaji, dan mengaplikasikan konsep teoritis serta mendesain penelitian dan publikasi yang diperlukan untuk menyelesaikan masalah baik dalam pembelajaran maupun kehidupan sehari-hari dalam menginternalisasi nilai, norma, dan etika akademik',
            'cakupan'=>'Program Studi'
        ]);
        $cpl9 = \App\Models\Cpl::create([
            'kode'=>'CPL-9',
            'nama'=>'Menguasai dan mengaplikasikan konsep teoritis tentang pengembangan jiwa kewirausahaan untuk menyelesaikan masalah baik dalam pembelajaran maupun kehidupan sehari-hari dengan bertanggungjawab dan menginternalisasi semangat kemandirian, kejuangan, serta kewirausahaan',
            'cakupan'=>'Program Studi'
        ]);

        // data CPL yang diturunkan dari profil lulusan
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl1->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil2->id,'cpl_id'=>$cpl1->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil3->id,'cpl_id'=>$cpl1->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl2->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil2->id,'cpl_id'=>$cpl2->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil3->id,'cpl_id'=>$cpl2->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl3->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil2->id,'cpl_id'=>$cpl3->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil3->id,'cpl_id'=>$cpl3->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl4->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil2->id,'cpl_id'=>$cpl4->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl5->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl6->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil1->id,'cpl_id'=>$cpl7->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil2->id,'cpl_id'=>$cpl8->id
        ]);
        \App\Models\JoinProfilCpl::create([
            'profil_id'=>$profil3->id,'cpl_id'=>$cpl9->id
        ]);

        // data bahan kajian yang diturunkan dari CPL
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl1->id,'bk_id'=>$bk1->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl2->id,'bk_id'=>$bk1->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl3->id,'bk_id'=>$bk1->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl4->id,'bk_id'=>$bk2->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl4->id,'bk_id'=>$bk3->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl4->id,'bk_id'=>$bk4->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl5->id,'bk_id'=>$bk5->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl6->id,'bk_id'=>$bk6->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl7->id,'bk_id'=>$bk7->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl8->id,'bk_id'=>$bk8->id
        ]);
        \App\Models\JoinCplBk::create([
            'cpl_id'=>$cpl9->id,'bk_id'=>$bk9->id
        ]);

        // data bk yang dititipkan pada mata kuliah dan diturunkan dari bahan kajian
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Agama','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Bahasa Indonesia','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Kewarganegaraan','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Pancasila','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Literasi Teknologi Informasi','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Kuliah Kerja Nyata (KKN)','sks'=>2,'sks_teori'=>0,'sks_praktik'=>0,'sks_lapangan'=>2,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Pendidikan Anti Korupsi','sks'=>1,'sks_teori'=>1,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk1->id,'nama'=>'Kewirausahaan','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk2->id,'nama'=>'Psikologi Pendidikan','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk2->id,'nama'=>'Micro Teaching','sks'=>2,'sks_teori'=>0,'sks_praktik'=>2,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk2->id,'nama'=>'Bahasa Inggris','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk3->id,'nama'=>'Manajeman Kelas Digital','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk3->id,'nama'=>'Evaluasi Pembelajaran Digital','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk3->id,'nama'=>'Pengembangan Bahan Ajar Berbasis Digital','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk3->id,'nama'=>'Model-model Pembelajaran Inovatif','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk3->id,'nama'=>'PLP','sks'=>4,'sks_teori'=>0,'sks_praktik'=>4,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk4->id,'nama'=>'Skripsi','sks'=>6,'sks_teori'=>0,'sks_praktik'=>0,'sks_lapangan'=>6,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Trigonometri','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Kalkulus Diferensial','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Dasar-Dasar Matematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Teori Bilangan','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Statistika Dasar','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Himpunan dan Logika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Aljabar Matriks','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Kalkulus Peubah Banyak','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Kalkulus Integral','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Geometri Transformasi','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Teori Grup','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Matematika Diskrit','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Geometri Analitik Bidang','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Teori Peluang','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Analisis Vektor','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Program Linier','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Aljabar Linier','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Metode Numerik','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk5->id,'nama'=>'Statistika Inferensial','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Metodologi Pembelajaran Matematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Filsafat dan Sejarah Matematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Telaah Kurikulum Matematika','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Aplikasi Komputer Matematika','sks'=>3,'sks_teori'=>1,'sks_praktik'=>2,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Kapita Selekta Matematika Pendidikan Dasar','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Kapita Selekta Matematika Sekolah Menengah','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Perencanaan Pembelajaran Matematika','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Multimedia Pembelajaran','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Web Based Learning','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk6->id,'nama'=>'Mobile Learning','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Matematika Kombinatorika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Persamaan Diferensial','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Teori Ring','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Pemodelan Matematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Analisis Kompleks','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk7->id,'nama'=>'Analisis Real','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Metodologi Penelitian Pendidikan Matematika','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Proses Berpikir Matematik','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Etnomatematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Metodologi Penelitian Kualitatif','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Kajian Jurnal Internasional','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Kajian Masalah Pendidikan Matematika','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Metodologi Penelitian Pengembangan','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk8->id,'nama'=>'Seminar Pendidikan Matematika','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Matematika Ekonomi','sks'=>3,'sks_teori'=>3,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Algoritma dan pemrograman','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Pengembangan dan Produksi Media Pembelajaran Matematika','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Kepramukaan','sks'=>2,'sks_teori'=>1,'sks_praktik'=>1,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Mata Kuliah Tambahan Wajib 1','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
        \App\Models\Mk::create([
            'bk_id'=>$bk9->id,'nama'=>'Mata Kuliah Tambahan Wajib 2','sks'=>2,'sks_teori'=>2,'sks_praktik'=>0,'sks_lapangan'=>0,
        ]);
    }
}
