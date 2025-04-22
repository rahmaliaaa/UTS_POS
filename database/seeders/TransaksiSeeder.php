<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'pelanggan_id' => 1,
                'mobil_id' => 1,
                'tanggal' => '2025-04-22',
                'jumlah' => 1,
                'total_harga' => 200000000,
                'tipe_pembayaran' => 'Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pelanggan_id' => 2,
                'mobil_id' => 2,
                'tanggal' => '2025-04-22',
                'jumlah' => 2,
                'total_harga' => 700000000,
                'tipe_pembayaran' => 'Kredit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(), //carbon untuk membuat waktu 
            ]
        ]);
    }
}