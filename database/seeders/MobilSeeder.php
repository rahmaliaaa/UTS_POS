<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mobil')->insert([
            [
                'merk' => 'Toyota',
                'model' => 'Avanza',
                'tipe' => 'MPV',
                'tahun' => 2020,
                'harga' => 200000000,
                'stok' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'merk' => 'Honda',
                'model' => 'Civic',
                'tipe' => 'Sedan',
                'tahun' => 2021,
                'harga' => 350000000,
                'stok' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}