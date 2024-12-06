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

    // Array untuk menyimpan kode barang yang sudah ada
    protected $existingData = [];

    /**
     * Memproses setiap baris data dari file Excel.
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $existingAsset = Asset::where('kode_barang', $row['kode_barang'])->first();

        if ($existingAsset) {
            $this->existingData[] = $row['kode_barang'];
            return null;
        }

        return new Asset([
            'nama_barang'  => $row['nama_barang'],
            'kode_barang'  => $row['kode_barang'],
            'jenis_id'     => Jenis::where('nama_jenis', $row['jenis_id'])->value('id'),
            'kategori_id'  => Kategori::where('nama_kategori', $row['kategori_id'])->value('id'),
            'asal_id'      => Asal::where('nama_asal', $row['asal_id'])->value('id'),
            'status_asset' => "Aset terkini",
        ]);
        
    }

    public function getExistingData()
    {
        return $this->existingData;
    }
}
