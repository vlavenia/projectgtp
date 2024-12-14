<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('asals')->insert([
            ['asal_asset' => 'APBD'],
            ['asal_asset' => 'DAK'],
            ['asal_asset' => 'DANAIS'],
            ['asal_asset' => 'HADIAH'],
            ['asal_asset' => 'HIBAH'],

        ]);
    }
}
