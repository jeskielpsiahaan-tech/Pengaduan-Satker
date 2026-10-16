-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2026 pada 03.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_complaint` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `contents_of_the_report` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('0','process','finished') NOT NULL,
  `society_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe_pengadu` varchar(255) NOT NULL DEFAULT 'masyarakat',
  `satker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `complaint`
--

INSERT INTO `complaint` (`id`, `date_complaint`, `nik`, `judul`, `kategori`, `contents_of_the_report`, `photo`, `status`, `society_id`, `tipe_pengadu`, `satker_id`, `created_at`, `updated_at`) VALUES
(1, '2026-07-18', '1234567890', 'main judol', 'Judi Online (Judol)', 'ada pegawai main judi online dan judi bola menggunakan uang dinas', '1784361540_SURAT-PERNYATAAN-UP.doc', 'finished', 1, 'masyarakat', NULL, '2026-07-18 05:59:00', '2026-07-20 01:34:14'),
(2, '2026-07-18', '1234567890', 'main judol', 'Judi Online (Judol)', 'ada pegawai main judi online dan judi bola menggunakan uang dinas', '1784361633_SURAT-PERNYATAAN-UP.doc', '0', 1, 'masyarakat', NULL, '2026-07-18 06:00:33', '2026-07-18 06:00:33'),
(5, '2025-02-15', '9171234567890001', 'Jalan Rusak di Depan Kantor', 'Pelayanan Publik', 'Antrian di loket pelayanan sangat panjang dan petugas melayani dengan lambat. Perlu penambahan loket atau petugas.', NULL, 'process', 3, 'masyarakat', NULL, '2026-07-19 21:04:46', '2026-07-19 21:04:46'),
(6, '2025-03-05', '9171234567890002', 'Dugaan Pungli di Kantor', 'Pungli', 'Saya diminta membayar sejumlah uang untuk mempercepat proses administrasi. Hal ini tidak sesuai dengan aturan yang berlaku.', NULL, 'process', 4, 'masyarakat', NULL, '2026-07-19 21:04:46', '2026-07-19 21:04:46'),
(7, '2025-04-20', '9171234567890002', 'Fasilitas Toilet Tidak Layak', 'Pelayanan Publik', 'Toilet umum di gedung pelayanan dalam kondisi kotor dan tidak terawat. Mohon perhatian dari pihak terkait.', NULL, '0', 4, 'masyarakat', NULL, '2026-07-19 21:04:46', '2026-07-19 21:04:46'),
(8, '2025-05-11', '9171234567890003', 'Informasi Tidak Transparan', 'Pelayanan Publik', 'Informasi mengenai prosedur pengajuan anggaran tidak tersedia secara jelas di website maupun di kantor.', NULL, '0', 5, 'masyarakat', NULL, '2026-07-19 21:04:47', '2026-07-19 21:04:47'),
(9, '2025-03-18', '234567', 'Sistem Aplikasi Sering Error', 'Pelayanan Publik', 'Aplikasi SAKTI sering mengalami gangguan saat jam kerja sehingga menghambat proses pelaporan keuangan.', NULL, 'process', NULL, 'satker', 1, '2026-07-19 21:04:47', '2026-07-19 21:04:47'),
(10, '2026-07-23', '405260211990007', 'main judol', 'Judi Online (Judol)', 'tolong ada kasus pegawai memainkan judi online menggunakan uang dinas', NULL, 'process', 2, 'masyarakat', NULL, '2026-07-22 21:30:01', '2026-07-22 21:35:00'),
(11, '2026-07-23', '405260211990007', 'Pelecehan Seksual', 'Asusila', 'tolong bantu ada sedang melakukan pelecehan seksual', NULL, '0', 2, 'masyarakat', NULL, '2026-07-22 21:30:55', '2026-07-22 21:30:55'),
(12, '2026-07-23', '405260211990007', 'Menyeludupan Uang', 'Korupsi', 'ada pegawai yang memindahkan uang dinas ke rekening keluarga dan menggunakan uang hak pegawai lainnya', NULL, 'process', 2, 'masyarakat', NULL, '2026-07-22 21:32:37', '2026-07-22 21:36:23'),
(14, '2026-09-08', '405260211990007', 'Pungutan Liar dalam Persetujuan LPJ Bulanan', 'Pungli', 'Petugas di seksi Vera (Verifikasi dan Akuntansi) KPPN berinisial DD selalu mempersulit rekonsiliasi dan pengesahan LPJ Bendahara kami setiap awal bulan. Beliau secara terang-terangan meminta \'uang rokok\' agar berita acara rekonsiliasi (BAR) segera ditandatangani tanpa harus merevisi dokumen yang sebetulnya sudah sesuai dengan aplikasi SAKTI.', NULL, '0', 2, 'masyarakat', NULL, '2026-09-08 08:58:32', '2026-09-08 08:58:32'),
(15, '2026-09-08', '405260211990007', 'Penahanan Dokumen SKPP Pindah Pegawai', 'Pungli', 'Saya mengurus SKPP untuk pegawai kami yang mutasi antar-provinsi. Dokumen sudah diajukan sejak seminggu lalu namun statusnya tertahan. Saat ditanyakan, oknum petugas KPPN meminta biaya administrasi sebesar Rp250.000 dengan dalih bahwa ini adalah jalur cepat (prioritas), padahal layanan KPPN seharusnya Rp0.', NULL, '0', 2, 'masyarakat', NULL, '2026-09-08 08:59:14', '2026-09-08 08:59:14'),
(16, '2026-09-08', '405260211990007', 'Loket Kosong di Jam Layanan', 'Pelayanan Publik', 'Pada hari Jumat tanggal 4 September 2026 pukul 10.30 WIT, saya datang untuk mengambil surat keterangan. Namun, semua petugas loket Front Office sudah kosong dengan alasan persiapan ibadah dan istirahat makan siang, padahal jam istirahat resmi baru dimulai pukul 11.30 WIT. Tamu dibiarkan menumpuk di ruang tunggu.', NULL, '0', 2, 'masyarakat', NULL, '2026-09-08 09:01:03', '2026-09-08 09:01:03'),
(17, '2026-09-09', '01234567', 'Petugas Tidak Ramah', 'Pelayanan Publik', 'Saat saya berkonsultasi mengenai retur SP2D di meja Customer Service Officer (CSO) pada Selasa siang, petugas berinisial RM melayani dengan nada tinggi dan membentak. Beliau mengatakan saya tidak kompeten karena menanyakan hal dasar, padahal saya adalah Bendahara baru yang masih butuh bimbingan.', NULL, '0', NULL, 'satker', 7, '2026-09-09 06:43:48', '2026-09-09 06:43:48'),
(18, '2026-09-09', '01234567', 'Penyalahgunaan Wewenang / Layanan lambat', 'Pelayanan Publik', 'Kami mengajukan surat permohonan TUP untuk keperluan mendesak operasional penelitian lapangan dan pengabdian masyarakat di akhir bulan. Namun, pejabat di Seksi Pencairan Dana (PD) menunda persetujuan hingga 4 hari kerja. Alasannya, pagu UP kami dianggap masih cukup, padahal rincian rencana penggunaan dana (RPD) yang kami lampirkan sudah jelas melampaui sisa UP di rekening Bendahara. Akibatnya, kegiatan akademik di kampus kami terhambat.', NULL, '0', NULL, 'satker', 7, '2026-09-09 06:51:39', '2026-09-09 06:51:39'),
(19, '2026-09-09', '01234567', 'Integritas & Pungli', 'Pungli', 'Oknum pegawai KPPN di bagian Middle Office mengirimkan pesan WhatsApp kepada Bendahara Pengeluaran kami, meminta \'partisipasi sukarela\' sebesar Rp 500.000. Alasannya untuk membantu pendanaan acara perpisahan salah satu pejabat KPPN yang akan mutasi pindah tugas. Oknum tersebut menyiratkan jika tidak ikut menyumbang, pencairan SPM GUP (Ganti Uang Persediaan) bulan depan akan diperiksa lebih detail dan ketat.', NULL, '0', NULL, 'satker', 7, '2026-09-09 06:52:31', '2026-09-09 06:52:31'),
(20, '2026-09-09', '405260211990007', 'Helpdesk (Hai-CSO/WhatsApp) Tidak Responsif', 'Lainnya', 'Kami mengalami kendala error system saat melakukan upload ADK (Arsip Data Komputer) SPM ke aplikasi e-SPM/SAKTI. Kami sudah mengirimkan tiket aduan dan chat via WhatsApp resmi Helpdesk KPPN sejak dua hari lalu, namun hanya dibaca (centang biru) dan tidak ada solusi teknis yang diberikan.', NULL, '0', 2, 'masyarakat', NULL, '2026-09-09 07:02:13', '2026-09-09 07:02:13'),
(21, '2026-09-11', '405260211990007', 'Pelecehan Seksual', 'Asusila', 'verbal', NULL, 'process', 2, 'masyarakat', NULL, '2026-09-11 05:46:45', '2026-09-11 05:48:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jenis` enum('masukan','kritik') NOT NULL,
  `isi` text NOT NULL,
  `status` enum('belum_dibaca','sudah_dibaca') NOT NULL DEFAULT 'belum_dibaca',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `jenis`, `isi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jeskiel siahaan', 'jeskielsiahaan@gmail.com', 'masukan', 'tolong tambahkan ini', 'sudah_dibaca', '2026-07-20 04:53:46', '2026-07-20 04:53:54'),
(2, 'Ahmad Burhan', 'ahmadbur@gmail.com', 'kritik', 'tolong di perbaiki lagi untuk pelayanannya saya merasa tidak senang', 'sudah_dibaca', '2026-07-20 07:13:52', '2026-07-20 07:17:02'),
(3, 'jeskiel siahaan', 'jeskielsiahaan@gmail.com', 'masukan', 'Saran untuk Seksi Pencairan Dana (PD). Ketika SPM kami ditolak di sistem SAKTI, alasan penolakan yang ditulis oleh verifikator kadang terlalu singkat (misalnya hanya ditulis \'Perbaiki uraian\'). Mohon agar verifikator KPPN bisa menuliskan alasan yang lebih spesifik di kolom keterangan penolakan, agar kami tidak perlu bolak-balik menebak letak kesalahannya atau bertanya lagi ke helpdesk.', 'sudah_dibaca', '2026-09-09 07:04:55', '2026-09-11 05:48:50'),
(4, 'Kementerian Agama', 'KementerianAgama@gmail.com', 'masukan', 'saat ini, jika terjadi retur SP2D dari pihak bank penerima, Satker baru tahu setelah mengecek manual di OMSPAN atau ketika rekanan komplain belum menerima dana. Masukan dari kami, apakah KPPN bisa membuat inovasi sistem notifikasi otomatis (misal via WhatsApp atau Email) dari Seksi Bank KPPN langsung ke nomor HP Bendahara Satker begitu ada data retur yang masuk?', 'sudah_dibaca', '2026-09-09 07:06:07', '2026-09-11 05:48:54'),
(5, 'Kementerian Agama', 'KementerianAgama@gmail.com', 'masukan', 'Saran untuk Seksi Manajemen Satker dan Kepatuhan Internal (MSKI). Terkadang nilai IKPA kami anjlok di akhir bulan karena ada transaksi yang belum direkonsiliasi. Mohon agar KPPN bisa memberikan email blast peringatan dini (H-3 sebelum cut-off) kepada Satker-Satker yang nilai IKPA-nya masih di bawah standar, agar kami bisa segera melakukan perbaikan.', 'belum_dibaca', '2026-09-09 07:09:29', '2026-09-09 07:09:29'),
(6, 'jeskiel siahaan', 'jeskielsiahaan@gmail.com', 'masukan', 'tolong pelayanan berikan persediaan minum', 'belum_dibaca', '2026-09-11 05:47:16', '2026-09-11 05:47:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2026-07-18 05:20:50', '2026-07-18 05:20:50'),
(2, 'Officer', '2026-07-18 05:20:50', '2026-07-18 05:20:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2021_03_28_031232_create_level_table', 1),
(4, '2021_03_31_073053_create_users_table', 1),
(5, '2021_03_31_074755_create_society_table', 1),
(6, '2021_03_31_074925_create_complaint_table', 1),
(7, '2021_03_31_160001_create_response_table', 1),
(8, '2026_07_17_170716_create_satker_table', 1),
(10, '2026_07_17_170718_update_complaint_table_add_fields', 1),
(11, '2026_07_17_200000_add_kategori_judul_to_complaint_table', 1),
(12, '2026_07_18_000001_add_email_to_society_table', 2),
(13, '2026_07_18_000002_make_response_fields_nullable', 3),
(14, '2026_07_18_000003_add_file_balasan_to_response_table', 4),
(15, '2026_07_18_000004_create_feedback_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `response`
--

CREATE TABLE `response` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED DEFAULT NULL,
  `response_date` date DEFAULT NULL,
  `response` text DEFAULT NULL,
  `file_balasan` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `response`
--

INSERT INTO `response` (`id`, `complaint_id`, `response_date`, `response`, `file_balasan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, NULL, '2026-07-18 06:00:33', '2026-07-18 06:00:33'),
(4, 5, NULL, NULL, NULL, NULL, '2026-07-19 21:04:46', '2026-07-19 21:04:46'),
(5, 6, '2026-07-20', 'baik saya proses pegawainya', NULL, 1, '2026-07-19 21:04:46', '2026-07-19 21:14:46'),
(6, 7, NULL, NULL, NULL, NULL, '2026-07-19 21:04:47', '2026-07-19 21:04:47'),
(7, 8, NULL, NULL, NULL, NULL, '2026-07-19 21:04:47', '2026-07-19 21:04:47'),
(8, 9, NULL, NULL, NULL, NULL, '2026-07-19 21:04:47', '2026-07-19 21:04:47'),
(9, 1, '2026-07-20', 'penjarakan', NULL, 2, '2026-07-20 01:34:14', '2026-07-20 01:34:14'),
(10, 10, '2026-07-23', 'baik kami akan proses', NULL, 2, '2026-07-22 21:30:01', '2026-07-22 21:35:00'),
(11, 11, NULL, NULL, NULL, NULL, '2026-07-22 21:30:55', '2026-07-22 21:30:55'),
(12, 12, '2026-07-23', 'kami akan proses dan membuat pelaporan lebih lanjut', NULL, 2, '2026-07-22 21:32:37', '2026-07-22 21:36:23'),
(14, 14, NULL, NULL, NULL, NULL, '2026-09-08 08:58:32', '2026-09-08 08:58:32'),
(15, 15, NULL, NULL, NULL, NULL, '2026-09-08 08:59:14', '2026-09-08 08:59:14'),
(16, 16, NULL, NULL, NULL, NULL, '2026-09-08 09:01:03', '2026-09-08 09:01:03'),
(17, 17, NULL, NULL, NULL, NULL, '2026-09-09 06:43:48', '2026-09-09 06:43:48'),
(18, 18, NULL, NULL, NULL, NULL, '2026-09-09 06:51:39', '2026-09-09 06:51:39'),
(19, 19, NULL, NULL, NULL, NULL, '2026-09-09 06:52:31', '2026-09-09 06:52:31'),
(20, 20, NULL, NULL, NULL, NULL, '2026-09-09 07:02:13', '2026-09-09 07:02:13'),
(21, 21, '2026-09-11', 'oke pak', NULL, 2, '2026-09-11 05:46:45', '2026-09-11 05:48:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satker`
--

CREATE TABLE `satker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_satker` varchar(255) NOT NULL,
  `nama_satker` varchar(255) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `jabatan_pelapor` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satker`
--

INSERT INTO `satker` (`id`, `kode_satker`, `nama_satker`, `nama_pelapor`, `jabatan_pelapor`, `username`, `email`, `phone_number`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Dinas Pendidikan Kota A', 'Budi Santoso', 'Bendahara', 'satker1', 'satker1@example.com', '081234567891', '$2y$10$b8GJ.gyLLEdK.Yty.movMez/0gVtkLFXmGO5tT.5yJ.fYPIxLVW1a', NULL, NULL, NULL),
(2, '234567', 'Dinas Kesehatan Kota B', 'Siti Rahayu', 'Kepala Bagian Keuangan', 'satker2', 'satker2@example.com', '081234567892', '$2y$10$Gqvuvcu7VZnTe9p9Em4ZV.F.1SFkljnywt0niTt3tkQcMPPWMCULm', NULL, NULL, NULL),
(3, '345678', 'Dinas Pekerjaan Umum', 'Ahmad Fauzi', 'Staf Keuangan', 'satker3', 'satker3@example.com', '081234567893', '$2y$10$JOnKwEi05icKUf/iuYtx2unDit6WsQdM6X/iZrj2woRhIcoRm3Z.S', NULL, NULL, NULL),
(4, '456789', 'Badan Perencanaan Daerah', 'Dewi Lestari', 'Bendahara Pengeluaran', 'satker4', 'satker4@example.com', '081234567894', '$2y$10$3e77f2BYwwZFrNFC3rLi9Oor7jhITTpZP6v18nUm5.NOuiVr5EHiW', NULL, NULL, NULL),
(5, '567890', 'Kantor Wilayah Kementerian', 'Rudi Hermawan', 'PPK', 'satker5', 'satker5@example.com', '081234567895', '$2y$10$HA20RqAzj0WQUGQbYBpt0OQ3aES88JYC.dEGAAytrY8zCH/SCWEjy', NULL, NULL, NULL),
(7, '01234567', 'Kementerian Agama', 'Marthen Medlama', 'Bendahara', 'marthen', 'marthen@gmail.com', '08211232312', '$2y$10$o39RWzzYfcYbeMWEy6cnxu3QGyT6tnDb76WolrbSF7Vakp8WoGgRK', NULL, '2026-07-18 08:20:39', '2026-09-09 06:55:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `society`
--

CREATE TABLE `society` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `society`
--

INSERT INTO `society` (`id`, `nik`, `name`, `username`, `email`, `photo`, `password`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'User Demo', 'user', NULL, '', '$2y$10$yUGnIkTix66QQviQqtIC9e8dldJ.a5sl3RIAc8a3Pz0DRkVeBDLV6', '08123456789', 'Jl. Contoh No. 1', '2026-07-18 05:21:10', '2026-07-18 05:21:10'),
(2, '405260211990007', 'jeskiel siahaan', 'kiel', 'jeskielsiahaan@gmail.com', '1784362332_Cuplikan layar 2025-05-22 143023.png', '$2y$10$o.iEB9muajiRkumchz0DlufWgwu3COANuecNmNhXighiNsiJtAxPS', '081247052935', 'Jl ahmad yani aspol', '2026-07-18 06:12:12', '2026-07-18 06:12:12'),
(3, '9171234567890001', 'Andi Pratama', 'andipratama', 'andi@example.com', 'default.png', '$2y$10$6lopSXzHCzHBVMkhAxQ04.ZS6MckaeNa4H7enCKweipfIHubqoM9C', '081234567801', 'Jl. Cendrawasih No. 1, Jayapura', '2026-07-19 21:04:20', '2026-07-19 21:04:20'),
(4, '9171234567890002', 'Sari Dewi', 'saridewi', 'sari@example.com', 'default.png', '$2y$10$MS1o0bX7BbfIdKJCablaeO5RcO.IZbWfm6fSY/D1D2nB3P6TpMJzK', '081234567802', 'Jl. Kotaraja No. 5, Jayapura', '2026-07-19 21:04:20', '2026-07-19 21:04:20'),
(5, '9171234567890003', 'Budi Santoso', 'budisantoso', 'budi@example.com', 'default.png', '$2y$10$dibsK98S8eqYGzcItvFcuOQmnp.Th/2buEMUVtFrG5E9Yd7olrfz2', '081234567803', 'Jl. Abepura No. 10, Jayapura', '2026-07-19 21:04:20', '2026-07-19 21:04:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `officer_name`, `email`, `username`, `password`, `phone_number`, `photo`, `level_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'Administrator', '$2y$10$yGb/mySn916n7UGoFErFD.MNY1MEVk5GNqsasj8t88wON4U0ex1LS', '088228740010', '1784365166_Cuplikan layar 2025-05-22 143023.png', 1, NULL, '2026-07-18 05:20:51', '2026-07-18 06:59:26'),
(2, 'officer', 'officer@gmail.com', 'officer', '$2y$10$PFj4qn4nPd9JOZDkqn/7Kurnh5LTmws1D87Wa8yjc0HHE.aU0P1i2', '088228740010', '1784369341_Cuplikan layar 2025-07-23 091402.png', 2, NULL, '2026-07-18 05:20:51', '2026-07-18 08:09:01'),
(3, 'Administrator', 'admin@gmail.com', 'Administrator', '$2y$10$JS3u56kuCzFNLy5Z0iLDDOgGCJZFjPpuPlQUWqOFNWbuRZYPM6dna', '088228740010', '12', 1, NULL, '2026-07-19 21:03:56', '2026-07-19 21:03:56'),
(4, 'officer', 'officer@gmail.com', 'Officer', '$2y$10$yKoao11RD0N4PPx.hzQ3UuUEVDS51xg9dFe2OLG.M6Gngs15C7wj.', '088228740010', '21', 2, NULL, '2026-07-19 21:03:56', '2026-07-19 21:03:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_society_id_foreign` (`society_id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`),
  ADD KEY `response_complaint_id_foreign` (`complaint_id`),
  ADD KEY `response_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `satker_kode_satker_unique` (`kode_satker`),
  ADD UNIQUE KEY `satker_username_unique` (`username`),
  ADD UNIQUE KEY `satker_email_unique` (`email`);

--
-- Indeks untuk tabel `society`
--
ALTER TABLE `society`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `response`
--
ALTER TABLE `response`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `satker`
--
ALTER TABLE `satker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `society`
--
ALTER TABLE `society`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_society_id_foreign` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `response_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
