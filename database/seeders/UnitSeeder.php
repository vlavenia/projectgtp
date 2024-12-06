<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            ['nama_unit' => 'Grhatama Pustaka (GTP)'],
            ['nama_unit' => 'Jogja Library Center (JLC)'],
            ['nama_unit' => 'Rumah Belajar Modern (RBM)'],
        ]);
    }
}
