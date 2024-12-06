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
            ['nama_objek' => 'Tanah', 'nama_jenis' => 'Tanah'],
            ['nama_objek' => 'Alat Besar', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Angkutan', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Bengkel & Ukur', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Pertanian', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Kantor dan Rumah Tangga', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Studio, Komunikai & Pemancar', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Kedokteran & Kesehatan', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Laboratorium', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Komputer', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Rambu-Rambu', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Eksplorasi', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Pengeboran', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Peraga', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Olahraga', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Alat Permainan', 'nama_jenis' => 'Peralatan dan Mesin'],
            ['nama_objek' => 'Bangunan Gedung', 'nama_jenis' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Monumen', 'nama_jenis' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Bangunan Menara', 'nama_jenis' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Tugu', 'nama_jenis' => 'Gedung dan Bangunan'],
            ['nama_objek' => 'Jalan dan Jembatan', 'nama_jenis' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Bangunan Air', 'nama_jenis' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Instalansi', 'nama_jenis' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Jarungan', 'nama_jenis' => 'Jalan, Jaringan dan Irigasi'],
            ['nama_objek' => 'Bahan Perpustakaan', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Barang Bercorak Kesenian/Kebudayaan/Olahraga', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Hewan', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Tanaman', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Barang Koleksi Non Budaya', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Aset Tetap Dalam Renovasi', 'nama_jenis' => 'Aset Tetap Lainnya'],
            ['nama_objek' => 'Konstruksi Dalam Pengerjaan', 'nama_jenis' => 'Konstruksi Dalam Pengerjaan'],
            ['nama_objek' => 'Aset Lainnya', 'nama_jenis' => 'Aset Lainnya'],
            ['nama_objek' => 'Kemitraan Dengan Pihak Ketiga', 'nama_jenis' => 'Kemitraan Dengan Pihak Ketiga'],
            ['nama_objek' => 'Aset Tidak Berwujud', 'nama_jenis' => 'Aset Tidak Berwujud'],
            ['nama_objek' => 'Aset Lain-Lain', 'nama_jenis' => 'Aset Lain-Lain'],
            ['nama_objek' => 'Peralatan dan Mesin', 'nama_jenis' => 'Bukan Aset Pemda'],
            ['nama_objek' => 'Lain-lain', 'nama_jenis' => 'Bukan Aset Pemda'],
        ];

        foreach ($dataObjek as $data) {
            // Cari jenis berdasarkan nama_jenis
            $jenis = Jenis::where('nama_jenis', $data['nama_jenis'])->first();

            if ($jenis) {
                // Tambahkan data objek dengan jenis_id
                Objek::create([
                    'nama_objek' => $data['nama_objek'],
                    'jenis_id' => $jenis->id,
                ]);
            } else {
                // Opsional: Tambahkan log atau pesan jika nama_jenis tidak ditemukan
                echo "Jenis {$data['nama_jenis']} tidak ditemukan.\n";
            }
        }
    }
}
