<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Klasifikasi::create(
            [
                'nama_klasifikasi' => 'Intra Countable',
                'nama_klasifikasi' => 'Aktiva Lainnya',
                'nama_klasifikasi' => 'Pihak ke 3/Kemitraan',
                'nama_klasifikasi' => 'Extra Countable'
            ],
        );
    }
}
