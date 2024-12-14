<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Models\objek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class objekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataObjek = [
            ['nama_objek' => 'Tanah', 'jenis_asset' => 'Tanah'],
            ['nama_objek' => 'Alat Besar', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Angkutan', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Bengkel & Ukur', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Pertanian', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Kantor dan Rumah Tangga', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Studio, Komunikai & Pemancar', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Kedokteran & Kesehatan', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Laboratorium', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Komputer', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Rambu-Rambu', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Eksplorasi', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Pengeboran', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Peraga', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Olahraga', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Permainan', 'jenis_asset' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Bangunan Gedung', 'jenis_asset' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Monumen', 'jenis_asset' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Bangunan Menara', 'jenis_asset' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Tugu', 'jenis_asset' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Jalan dan Jembatan', 'jenis_asset' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Bangunan Air', 'jenis_asset' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Instalansi', 'jenis_asset' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Jaringan', 'jenis_asset' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Bahan Perpustakaan', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Barang Bercorak Kesenian/Kebudayaan/Olahraga', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Hewan', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Tanaman', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Barang Koleksi Non Budaya', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Aset Tetap Dalam Renovasi', 'jenis_asset' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Konstruksi Dalam Pengerjaan', 'jenis_asset' => 'Konstruksi Dalam Pengerjaan'],
            ['nama_objek' => 'Aset Lainnya', 'jenis_asset' => 'Aset Lainnya'],
            ['nama_objek' => 'Kemitraan Dengan Pihak Ketiga', 'jenis_asset' => 'Kemitraan Dengan Pihak Ketiga'],
            ['nama_objek' => 'Aset Tidak Berwujud', 'jenis_asset' => 'Aset Tidak Berwujud'],
            ['nama_objek' => 'Aset Lain-Lain', 'jenis_asset' => 'Aset Lain-Lain'],
            ['nama_objek' => 'Peralatan dan Mesin', 'jenis_asset' => 'Bukan Aset Pemda'],
            ['nama_objek' => 'Lain-lain', 'jenis_asset' => 'Bukan Aset Pemda'],
        ];

        foreach ($dataObjek as $data) {
            // Cari jenis berdasarkan nama_jenis
            $jenis = Jenis::where('jenis_asset', $data['jenis_asset'])->first();

            if ($jenis) {
                // Tambahkan data objek dengan jenis_id
                Objek::create([
                    'nama_objek' => $data['nama_objek'],
                    'jenis_id' => $jenis->id,
                ]);
            } else {
                // Opsional: Tambahkan log atau pesan jika nama_jenis tidak ditemukan
                echo "Jenis {$data['jenis_asset']} tidak ditemukan.\n";
            }
        }
    }
}
