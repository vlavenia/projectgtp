<?php



namespace App\Imports;

use App\Models\Asset;
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

            'nama_barang'     => $row['nama_barang'],
            'kode_barang'    => $row['kode_barang'],
            'jenis_id'    => 1,
            'kategori_id' => 1,
            'asalUsul_id' => 1,

        ]);
    }
}
