<?php



namespace App\Imports;

use App\Models\asal;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Klasifikasi;
use App\Models\objek;
use App\Models\status;
use App\Models\Unit;
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

        $existingAsset = Asset::where('kode_barang', $row['kode_barang'])
        ->where('no_register', $row['no_register'])
        ->where(function ($query) use ($row) {
            if ($row['merk'] !== null) {
                $query->where('merk', $row['merk']);
            }
        })
            ->where('thn_pmbelian', $row['thn_pmbelian'])
            ->first();

        if ($existingAsset) {
            $this->existingData[] = $row['no_register'];
            return null;
        }

        if (is_numeric($row['no'])) {
            return new Asset([
                'nama_barang'  => $row['nama_barang'],
                'kode_barang'  => $row['kode_barang'],
                'no_register'  => $row['no_register'],
                'merk'         => $row['merk'],
                'bahan'        => $row['bahan'],
                'thn_pmbelian' => $row['thn_pmbelian'],
                'pabrik'       => $row['pabrik'],
                'rangka'       => $row['rangka'],
                'mesin'        => $row['mesin'],
                'polisi'       => $row['polisi'],
                'bpkb'         => $row['bpkb'],
                'asal_id'      => Asal::where('asal_asset', $row['asal_usul'])->value('id'),
                'harga'        => $row['harga'],
                'deskripsi_brg' => $row['deskripsi_brg'],
                'keterangan'   => $row['keterangan'],
                'opd'          => $row['opd'],
                'status_id'    => Status::where('status_asset', 'Asset Terkini')->value('id'),
                'objek_id'     => null,
                'unit_id'      => null,
                'klasifikasi_id' => Klasifikasi::where('nama_klasifikasi', 'Extra Countable')->value('id'),
            ]);
        }

        return null;
    }

    public function getExistingData()
    {
        return $this->existingData;
    }
}
