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
            ['nama_jenis' => 'Tanah'],
            ['nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_jenis' => 'Gedung dan Bangunan'],
            ['nama_jenis' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_jenis' => 'Aset Lainnya'],
            ['nama_jenis' => 'Aset Tidak Berwujud'],
            ['nama_jenis' => 'Konstruksi Dalam Pengerjaan'],
            ['nama_jenis' => 'Kemitraan Dengan Pihak Ketiga'],
            ['nama_jenis' => 'Aset Lain-Lain'],
            ['nama_jenis' => 'Bukan Aset Pemda'],
        ]);
    }
}
