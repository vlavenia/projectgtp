<?php



namespace App\Imports;

use App\Models\asal;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\User;

use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AsetsImport implements ToModel, WithHeadingRow

{

    /**

     * @param array $row

     *

     * @return \Illuminate\Database\Eloquent\Model|null

     */

    public function model(array $row)

    {

        return new Asset([
            'nama_barang'  => $row['nama_barang'],
            'kode_barang'  => $row['kode_barang'],
            'jenis_id'     => Jenis::where('nama_jenis', $row['jenis_id'])->value('id'),
            'kategori_id'  => Kategori::where('nama_kategori', $row['kategori_id'])->value('id'), // Default ke ID 1 jika tidak ditemukan
            'asal_id'      => asal::where('nama_asal', $row['asal_id'])->value('id'),
        ]);
    }
}
