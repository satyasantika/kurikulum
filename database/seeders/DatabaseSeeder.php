<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // data Prodi
        DB::unprepared("
            INSERT INTO `prodis`(`pt`, `fakultas`, `kode_prodi`, `visi_misi`, `jenjang`, `gelar_lulusan`, `alamat`, `email`, `website`, `tahun_pendirian`, `sk_pendirian`, `tahun_terakhir_akreditasi`, `sk_terkahir_akreditasi`, `created_at`, `updated_at`) VALUES
            ('Universitas Siliwangi','Fakultas Keguruan dan Ilmu Pendidikan','84202','Mengembangkan Keilmuan Pendidikan dan pembelajaran Matematika Melalui Transformatif Learning dan Edupreneur Matematika untuk Menghasilkan Lulusan Unggul yang Berwawasan Kebangsaan dan Berkarakter Wirausaha','S1','Sarjana Pendidikan (S.Pd.)','Jl. Siliwangi no. 24 Kota Tasikmalaya','mat@unsil.ac.id','matematika.unsil.ac.id','2014','Perpres No. 24 Tahun 2014','2024', '1552/SK/LAMDIK/Ak/S/X/2024',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data user
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'username' => 'test',
            'prodi_id' => 1,
            'password' => bcrypt('test'),
            'email' => 'test@example.com',
        ]);
        // data kurikulum
        DB::unprepared("
            INSERT INTO kurikulums(nama, kode, prodi_id, created_at, updated_at) VALUES
            ('Kurikulum OBE 2025','mat-OBE-2025',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data profil lulusan
        DB::unprepared("
            INSERT INTO profils(nama, deskripsi, kurikulum_id, created_at, updated_at) VALUES
            ('Pendidik Matematika','Orang yang melakukan proses pengubahan sikap dan perilaku seseorang atau kelompok orang dalam usaha mendewasakan manusia melalui upaya pengajaran, bimbingan dan latihan di bidang matematika dengan menguasai materi matematika (Content Knowledge), pedagogik (Pedagogical Knowledge) dan teknologi (Technological Knowledge)',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('Peneliti','Orang yang menguasai konsep teoritis penelitian pendidikan matematika dan terampil dalam menyelesaikan masalah secara prosedural dalam kehidupan sehari-hari',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('Edupreneur','Orang yang memiliki jiwa kewirausahaan untuk memecahkan permasalahan dan mampu beradaptasi, baik dalam pembelajaran maupun dalam kehidupan sehari-hari',1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data indikator dari profil
        DB::unprepared("
            INSERT INTO `profil_indikators`(`profil_id`, `nama`, `created_at`, `updated_at`) VALUES
            ('1','Menguasai konsep teoritis tentang konsep-konsep dasar matematika',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('1','Menguasai dan mengaplikasikan strategi dan metode pembelajaran dasar yang efektif untuk menyampaikan materi matematika',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('1','Mampu memanfaatkan teknologi untuk mendukung proses dan evaluasi pembelajaran',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('1','Mampu mendesain pengelolaan kelas yang baik untuk terciptanya lingkungan belajar yang kondusif',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('2','Menguasai konsep pengumpulan, pengolahan, analisis, penyajian, dan interpretasi data yang dilakukan secara sistematis dan objektif',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('2','Memiliki keterampilan literasi informasi untuk mendukung topik penelitiannya',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('2','Mampu menyusun laporan penelitian dan artikel ilmiah yang mendukung penerapan teori-teori pendidikan matematika',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('3','Menguasai konsep teoritis tentang konsep-konsep dasar kewirausahaan untuk menghasilkan ide-ide kreatif dan inovatif dalam pembelajaran',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('3','Mampu merancang produk atau layanan pendidikan yang inovatif',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),('3','Mampu mengomunikasikan hasil rancangan produk atau layanan pendidikan secara sistematis untuk perbaikan pembelajaran',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data bahan kajian
        DB::unprepared("
            INSERT INTO `bks`(`kode`, `nama`, `dekripsi`, `created_at`, `updated_at`) VALUES
            ('BK-1','Sikap, nilai, pengetahuan, dan keterampilan kognitif','Menginternalisasi ajaran agama dalam setiap aspek kehidupan, baik dalam sikap, perilaku, maupun keputusan akademik, dengan menjadikan nilai-nilai spiritual sebagai landasan moral, serta menjunjung tinggi integritas akademik dan menghormati aturan serta norma yang berlaku. Sikap ini mencerminkan etika akademik yang baik dan tanggung jawab sebagai warga negara yang aktif berkontribusi bagi masyarakat. Tanggung jawab mandiri dan profesional dalam menjalankan profesi sesuai bidang keahlian menjadi keharusan, diiringi dengan penguasaan soft skill seperti komunikasi, kerja sama tim, kepemimpinan, dan manajemen waktu. Semua ini didukung oleh semangat kemandirian, kejuangan, dan kewirausahaan dalam menghadapi tantangan kehidupan bermasyarakat. Menerapkan pemikiran logis, kritis, sistematis, dan inovatif penting untuk mengembangkan kemampuan berpikir terstruktur dalam menganalisis, menyelesaikan masalah, serta menghasilkan solusi atau inovasi sesuai bidang keahlian. Pengintegrasian nilai-nilai humaniora dalam pengembangan ilmu pengetahuan dan teknologi memastikan setiap keputusan ilmiah mempertimbangkan aspek etika, sosial, dan budaya. Penguasaan metode ilmiah, termasuk penerapan kaidah, tata cara, dan etika ilmiah dalam penelitian, sangat esensial untuk menghasilkan deskripsi ilmiah terstruktur dalam bentuk skripsi atau laporan tugas akhir. Publikasi hasil penelitian di laman perguruan tinggi menjadi langkah penting sebagai komitmen terhadap penyebaran ilmu pengetahuan yang bermanfaat bagi publik.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-2','Teori dan Praktik Pendidikan Inovatif Berbasis Teknologi','Teori dan Praktik Pendidikan Inovatif Berbasis Teknologi meliputi penerapan konsep pendidikan, pemahaman peserta didik, dan pengelolaan program untuk menciptakan lingkungan belajar adaptif yang mengintegrasikan teknologi secara efektif.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-3','Perancangan, Pelaksanaan, dan Evaluasi Pembelajaran Digital','Desain Pembelajaran Digital dan Interaktif memadukan elemen multimedia dan alat interaktif dengan strategi komunikasi serta evaluasi berbasis teknologi untuk menciptakan pembelajaran yang dinamis dan partisipatif.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-4','Pengembangan Keterampilan Abad 21 (4C; Critical Thinking, Creativity, Collaboration, Communication)','Penerapan keterampilan berpikir kritis dan kreativitas dalam pembelajaran didukung oleh teknologi digital melalui analisis masalah, proyek kolaboratif, dan peningkatan komunikasi efektif secara lisan dan tulisan.',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-5','Keilmuan Matematika','',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-6','Pembelajaran Matematika','',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-7','Penguatan Kompetensi Lanjutan','',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-8','Penelitian dan Publikasi','',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('BK-9','Pengembangan Jiwa Kewirausahaan','',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data capaian pembelajaran lulusan
        DB::unprepared("
            INSERT INTO `cpls`(`kode`, `nama`, `cakupan`, `created_at`, `updated_at`) VALUES
            ('CPL-1','Menunjukkan sikap bertakwa kepada Tuhan Yang Maha Esa, menjunjung tinggi dan menginternalisasi nilai, norma dan etika akademik, menjadi warga negara yang baik, bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri serta unggul dalam aspek softskill, semangat kemandirian, kejuangan, dan kewirausahaan pada perannya di kehidupan bermasyarakat berbangsa dan bernegara.','Universitas',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-2','Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan atau implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya berdasarkan kaidah, tata cara dan etika ilmiah dalam rangka menghasilkan solusi, gagasan, desain atau kritik seni, menyusun deskripsi saintifik hasil kajiannya dalam bentuk skripsi atau laporan tugas akhir dan mengunggahnya dalam laman perguruan tinggi.','Universitas',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-3','Mampu mengambil keputusan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi dan data secara mandiri, bermutu, dan terukur.','Universitas',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-4','Memiliki pemahaman mendalam tentang teori dan praktik pendidikan yang inovatif serta berbasis teknologi, mampu merancang, melaksanakan, dan mengevaluasi pembelajaran yang mendukung pembelajaran digital dan interaktif, serta mengembangkan keterampilan berpikir kritis, kreativitas, kolaborasi, dan komunikasi sebagai bagian dari kompetensi abad 21. Selain itu, mampu menerapkan metode pembelajaran berbasis proyek dan pengalaman yang relevan dengan tantangan global, guna mempersiapkan peserta didik menghadapi dinamika dunia kerja dan masyarakat global yang terus berkembang.','Fakultas',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-5','Menguasai dan mengaplikasikan konsep teoritis dengan memanfaatkan IPTEKS tentang keilmuan matematika yang diperlukan dalam meningkatkan kemampuan intelektual untuk berpikir secara mandiri dan kritis yang berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, bernegara, dan kemajuan peradaban berdasarkan Pancasila','Program Studi',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-6','Menguasai dan mengaplikasikan konsep teoritis serta mampu mendesain pembelajaran matematika yang diperlukan untuk merencanakan, melaksanakan, dan mengevaluasi pembelajaran yang inovatif dengan menginternalisasi nilai, norma, dan etika akademik','Program Studi',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-7','Menguasai dan mengaplikasikan konsep teoritis untuk penguatan kompetensi lanjutan yang diperlukan untuk melanjutkan studi atau keahlian tambahan dalam peningkatan mutu kehidupan bermasyarakat','Program Studi',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-8','Menguasai, mengkaji, dan mengaplikasikan konsep teoritis serta mendesain penelitian dan publikasi yang diperlukan untuk menyelesaikan masalah baik dalam pembelajaran maupun kehidupan sehari-hari dalam menginternalisasi nilai, norma, dan etika akademik','Program Studi',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            ('CPL-9','Menguasai dan mengaplikasikan konsep teoritis tentang pengembangan jiwa kewirausahaan untuk menyelesaikan masalah baik dalam pembelajaran maupun kehidupan sehari-hari dengan bertanggungjawab dan menginternalisasi semangat kemandirian, kejuangan, serta kewirausahaan','Program Studi',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data CPL yang diturunkan dari profil lulusan
        DB::unprepared("
            INSERT INTO `profil_cpls`(`profil_id`, `cpl_id`, `created_at`, `updated_at`) VALUES
            (1,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(2,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(3,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(2,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(3,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(2,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(3,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(2,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,5,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,6,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,7,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (2,8,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,9,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data bahan kajian yang diturunkan dari CPL
        DB::unprepared("
            INSERT INTO `cpl_bks`(`cpl_id`, `bk_id`, `created_at`, `updated_at`) VALUES
            (1,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (2,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,1,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (4,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(4,3,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),(4,4,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,5,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,6,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,7,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,8,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,9,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");
        // data cpmk yang dititipkan pada mata kuliah dan diturunkan dari bahan kajian
        DB::unprepared("
            INSERT INTO `cpmks`(`bk_id`, `mk`, `sks`, `sks_teori`, `sks_praktik`, `sks_lapangan`, `created_at`, `updated_at`) VALUES
            (1,'Agama',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Bahasa Indonesia',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Kewarganegaraan',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Pancasila',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Literasi Teknologi Informasi',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Kuliah Kerja Nyata (KKN)',2,0,0,2,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Pendidikan Anti Korupsi',1,1,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (1,'Kewirausahaan',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (2,'Psikologi Pendidikan',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (2,'Micro Teaching',2,0,2,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (2,'Bahasa Inggris',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,'Manajeman Kelas Digital',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,'Asesmen dan Evaluasi Pembelajaran Digital',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,'Pengembangan Bahan Ajar Berbasis Digital',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,'Model-model Pembelajaran Inovatif',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (3,'PLP',4,0,4,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (4,'Skripsi',6,0,0,6,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Trigonometri',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Kalkulus Diferensial',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Dasar-Dasar Matematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Teori Bilangan',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Statistika Dasar',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Himpunan dan Logika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Aljabar Matriks',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Kalkulus Peubah Banyak',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Kalkulus Integral',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Geometri Transformasi',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Teori Grup',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Matematika Diskrit',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Geometri Analitik Bidang',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Teori Peluang',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Analisis Vektor',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Program Linier',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Aljabar Linier',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Metode Numerik',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (5,'Statistika Inferensial',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Metodologi Pembelajaran Matematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Filsafat dan Sejarah Matematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Telaah Kurikulum Matematika',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Aplikasi Komputer Matematika',3,1,2,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Kapita Selekta Matematika Pendidikan Dasar',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Kapita Selekta Matematika Sekolah Menengah',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Perencanaan Pembelajaran Matematika',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Multimedia Pembelajaran',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Web Based Learning',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (6,'Mobile Learning',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Matematika Kombinatorika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Persamaan Diferensial',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Teori Ring',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Pemodelan Matematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Analisis Kompleks',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (7,'Analisis Real',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Metodologi Penelitian Pendidikan Matematika',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Proses Berpikir Matematik',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Etnomatematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Metodologi Penelitian Kualitatif',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Kajian Jurnal Internasional',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Kajian Masalah Pendidikan Matematika',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Metodologi Penelitian Pengembangan',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (8,'Seminar Pendidikan Matematika',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Matematika Ekonomi',3,3,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Algoritma dan pemrograman',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Pengembangan dan Produksi Media Pembelajaran Matematika',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Kepramukaan',2,1,1,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Mata Kuliah Tambahan Wajib 1',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP),
            (9,'Mata Kuliah Tambahan Wajib 2',2,2,0,0,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
        ");



    }
}
