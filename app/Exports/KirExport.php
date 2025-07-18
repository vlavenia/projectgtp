<?php



namespace App\Exports;

use App\Models\Asset;
use App\Models\TransactionRuanganAsset;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;



class KirExport implements FromCollection, WithHeadings

{

    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function collection()

    {

        // return Asset::leftJoin('detail_angkutan','detail_angkutan.aset_id','=','assets.id')
        //     ->select("nama_barang", "kode_barang", "no_register", "merk", "bahan", "thn_pmbelian", "pabrik", "rangka", "mesin", "polisi", "bpkb", "harga", "deskripsi_brg", "keterangan", "opd")
        //     ->whereIn("status_id", ['3'])
        //     ->get();

        $asset_kir = TransactionRuanganAsset::
                    leftJoin('assets','assets.id','=','transaction_ruangan_assets.id_asset')
                    ->leftJoin('ruangan','ruangan.id','=','transaction_ruangan_assets.id_ruangan')
                    ->leftJoin('statuses','statuses.id','=','assets.status_id')
                    ->select(
                        'ruangan.nama_ruangan',
                        // 'ruangan.deskripsi',
                        // 'transaction_ruangan_assets.*',
                        // 'assets.id as aset_id',
                        'assets.nama_barang',
                        'assets.kode_barang',
                        'assets.no_register',

                        // 'transaction_ruangan_assets.id_asset',
                        // 'transaction_ruangan_assets.id_ruangan',
                        // 'transaction_ruangan_assets.keterangan',
                        // 'statuses.status_asset',
                    )
                    ->where('transaction_ruangan_assets.id_ruangan',$this->filter['id_ruangan'])
                    ->get();

                    return $asset_kir;
            
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function headings(): array

    {

        return ["nama_barang", "kode_barang", "no_register", "merk", "bahan", "thn_pmbelian", "pabrik", "rangka", "mesin", "polisi", "bpkb", "harga", "deskripsi_brg", "keterangan", "opd"];
    }
}
