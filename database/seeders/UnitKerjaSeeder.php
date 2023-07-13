<?php

namespace Database\Seeders;

use App\Models\Master\UnitKerja;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            ['id_unit_kerja' => 21, 'nama' => 'Dana Pensiun Bank DKI', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 219, 'nama' => 'Dewan Pengawas Syariah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 17, 'nama' => 'Direksi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 364, 'nama' => 'Grup Administrasi Kredit & Pembiayaan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 236, 'nama' => 'Grup Akuntansi & Keuangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 634, 'nama' => 'Grup Audit Internal', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 635, 'nama' => 'Grup Bisnis Digital', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 332, 'nama' => 'Grup Hubungan Kelembagaan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 232, 'nama' => 'Grup Hukum', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 640, 'nama' => 'Grup Kebijakan & Prosedur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 233, 'nama' => 'Grup Kepatuhan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 639, 'nama' => 'Grup Kredit Komersial', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 351, 'nama' => 'Grup Kredit Konsumer', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 352, 'nama' => 'Grup Kredit Menengah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 638, 'nama' => 'Grup Kredit Mikro', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 637, 'nama' => 'Grup Kredit Ritel', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 99, 'nama' => 'Grup Manajemen Risiko', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 244, 'nama' => 'Grup Operasional', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 636, 'nama' => 'Grup Pengadaan & Pengelolaan Aset', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 243, 'nama' => 'Grup Pengembangan Jaringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 365, 'nama' => 'Grup Penjualan Dana & Transaksional', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 355, 'nama' => 'Grup Perencanaan Strategis & Kinerja', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 633, 'nama' => 'Grup Restrukturisasi Kredit dan Penyelesaian Kredit Bermasalah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 357, 'nama' => 'Grup Risiko Kredit', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 72, 'nama' => 'Grup Sumber Daya Manusia', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 66, 'nama' => 'Grup Syariah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 358, 'nama' => 'Grup Teknologi Informasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 69, 'nama' => 'Grup Tresuri', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 390, 'nama' => 'Kantor Cabang Bandung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 388, 'nama' => 'Kantor Cabang Gresik', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 378, 'nama' => 'Kantor Cabang Juanda', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 379, 'nama' => 'Kantor Cabang Kebayoran Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 380, 'nama' => 'Kantor Cabang Matraman', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 381, 'nama' => 'Kantor Cabang Otista', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 392, 'nama' => 'Kantor Cabang Pembantu Abdul Muis', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 393, 'nama' => 'Kantor Cabang Pembantu Alam Sutera', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 394, 'nama' => 'Kantor Cabang Pembantu Ambengan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 395, 'nama' => 'Kantor Cabang Pembantu Ancol', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 396, 'nama' => 'Kantor Cabang Pembantu Bekasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 397, 'nama' => 'Kantor Cabang Pembantu Bendungan Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 398, 'nama' => 'Kantor Cabang Pembantu Bintara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 399, 'nama' => 'Kantor Cabang Pembantu Bintaro', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 400, 'nama' => 'Kantor Cabang Pembantu Bintaro Jaya', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 401, 'nama' => 'Kantor Cabang Pembantu Bogor', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 480, 'nama' => 'Kantor Cabang Pembantu BPN Jakarta Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 402, 'nama' => 'Kantor Cabang Pembantu Bumi Serpong Damai (BSD)', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 403, 'nama' => 'Kantor Cabang Pembantu Cakung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 481, 'nama' => 'Kantor Cabang Pembantu Catatan Sipil', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 404, 'nama' => 'Kantor Cabang Pembantu Cempaka Mas', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 405, 'nama' => 'Kantor Cabang Pembantu Cibinong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 406, 'nama' => 'Kantor Cabang Pembantu Cibubur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 407, 'nama' => 'Kantor Cabang Pembantu Cikarang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 408, 'nama' => 'Kantor Cabang Pembantu Cikini', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 409, 'nama' => 'Kantor Cabang Pembantu Cilandak', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 410, 'nama' => 'Kantor Cabang Pembantu Cinere', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 411, 'nama' => 'Kantor Cabang Pembantu Cipulir', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 412, 'nama' => 'Kantor Cabang Pembantu Cirendeu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 483, 'nama' => 'Kantor Cabang Pembantu COne Plaza', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 413, 'nama' => 'Kantor Cabang Pembantu Daan Mogot', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 414, 'nama' => 'Kantor Cabang Pembantu Depok', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 415, 'nama' => 'Kantor Cabang Pembantu Dewi Sartika', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 484, 'nama' => 'Kantor Cabang Pembantu Dinas Koperasi UMKMP', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 485, 'nama' => 'Kantor Cabang Pembantu Dinas Lingkungan Hidup', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 486, 'nama' => 'Kantor Cabang Pembantu Dinas Penanggulangan Kebakaran dan Penyelamatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 416, 'nama' => 'Kantor Cabang Pembantu Dinas Pendidikan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 612, 'nama' => 'Kantor Cabang Pembantu Disorla', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 417, 'nama' => 'Kantor Cabang Pembantu Fatmawati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 418, 'nama' => 'Kantor Cabang Pembantu Glodok', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 487, 'nama' => 'Kantor Cabang Pembantu GMF Soekarno Hatta', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 419, 'nama' => 'Kantor Cabang Pembantu Green Pramuka', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 420, 'nama' => 'Kantor Cabang Pembantu Gunadarma', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 421, 'nama' => 'Kantor Cabang Pembantu Gunung Sahari', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 422, 'nama' => 'Kantor Cabang Pembantu Harapan Indah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 424, 'nama' => 'Kantor Cabang Pembantu Jatibaru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 425, 'nama' => 'Kantor Cabang Pembantu Jatiuwung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 426, 'nama' => 'Kantor Cabang Pembantu Jelambar Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 427, 'nama' => 'Kantor Cabang Pembantu Joglo', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 428, 'nama' => 'Kantor Cabang Pembantu Kalimalang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 455, 'nama' => 'Kantor Cabang Pembantu Senen', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 429, 'nama' => 'Kantor Cabang Pembantu Karawaci', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 430, 'nama' => 'Kantor Cabang Pembantu Kawasan Berikat Nusantara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 431, 'nama' => 'Kantor Cabang Pembantu Kebon Jeruk', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 488, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cakung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 489, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cempaka Putih', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 490, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cengkareng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 491, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cilandak', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 492, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cilincing', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 493, 'nama' => 'Kantor Cabang Pembantu Kecamatan Cipayung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 494, 'nama' => 'Kantor Cabang Pembantu Kecamatan Ciracas', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 495, 'nama' => 'Kantor Cabang Pembantu Kecamatan Duren Sawit', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 496, 'nama' => 'Kantor Cabang Pembantu Kecamatan Gambir', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 497, 'nama' => 'Kantor Cabang Pembantu Kecamatan Grogol Petamburan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 498, 'nama' => 'Kantor Cabang Pembantu Kecamatan Jagakarsa', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 499, 'nama' => 'Kantor Cabang Pembantu Kecamatan Jatinegara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 500, 'nama' => 'Kantor Cabang Pembantu Kecamatan Johar Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 501, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kalideres', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 502, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kebayoran Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 503, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kebayoran Lama', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 504, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kebon Jeruk', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 505, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kelapa Gading', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 506, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kemayoran', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 507, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kembangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 508, 'nama' => 'Kantor Cabang Pembantu Kecamatan Koja', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 509, 'nama' => 'Kantor Cabang Pembantu Kecamatan Kramat Jati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 510, 'nama' => 'Kantor Cabang Pembantu Kecamatan Makasar', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 511, 'nama' => 'Kantor Cabang Pembantu Kecamatan Mampang Prapatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 512, 'nama' => 'Kantor Cabang Pembantu Kecamatan Matraman', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 513, 'nama' => 'Kantor Cabang Pembantu Kecamatan Menteng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 514, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pademangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 515, 'nama' => 'Kantor Cabang Pembantu Kecamatan Palmerah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 516, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pancoran', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 517, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pasar Minggu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 518, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pasar Rebo', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 519, 'nama' => 'Kantor Cabang Pembantu Kecamatan Penjaringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 520, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pesanggrahan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 521, 'nama' => 'Kantor Cabang Pembantu Kecamatan Pulo Gadung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 522, 'nama' => 'Kantor Cabang Pembantu Kecamatan Sawah Besar', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 523, 'nama' => 'Kantor Cabang Pembantu Kecamatan Senen', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 524, 'nama' => 'Kantor Cabang Pembantu Kecamatan Setiabudi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 525, 'nama' => 'Kantor Cabang Pembantu Kecamatan Taman Sari', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 526, 'nama' => 'Kantor Cabang Pembantu Kecamatan Tambora', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 527, 'nama' => 'Kantor Cabang Pembantu Kecamatan Tanah Abang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 528, 'nama' => 'Kantor Cabang Pembantu Kecamatan Tanjung Priok', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 529, 'nama' => 'Kantor Cabang Pembantu Kecamatan Tebet', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 530, 'nama' => 'Kantor Cabang Pembantu Kedungdoro', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 432, 'nama' => 'Kantor Cabang Pembantu Kelapa Gading', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 433, 'nama' => 'Kantor Cabang Pembantu Kemang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 434, 'nama' => 'Kantor Cabang Pembantu Klender', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 531, 'nama' => 'Kantor Cabang Pembantu KS Tubun', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 435, 'nama' => 'Kantor Cabang Pembantu Mampang Prapatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 436, 'nama' => 'Kantor Cabang Pembantu Mangga Besar (Krekot)', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 437, 'nama' => 'Kantor Cabang Pembantu Mangga Dua', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 438, 'nama' => 'Kantor Cabang Pembantu Mayestik', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 532, 'nama' => 'Kantor Cabang Pembantu MT.Haryono', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 439, 'nama' => 'Kantor Cabang Pembantu Muara Angke', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 533, 'nama' => 'Kantor Cabang Pembantu Nyi Ageng Serang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 534, 'nama' => 'Kantor Cabang Pembantu PAM Jaya', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 440, 'nama' => 'Kantor Cabang Pembantu Pamulang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 441, 'nama' => 'Kantor Cabang Pembantu Pantai Indah Kapuk', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 535, 'nama' => 'Kantor Cabang Pembantu Pasar Asem Reges', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 537, 'nama' => 'Kantor Cabang Pembantu Pasar Baru Bekasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 538, 'nama' => 'Kantor Cabang Pembantu Pasar Baru Metro Atom', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 540, 'nama' => 'Kantor Cabang Pembantu Pasar Bukit Duri', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 559, 'nama' => 'Kantor Cabang Pembantu Pasar Bunga Rawa Belong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 542, 'nama' => 'Kantor Cabang Pembantu Pasar Cengkareng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 543, 'nama' => 'Kantor Cabang Pembantu Pasar Cibinong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 544, 'nama' => 'Kantor Cabang Pembantu Pasar Cibubur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 545, 'nama' => 'Kantor Cabang Pembantu Pasar Cijantung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 546, 'nama' => 'Kantor Cabang Pembantu Pasar Cikupa', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 547, 'nama' => 'Kantor Cabang Pembantu Pasar Cipete Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 548, 'nama' => 'Kantor Cabang Pembantu Pasar Ciplak', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 549, 'nama' => 'Kantor Cabang Pembantu Pasar Cipulir', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 550, 'nama' => 'Kantor Cabang Pembantu Pasar Ciracas', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 552, 'nama' => 'Kantor Cabang Pembantu Pasar Induk Beras Cipinang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 442, 'nama' => 'Kantor Cabang Pembantu Pasar Induk Kramat Jati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 553, 'nama' => 'Kantor Cabang Pembantu Pasar Jati Asih', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 554, 'nama' => 'Kantor Cabang Pembantu Pasar Jatinegara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 555, 'nama' => 'Kantor Cabang Pembantu Pasar Jembatan Lima', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 556, 'nama' => 'Kantor Cabang Pembantu Pasar Kalibaru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 557, 'nama' => 'Kantor Cabang Pembantu Pasar Kebayoran Lama', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 558, 'nama' => 'Kantor Cabang Pembantu Pasar Kedoya', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 560, 'nama' => 'Kantor Cabang Pembantu Pasar Klender SS', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 561, 'nama' => 'Kantor Cabang Pembantu Pasar Koja Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 562, 'nama' => 'Kantor Cabang Pembantu Pasar Kramat Jati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 443, 'nama' => 'Kantor Cabang Pembantu Pasar Minggu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 565, 'nama' => 'Kantor Cabang Pembantu Pasar Minggu 2', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 566, 'nama' => 'Kantor Cabang Pembantu Pasar Muara Karang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 567, 'nama' => 'Kantor Cabang Pembantu Pasar Pademangan Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 569, 'nama' => 'Kantor Cabang Pembantu Pasar Palmerah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 568, 'nama' => 'Kantor Cabang Pembantu Pasar Pal Meriam', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 570, 'nama' => 'Kantor Cabang Pembantu Pasar Perumnas Klender', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 571, 'nama' => 'Kantor Cabang Pembantu Pasar Pramuka', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 572, 'nama' => 'Kantor Cabang Pembantu Pasar Pulo Gadung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 573, 'nama' => 'Kantor Cabang Pembantu Pasar Rumput', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 574, 'nama' => 'Kantor Cabang Pembantu Pasar Santa', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 575, 'nama' => 'Kantor Cabang Pembantu Pasar Slipi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 576, 'nama' => 'Kantor Cabang Pembantu Pasar Sunan Giri', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 577, 'nama' => 'Kantor Cabang Pembantu Pasar Sunter Podomoro', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 578, 'nama' => 'Kantor Cabang Pembantu Pasar Tanah Abang Blok A', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 579, 'nama' => 'Kantor Cabang Pembantu Pasar Tanah Abang Blok B', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 580, 'nama' => 'Kantor Cabang Pembantu Pasar Tebet Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 581, 'nama' => 'Kantor Cabang Pembantu Pasar Teluk Gong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 582, 'nama' => 'Kantor Cabang Pembantu Pasar Tomang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 583, 'nama' => 'Kantor Cabang Pembantu Pasar UPB Kramat Jati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 584, 'nama' => 'Kantor Cabang Pembantu PIK Pulogadung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 585, 'nama' => 'Kantor Cabang Pembantu Plaza Baru Ciledug', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 444, 'nama' => 'Kantor Cabang Pembantu Pluit', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 445, 'nama' => 'Kantor Cabang Pembantu Pondok Gede', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 446, 'nama' => 'Kantor Cabang Pembantu Pondok Kelapa', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 447, 'nama' => 'Kantor Cabang Pembantu Pondok Labu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 448, 'nama' => 'Kantor Cabang Pembantu Pondok Pinang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 449, 'nama' => 'Kantor Cabang Pembantu Poris Daan Mogot', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 587, 'nama' => 'Kantor Cabang Pembantu PT Transportasi Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 588, 'nama' => 'Kantor Cabang Pembantu Pulau Pramuka', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 450, 'nama' => 'Kantor Cabang Pembantu Pulogadung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 589, 'nama' => 'Kantor Cabang Pembantu Pusdiklat PKP (Damkar)', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 451, 'nama' => 'Kantor Cabang Pembantu Rawa Belong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 452, 'nama' => 'Kantor Cabang Pembantu Rawamangun', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 641, 'nama' => 'Kantor Cabang Pembantu RSKD Duren Sawit', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 590, 'nama' => 'Kantor Cabang Pembantu RS Tugu Ibu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 591, 'nama' => 'Kantor Cabang Pembantu RSUD Cengkareng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 592, 'nama' => 'Kantor Cabang Pembantu RSUD Koja', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 593, 'nama' => 'Kantor Cabang Pembantu RSUD Pasar Minggu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 594, 'nama' => 'Kantor Cabang Pembantu RSUD Pasar Rebo', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 595, 'nama' => 'Kantor Cabang Pembantu RSUD Tarakan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 596, 'nama' => 'Kantor Cabang Pembantu Rusun Kapuk Muara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 597, 'nama' => 'Kantor Cabang Pembantu Rusun KS Tubun', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 598, 'nama' => 'Kantor Cabang Pembantu Rusun Marunda', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 599, 'nama' => 'Kantor Cabang Pembantu Rusun Muara Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 600, 'nama' => 'Kantor Cabang Pembantu Rusun Nagrak', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 601, 'nama' => 'Kantor Cabang Pembantu Rusun Penjaringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 602, 'nama' => 'Kantor Cabang Pembantu Rusun Pesakih Daan Mogot', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 603, 'nama' => 'Kantor Cabang Pembantu Rusun Pinus Elok', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 604, 'nama' => 'Kantor Cabang Pembantu Rusun Pulogebang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 606, 'nama' => 'Kantor Cabang Pembantu Rusun Rawabebek', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 605, 'nama' => 'Kantor Cabang Pembantu Rusun Rawa Buaya', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 607, 'nama' => 'Kantor Cabang Pembantu Rusun Rorotan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 608, 'nama' => 'Kantor Cabang Pembantu Rusun Tambora', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 609, 'nama' => 'Kantor Cabang Pembantu Rusun Tipar Cakung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 453, 'nama' => 'Kantor Cabang Pembantu Samsat Gunung Sahari', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 454, 'nama' => 'Kantor Cabang Pembantu Samsat Polda', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 610, 'nama' => 'Kantor Cabang Pembantu Samsat Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 611, 'nama' => 'Kantor Cabang Pembantu Sidoarjo', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 456, 'nama' => 'Kantor Cabang Pembantu Sudirman', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 457, 'nama' => 'Kantor Cabang Pembantu Sunter', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 613, 'nama' => 'Kantor Cabang Pembantu Suryo Pranoto', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 458, 'nama' => 'Kantor Cabang Pembantu Syariah Bekasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 459, 'nama' => 'Kantor Cabang Pembantu Syariah Bintaro', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 460, 'nama' => 'Kantor Cabang Pembantu Syariah Bogor', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 461, 'nama' => 'Kantor Cabang Pembantu Syariah Cengkareng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 462, 'nama' => 'Kantor Cabang Pembantu Syariah Cibubur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 463, 'nama' => 'Kantor Cabang Pembantu Syariah Ciledug', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 464, 'nama' => 'Kantor Cabang Pembantu Syariah Ciputat', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 465, 'nama' => 'Kantor Cabang Pembantu Syariah Fatmawati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 466, 'nama' => 'Kantor Cabang Pembantu Syariah Kelapa Gading', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 467, 'nama' => 'Kantor Cabang Pembantu Syariah Manggarai', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 468, 'nama' => 'Kantor Cabang Pembantu Syariah Margonda', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 469, 'nama' => 'Kantor Cabang Pembantu Syariah Matraman', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 642, 'nama' => 'Kantor Cabang Pembantu Syariah Pahlawan Revolusi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 471, 'nama' => 'Kantor Cabang Pembantu Syariah Serpong', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 472, 'nama' => 'Kantor Cabang Pembantu Tanah Abang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 473, 'nama' => 'Kantor Cabang Pembantu Tangerang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 474, 'nama' => 'Kantor Cabang Pembantu Tebet Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 614, 'nama' => 'Kantor Cabang Pembantu Terminal Terpadu Pulo Gebang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 615, 'nama' => 'Kantor Cabang Pembantu Thamrin City', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 475, 'nama' => 'Kantor Cabang Pembantu Tomang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 616, 'nama' => 'Kantor Cabang Pembantu Tropodo', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 617, 'nama' => 'Kantor Cabang Pembantu Univ. Gunadarma Cengkareng', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 618, 'nama' => 'Kantor Cabang Pembantu Univ. Gunadarma Kalimalang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 619, 'nama' => 'Kantor Cabang Pembantu Univ. Gunadarma Karawaci', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 620, 'nama' => 'Kantor Cabang Pembantu Univ. Gunadarma Salemba', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 621, 'nama' => 'Kantor Cabang Pembantu UPB Mayestik', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 622, 'nama' => 'Kantor Cabang Pembantu UPB Senen Blok III', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 623, 'nama' => 'Kantor Cabang Pembantu UPPRD Cipayung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 624, 'nama' => 'Kantor Cabang Pembantu UPPRD Ciracas', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 476, 'nama' => 'Kantor Cabang Pembantu Utan Kayu', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 477, 'nama' => 'Kantor Cabang Pembantu Walikota Jakarta Pusat', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 479, 'nama' => 'Kantor Cabang Pembantu Warung Jati', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 626, 'nama' => 'Kantor Cabang Pembantu YPI Bahrul Ulum', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 382, 'nama' => 'Kantor Cabang Permata Hijau', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 383, 'nama' => 'Kantor Cabang Pintu Besar Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 389, 'nama' => 'Kantor Cabang Slamet Riyadi', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 391, 'nama' => 'Kantor Cabang Syariah Bandung', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 646, 'nama' => 'Kantor Cabang Syariah Pondok Indah', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 384, 'nama' => 'Kantor Cabang Tanjung Priok', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 376, 'nama' => 'Kantor Cabang Utama Balaikota', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 377, 'nama' => 'Kantor Cabang Utama Syariah Wahid Hasyim', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 385, 'nama' => 'Kantor Cabang Walikota Jakarta Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 644, 'nama' => 'Kantor Cabang Walikota Jakarta Pusat', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 386, 'nama' => 'Kantor Cabang Walikota Jakarta Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 387, 'nama' => 'Kantor Cabang Walikota Jakarta Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 645, 'nama' => 'Kantor Cabang Walikota Jakarta Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 627, 'nama' => 'Kantor Kas Syariah Asshidiqiyah (Kedoya)', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 628, 'nama' => 'Kantor Kas Syariah Assidiqiyah Batu Ceper', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 629, 'nama' => 'Kantor Kas Syariah Cikarang', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 630, 'nama' => 'Kantor Kas Syariah Johar Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 647, 'nama' => 'Kantor Kas Syariah Kranggan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 632, 'nama' => 'Kantor Kas Syariah Pondok Karya Pembangunan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 22, 'nama' => 'Komisaris', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 251, 'nama' => 'PT. Darbeni Bangun Karya', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 359, 'nama' => 'Sekretaris Perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 643, 'nama' => 'Senior Executive Vice President (SEVP)', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 120, 'nama' => 'Staff Ahli', 'created_at' => now(), 'updated_at' => now()],
            ['id_unit_kerja' => 372, 'nama' => 'Tim Transformasi Bank DKI', 'created_at' => now(), 'updated_at' => now()],
        ];

        $chunks = array_chunk($collections, config('app.array_chunks_limit'));
        collect($chunks)->each(function ($data) {
            UnitKerja::insert($data);
        });
    }
}