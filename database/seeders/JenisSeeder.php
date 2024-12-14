<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis')->insert([
            ['jenis_asset' => 'Tanah'],
            ['jenis_asset' => 'Peralatan dan Mesin'],
            ['jenis_asset' => 'Gedung dan Bangunan'],
            ['jenis_asset' => 'Jalan, Jaringan dan Irigasi'],
            ['jenis_asset' => 'Aset Tetap Lainnya'],
            ['jenis_asset' => 'Aset Lainnya'],
            ['jenis_asset' => 'Aset Tidak Berwujud'],
            ['jenis_asset' => 'Konstruksi Dalam Pengerjaan'],
            ['jenis_asset' => 'Kemitraan Dengan Pihak Ketiga'],
            ['jenis_asset' => 'Aset Lain-Lain'],
            ['jenis_asset' => 'Bukan Aset Pemda'],
        ]);
    }
}
