-- HONAI 063 Supabase (PostgreSQL) Schema + Data Lengkap

-- DROP TABLES (urutan terbalik karena foreign key)
DROP TABLE IF EXISTS feedback CASCADE;
DROP TABLE IF EXISTS response CASCADE;
DROP TABLE IF EXISTS complaint CASCADE;
DROP TABLE IF EXISTS satker CASCADE;
DROP TABLE IF EXISTS society CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS level CASCADE;

-- CREATE TABLES
CREATE TABLE level (id BIGSERIAL PRIMARY KEY, name VARCHAR(255) NOT NULL, created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE users (id BIGSERIAL PRIMARY KEY, officer_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, photo VARCHAR(255), level_id BIGINT REFERENCES level(id) ON DELETE CASCADE, remember_token VARCHAR(100), created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE society (id BIGSERIAL PRIMARY KEY, nik VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255), photo VARCHAR(255), password VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, address TEXT NOT NULL, created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE satker (id BIGSERIAL PRIMARY KEY, kode_satker VARCHAR(255) NOT NULL UNIQUE, nama_satker VARCHAR(255) NOT NULL, nama_pelapor VARCHAR(255) NOT NULL, jabatan_pelapor VARCHAR(255), username VARCHAR(255) NOT NULL UNIQUE, email VARCHAR(255) NOT NULL UNIQUE, phone_number VARCHAR(255), password VARCHAR(255) NOT NULL, photo VARCHAR(255), created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE complaint (id BIGSERIAL PRIMARY KEY, date_complaint DATE NOT NULL, nik VARCHAR(255) NOT NULL, judul VARCHAR(255), kategori VARCHAR(255), contents_of_the_report TEXT NOT NULL, photo VARCHAR(255), status VARCHAR(20) NOT NULL DEFAULT '0' CHECK (status IN ('0','process','finished')), society_id BIGINT REFERENCES society(id) ON DELETE CASCADE, tipe_pengadu VARCHAR(50) NOT NULL DEFAULT 'masyarakat', satker_id BIGINT REFERENCES satker(id) ON DELETE CASCADE, created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE response (id BIGSERIAL PRIMARY KEY, complaint_id BIGINT REFERENCES complaint(id) ON DELETE CASCADE, response_date DATE, response TEXT, file_balasan VARCHAR(255), user_id BIGINT REFERENCES users(id) ON DELETE CASCADE, created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());
CREATE TABLE feedback (id BIGSERIAL PRIMARY KEY, nama VARCHAR(255) NOT NULL, email VARCHAR(255), jenis VARCHAR(20) NOT NULL CHECK (jenis IN ('masukan','kritik')), isi TEXT NOT NULL, status VARCHAR(20) NOT NULL DEFAULT 'belum_dibaca' CHECK (status IN ('belum_dibaca','sudah_dibaca')), created_at TIMESTAMPTZ DEFAULT NOW(), updated_at TIMESTAMPTZ DEFAULT NOW());

-- SEED DATA
INSERT INTO level (id,name,created_at,updated_at) VALUES (1,'Administrator','2026-07-18 05:20:50','2026-07-18 05:20:50'),(2,'Officer','2026-07-18 05:20:50','2026-07-18 05:20:50');
SELECT setval('level_id_seq',2);

INSERT INTO users (id,officer_name,email,username,password,phone_number,photo,level_id,created_at,updated_at) VALUES
(1,'Administrator','admin@gmail.com','Administrator','$2y$10$yGb/mySn916n7UGoFErFD.MNY1MEVk5GNqsasj8t88wON4U0ex1LS','088228740010','photo_admin.png',1,'2026-07-18 05:20:51','2026-07-18 06:59:26'),
(2,'officer','officer@gmail.com','officer','$2y$10$PFj4qn4nPd9JOZDkqn/7Kurnh5LTmws1D87Wa8yjc0HHE.aU0P1i2','088228740010','photo_officer.png',2,'2026-07-18 05:20:51','2026-07-18 08:09:01');
SELECT setval('users_id_seq',4);

INSERT INTO society (id,nik,name,username,email,photo,password,phone_number,address,created_at,updated_at) VALUES
(1,'1234567890','User Demo','user',NULL,'','$2y$10$yUGnIkTix66QQviQqtIC9e8dldJ.a5sl3RIAc8a3Pz0DRkVeBDLV6','08123456789','Jl. Contoh No. 1','2026-07-18 05:21:10','2026-07-18 05:21:10'),
(2,'405260211990007','jeskiel siahaan','kiel','jeskielsiahaan@gmail.com','photo_kiel.png','$2y$10$o.iEB9muajiRkumchz0DlufWgwu3COANuecNmNhXighiNsiJtAxPS','081247052935','Jl ahmad yani aspol','2026-07-18 06:12:12','2026-07-18 06:12:12'),
(3,'9171234567890001','Andi Pratama','andipratama','andi@example.com','default.png','$2y$10$6lopSXzHCzHBVMkhAxQ04.ZS6MckaeNa4H7enCKweipfIHubqoM9C','081234567801','Jl. Cendrawasih No. 1, Jayapura','2026-07-19 21:04:20','2026-07-19 21:04:20'),
(4,'9171234567890002','Sari Dewi','saridewi','sari@example.com','default.png','$2y$10$MS1o0bX7BbfIdKJCablaeO5RcO.IZbWfm6fSY/D1D2nB3P6TpMJzK','081234567802','Jl. Kotaraja No. 5, Jayapura','2026-07-19 21:04:20','2026-07-19 21:04:20'),
(5,'9171234567890003','Budi Santoso','budisantoso','budi@example.com','default.png','$2y$10$dibsK98S8eqYGzcItvFcuOQmnp.Th/2buEMUVtFrG5E9Yd7olrfz2','081234567803','Jl. Abepura No. 10, Jayapura','2026-07-19 21:04:20','2026-07-19 21:04:20');
SELECT setval('society_id_seq',5);

INSERT INTO satker (id,kode_satker,nama_satker,nama_pelapor,jabatan_pelapor,username,email,phone_number,password,photo,created_at,updated_at) VALUES
(1,'123456','Dinas Pendidikan Kota A','Budi Santoso','Bendahara','satker1','satker1@example.com','081234567891','$2y$10$b8GJ.gyLLEdK.Yty.movMez/0gVtkLFXmGO5tT.5yJ.fYPIxLVW1a',NULL,NULL,NULL),
(2,'234567','Dinas Kesehatan Kota B','Siti Rahayu','Kepala Bagian Keuangan','satker2','satker2@example.com','081234567892','$2y$10$Gqvuvcu7VZnTe9p9Em4ZV.F.1SFkljnywt0niTt3tkQcMPPWMCULm',NULL,NULL,NULL),
(3,'345678','Dinas Pekerjaan Umum','Ahmad Fauzi','Staf Keuangan','satker3','satker3@example.com','081234567893','$2y$10$JOnKwEi05icKUf/iuYtx2unDit6WsQdM6X/iZrj2woRhIcoRm3Z.S',NULL,NULL,NULL),
(4,'456789','Badan Perencanaan Daerah','Dewi Lestari','Bendahara Pengeluaran','satker4','satker4@example.com','081234567894','$2y$10$3e77f2BYwwZFrNFC3rLi9Oor7jhITTpZP6v18nUm5.NOuiVr5EHiW',NULL,NULL,NULL),
(5,'567890','Kantor Wilayah Kementerian','Rudi Hermawan','PPK','satker5','satker5@example.com','081234567895','$2y$10$HA20RqAzj0WQUGQbYBpt0OQ3aES88JYC.dEGAAytrY8zCH/SCWEjy',NULL,NULL,NULL),
(7,'01234567','Kementerian Agama','Marthen Medlama','Bendahara','marthen','marthen@gmail.com','08211232312','$2y$10$o39RWzzYfcYbeMWEy6cnxu3QGyT6tnDb76WolrbSF7Vakp8WoGgRK',NULL,'2026-07-18 08:20:39','2026-09-09 06:55:25');
SELECT setval('satker_id_seq',9);

INSERT INTO complaint (id,date_complaint,nik,judul,kategori,contents_of_the_report,photo,status,society_id,tipe_pengadu,satker_id,created_at,updated_at) VALUES
(1,'2026-07-18','1234567890','main judol','Judi Online (Judol)','ada pegawai main judi online dan judi bola menggunakan uang dinas','1784361540_SURAT-PERNYATAAN-UP.doc','finished',1,'masyarakat',NULL,'2026-07-18 05:59:00','2026-07-20 01:34:14'),
(2,'2026-07-18','1234567890','main judol','Judi Online (Judol)','ada pegawai main judi online dan judi bola menggunakan uang dinas','1784361633_SURAT-PERNYATAAN-UP.doc','0',1,'masyarakat',NULL,'2026-07-18 06:00:33','2026-07-18 06:00:33'),
(5,'2025-02-15','9171234567890001','Jalan Rusak di Depan Kantor','Pelayanan Publik','Antrian di loket pelayanan sangat panjang dan petugas melayani dengan lambat.',NULL,'process',3,'masyarakat',NULL,'2026-07-19 21:04:46','2026-07-19 21:04:46'),
(6,'2025-03-05','9171234567890002','Dugaan Pungli di Kantor','Pungli','Saya diminta membayar sejumlah uang untuk mempercepat proses administrasi.',NULL,'process',4,'masyarakat',NULL,'2026-07-19 21:04:46','2026-07-19 21:04:46'),
(7,'2025-04-20','9171234567890002','Fasilitas Toilet Tidak Layak','Pelayanan Publik','Toilet umum di gedung pelayanan dalam kondisi kotor dan tidak terawat.',NULL,'0',4,'masyarakat',NULL,'2026-07-19 21:04:46','2026-07-19 21:04:46'),
(8,'2025-05-11','9171234567890003','Informasi Tidak Transparan','Pelayanan Publik','Informasi mengenai prosedur pengajuan anggaran tidak tersedia secara jelas.',NULL,'0',5,'masyarakat',NULL,'2026-07-19 21:04:47','2026-07-19 21:04:47'),
(9,'2025-03-18','234567','Sistem Aplikasi Sering Error','Pelayanan Publik','Aplikasi SAKTI sering mengalami gangguan saat jam kerja.',NULL,'process',NULL,'satker',1,'2026-07-19 21:04:47','2026-07-19 21:04:47'),
(10,'2026-07-23','405260211990007','main judol','Judi Online (Judol)','tolong ada kasus pegawai memainkan judi online menggunakan uang dinas',NULL,'process',2,'masyarakat',NULL,'2026-07-22 21:30:01','2026-07-22 21:35:00'),
(11,'2026-07-23','405260211990007','Pelecehan Seksual','Asusila','tolong bantu ada sedang melakukan pelecehan seksual',NULL,'0',2,'masyarakat',NULL,'2026-07-22 21:30:55','2026-07-22 21:30:55'),
(12,'2026-07-23','405260211990007','Menyeludupan Uang','Korupsi','ada pegawai yang memindahkan uang dinas ke rekening keluarga',NULL,'process',2,'masyarakat',NULL,'2026-07-22 21:32:37','2026-07-22 21:36:23'),
(14,'2026-09-08','405260211990007','Pungutan Liar dalam Persetujuan LPJ Bulanan','Pungli','Petugas di seksi Vera KPPN berinisial DD meminta uang rokok agar BAR segera ditandatangani.',NULL,'0',2,'masyarakat',NULL,'2026-09-08 08:58:32','2026-09-08 08:58:32'),
(15,'2026-09-08','405260211990007','Penahanan Dokumen SKPP Pindah Pegawai','Pungli','Oknum petugas KPPN meminta biaya administrasi Rp250.000 dengan dalih jalur cepat.',NULL,'0',2,'masyarakat',NULL,'2026-09-08 08:59:14','2026-09-08 08:59:14'),
(16,'2026-09-08','405260211990007','Loket Kosong di Jam Layanan','Pelayanan Publik','Semua petugas loket Front Office sudah kosong padahal jam istirahat resmi baru pukul 11.30 WIT.',NULL,'0',2,'masyarakat',NULL,'2026-09-08 09:01:03','2026-09-08 09:01:03'),
(17,'2026-09-09','01234567','Petugas Tidak Ramah','Pelayanan Publik','Petugas berinisial RM melayani dengan nada tinggi dan membentak saat konsultasi retur SP2D.',NULL,'0',NULL,'satker',7,'2026-09-09 06:43:48','2026-09-09 06:43:48'),
(18,'2026-09-09','01234567','Penyalahgunaan Wewenang / Layanan lambat','Pelayanan Publik','Pejabat Seksi Pencairan Dana menunda persetujuan TUP hingga 4 hari kerja.',NULL,'0',NULL,'satker',7,'2026-09-09 06:51:39','2026-09-09 06:51:39'),
(19,'2026-09-09','01234567','Integritas & Pungli','Pungli','Oknum pegawai KPPN meminta partisipasi sukarela Rp500.000 untuk acara perpisahan pejabat.',NULL,'0',NULL,'satker',7,'2026-09-09 06:52:31','2026-09-09 06:52:31'),
(20,'2026-09-09','405260211990007','Helpdesk Tidak Responsif','Lainnya','Tiket aduan via WhatsApp Helpdesk KPPN hanya dibaca tanpa ada solusi teknis.',NULL,'0',2,'masyarakat',NULL,'2026-09-09 07:02:13','2026-09-09 07:02:13'),
(21,'2026-09-11','405260211990007','Pelecehan Seksual','Asusila','verbal',NULL,'process',2,'masyarakat',NULL,'2026-09-11 05:46:45','2026-09-11 05:48:32');
SELECT setval('complaint_id_seq',22);

INSERT INTO response (id,complaint_id,response_date,response,file_balasan,user_id,created_at,updated_at) VALUES
(1,2,NULL,NULL,NULL,NULL,'2026-07-18 06:00:33','2026-07-18 06:00:33'),
(4,5,NULL,NULL,NULL,NULL,'2026-07-19 21:04:46','2026-07-19 21:04:46'),
(5,6,'2026-07-20','baik saya proses pegawainya',NULL,1,'2026-07-19 21:04:46','2026-07-19 21:14:46'),
(6,7,NULL,NULL,NULL,NULL,'2026-07-19 21:04:47','2026-07-19 21:04:47'),
(7,8,NULL,NULL,NULL,NULL,'2026-07-19 21:04:47','2026-07-19 21:04:47'),
(8,9,NULL,NULL,NULL,NULL,'2026-07-19 21:04:47','2026-07-19 21:04:47'),
(9,1,'2026-07-20','penjarakan',NULL,2,'2026-07-20 01:34:14','2026-07-20 01:34:14'),
(10,10,'2026-07-23','baik kami akan proses',NULL,2,'2026-07-22 21:30:01','2026-07-22 21:35:00'),
(11,11,NULL,NULL,NULL,NULL,'2026-07-22 21:30:55','2026-07-22 21:30:55'),
(12,12,'2026-07-23','kami akan proses dan membuat pelaporan lebih lanjut',NULL,2,'2026-07-22 21:32:37','2026-07-22 21:36:23'),
(14,14,NULL,NULL,NULL,NULL,'2026-09-08 08:58:32','2026-09-08 08:58:32'),
(15,15,NULL,NULL,NULL,NULL,'2026-09-08 08:59:14','2026-09-08 08:59:14'),
(16,16,NULL,NULL,NULL,NULL,'2026-09-08 09:01:03','2026-09-08 09:01:03'),
(17,17,NULL,NULL,NULL,NULL,'2026-09-09 06:43:48','2026-09-09 06:43:48'),
(18,18,NULL,NULL,NULL,NULL,'2026-09-09 06:51:39','2026-09-09 06:51:39'),
(19,19,NULL,NULL,NULL,NULL,'2026-09-09 06:52:31','2026-09-09 06:52:31'),
(20,20,NULL,NULL,NULL,NULL,'2026-09-09 07:02:13','2026-09-09 07:02:13'),
(21,21,'2026-09-11','oke pak',NULL,2,'2026-09-11 05:46:45','2026-09-11 05:48:32');
SELECT setval('response_id_seq',22);

INSERT INTO feedback (id,nama,email,jenis,isi,status,created_at,updated_at) VALUES
(1,'jeskiel siahaan','jeskielsiahaan@gmail.com','masukan','tolong tambahkan ini','sudah_dibaca','2026-07-20 04:53:46','2026-07-20 04:53:54'),
(2,'Ahmad Burhan','ahmadbur@gmail.com','kritik','tolong di perbaiki lagi untuk pelayanannya saya merasa tidak senang','sudah_dibaca','2026-07-20 07:13:52','2026-07-20 07:17:02'),
(3,'jeskiel siahaan','jeskielsiahaan@gmail.com','masukan','Mohon verifikator KPPN menuliskan alasan penolakan SPM yang lebih spesifik.','sudah_dibaca','2026-09-09 07:04:55','2026-09-11 05:48:50'),
(4,'Kementerian Agama','KementerianAgama@gmail.com','masukan','Apakah KPPN bisa membuat notifikasi otomatis via WhatsApp ke Bendahara Satker saat ada retur SP2D?','sudah_dibaca','2026-09-09 07:06:07','2026-09-11 05:48:54'),
(5,'Kementerian Agama','KementerianAgama@gmail.com','masukan','Mohon KPPN memberikan email blast peringatan dini H-3 cut-off kepada Satker dengan IKPA di bawah standar.','belum_dibaca','2026-09-09 07:09:29','2026-09-09 07:09:29'),
(6,'jeskiel siahaan','jeskielsiahaan@gmail.com','masukan','tolong pelayanan berikan persediaan minum','belum_dibaca','2026-09-11 05:47:16','2026-09-11 05:47:16');
SELECT setval('feedback_id_seq',7);