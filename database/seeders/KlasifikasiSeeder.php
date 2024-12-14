<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('klasifikasis')->insert([
            ['nama_klasifikasi' => 'Intra Countable'],
            ['nama_klasifikasi' => 'Aktiva Lainnya'],
            ['nama_klasifikasi' => 'Pihak ke 3/Kemitraan'],
            ['nama_klasifikasi' => 'Extra Countable']
        ]);
    }
}
