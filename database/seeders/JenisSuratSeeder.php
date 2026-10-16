<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    public function run()
    {
        $jenis = [
            ['nama' => 'Dana Transfer'],
            ['nama' => 'Gaji'],
            ['nama' => 'SP2D'],
            ['nama' => 'SPM'],
            ['nama' => 'DIPA'],
            ['nama' => 'Rekonsiliasi'],
            ['nama' => 'Laporan Keuangan'],
            ['nama' => 'Pengembalian Belanja'],
            ['nama' => 'Pinjaman/Hibah'],
            ['nama' => 'Lainnya'],
        ];
        DB::table('jenis_surat')->insert($jenis);
    }
}
