<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Complaint;
use App\Models\Response;
use App\Models\Society;
use App\Models\Satker;

class ComplaintSeeder extends Seeder
{
    public function run()
    {
        // Ambil society & satker yang sudah ada
        $society1 = Society::where('nik', '9171234567890001')->first();
        $society2 = Society::where('nik', '9171234567890002')->first();
        $society3 = Society::where('nik', '9171234567890003')->first();
        $satker1  = Satker::where('kode_satker', '123456')->first();
        $satker2  = Satker::where('kode_satker', '234567')->first();

        $complaints = [
            // Non-Satker
            [
                'society_id'             => $society1?->id,
                'satker_id'              => null,
                'nik'                    => '9171234567890001',
                'tipe_pengadu'           => 'masyarakat',
                'judul'                  => 'Jalan Rusak di Depan Kantor',
                'kategori'               => 'Infrastruktur',
                'contents_of_the_report' => 'Jalan di depan kantor KPPN Jayapura sudah rusak parah dan membahayakan pengguna jalan. Mohon segera diperbaiki.',
                'status'                 => 'finished',
                'date_complaint'         => '2025-01-10',
                'kategori'               => 'Pelayanan Publik',
                'contents_of_the_report' => 'Antrian di loket pelayanan sangat panjang dan petugas melayani dengan lambat. Perlu penambahan loket atau petugas.',
                'status'                 => 'process',
                'date_complaint'         => '2025-02-15',
            ],
            [
                'society_id'             => $society2?->id,
                'satker_id'              => null,
                'nik'                    => '9171234567890002',
                'tipe_pengadu'           => 'masyarakat',
                'judul'                  => 'Dugaan Pungli di Kantor',
                'kategori'               => 'Pungli',
                'contents_of_the_report' => 'Saya diminta membayar sejumlah uang untuk mempercepat proses administrasi. Hal ini tidak sesuai dengan aturan yang berlaku.',
                'status'                 => 'process',
                'date_complaint'         => '2025-03-05',
            ],
            [
                'society_id'             => $society2?->id,
                'satker_id'              => null,
                'nik'                    => '9171234567890002',
                'tipe_pengadu'           => 'masyarakat',
                'judul'                  => 'Fasilitas Toilet Tidak Layak',
                'kategori'               => 'Pelayanan Publik',
                'contents_of_the_report' => 'Toilet umum di gedung pelayanan dalam kondisi kotor dan tidak terawat. Mohon perhatian dari pihak terkait.',
                'status'                 => '0',
                'date_complaint'         => '2025-04-20',
            ],
            [
                'society_id'             => $society3?->id,
                'satker_id'              => null,
                'nik'                    => '9171234567890003',
                'tipe_pengadu'           => 'masyarakat',
                'judul'                  => 'Informasi Tidak Transparan',
                'kategori'               => 'Pelayanan Publik',
                'contents_of_the_report' => 'Informasi mengenai prosedur pengajuan anggaran tidak tersedia secara jelas di website maupun di kantor.',
                'status'                 => '0',
                'date_complaint'         => '2025-05-11',
            ],
            // Satker
            [
                'society_id'             => null,
                'satker_id'              => $satker1?->id,
                'nik'                    => '123456',
                'tipe_pengadu'           => 'satker',
                'judul'                  => 'Keterlambatan Pencairan Dana',
                'kategori'               => 'Pelayanan Publik',
                'contents_of_the_report' => 'Dana operasional triwulan pertama belum cair hingga bulan ketiga. Hal ini menghambat kegiatan operasional satuan kerja kami.',
                'status'                 => 'finished',
                'date_complaint'         => '2025-01-25',
                'nik'                    => '234567',
                'tipe_pengadu'           => 'satker',
                'judul'                  => 'Sistem Aplikasi Sering Error',
                'kategori'               => 'Pelayanan Publik',
                'contents_of_the_report' => 'Aplikasi SAKTI sering mengalami gangguan saat jam kerja sehingga menghambat proses pelaporan keuangan.',
                'status'                 => 'process',
                'date_complaint'         => '2025-03-18',
            ],
        ];

        foreach ($complaints as $item) {
            $complaint = Complaint::create($item);

            // Buat response kosong untuk setiap pengaduan
            Response::firstOrCreate(['complaint_id' => $complaint->id]);
        }
    }
}
