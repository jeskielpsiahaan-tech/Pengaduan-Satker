<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Satker;

class SatkerSeeder extends Seeder
{
    public function run()
    {
        $satkers = [
            [
                'kode_satker'     => '123456',
                'nama_satker'     => 'Dinas Pendidikan Kota A',
                'nama_pelapor'    => 'Budi Santoso',
                'jabatan_pelapor' => 'Bendahara',
                'username'        => 'satker1',
                'email'           => 'satker1@example.com',
                'phone_number'    => '081234567891',
                'password'        => Hash::make('satker1234'),
            ],
            [
                'kode_satker'     => '234567',
                'nama_satker'     => 'Dinas Kesehatan Kota B',
                'nama_pelapor'    => 'Siti Rahayu',
                'jabatan_pelapor' => 'Kepala Bagian Keuangan',
                'username'        => 'satker2',
                'email'           => 'satker2@example.com',
                'phone_number'    => '081234567892',
                'password'        => Hash::make('satker1234'),
            ],
            [
                'kode_satker'     => '345678',
                'nama_satker'     => 'Dinas Pekerjaan Umum',
                'nama_pelapor'    => 'Ahmad Fauzi',
                'jabatan_pelapor' => 'Staf Keuangan',
                'username'        => 'satker3',
                'email'           => 'satker3@example.com',
                'phone_number'    => '081234567893',
                'password'        => Hash::make('satker1234'),
            ],
            [
                'kode_satker'     => '456789',
                'nama_satker'     => 'Badan Perencanaan Daerah',
                'nama_pelapor'    => 'Dewi Lestari',
                'jabatan_pelapor' => 'Bendahara Pengeluaran',
                'username'        => 'satker4',
                'email'           => 'satker4@example.com',
                'phone_number'    => '081234567894',
                'password'        => Hash::make('satker1234'),
            ],
            [
                'kode_satker'     => '567890',
                'nama_satker'     => 'Kantor Wilayah Kementerian',
                'nama_pelapor'    => 'Rudi Hermawan',
                'jabatan_pelapor' => 'PPK',
                'username'        => 'satker5',
                'email'           => 'satker5@example.com',
                'phone_number'    => '081234567895',
                'password'        => Hash::make('satker1234'),
            ],
        ];

        foreach ($satkers as $item) {
            Satker::firstOrCreate(['kode_satker' => $item['kode_satker']], $item);
        }
    }
}
