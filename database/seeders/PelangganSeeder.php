<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'nama' => 'Andi',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Mawar No. 10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Budi',
                'no_telp' => '082233445566',
                'alamat' => 'Jl. Melati No. 22',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
