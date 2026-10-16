<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Society;

class SocietySeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'nik'          => '9171234567890001',
                'name'         => 'Andi Pratama',
                'username'     => 'andipratama',
                'email'        => 'andi@example.com',
                'phone_number' => '081234567801',
                'address'      => 'Jl. Cendrawasih No. 1, Jayapura',
                'photo'        => 'default.png',
                'password'     => Hash::make('user1234'),
            ],
            [
                'nik'          => '9171234567890002',
                'name'         => 'Sari Dewi',
                'username'     => 'saridewi',
                'email'        => 'sari@example.com',
                'phone_number' => '081234567802',
                'address'      => 'Jl. Kotaraja No. 5, Jayapura',
                'photo'        => 'default.png',
                'password'     => Hash::make('user1234'),
            ],
            [
                'nik'          => '9171234567890003',
                'name'         => 'Budi Santoso',
                'username'     => 'budisantoso',
                'email'        => 'budi@example.com',
                'phone_number' => '081234567803',
                'address'      => 'Jl. Abepura No. 10, Jayapura',
                'photo'        => 'default.png',
                'password'     => Hash::make('user1234'),
            ],
        ];

        foreach ($users as $user) {
            Society::firstOrCreate(['nik' => $user['nik']], $user);
        }
    }
}
