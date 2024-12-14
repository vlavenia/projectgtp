<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['status_asset' => 'Asset Terkini'],
            ['status_asset' => 'Asset Mutasi Masuk'],
            ['status_asset' => 'Asset Mutasi Keluar'],
            ['status_asset' => 'Asset Perolehan'],
            ['status_asset' => 'Asset Penghapusan'],
            ['status_asset' => 'Asset Rusak'],
            
        ]);
    }
}
