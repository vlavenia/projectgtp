<?php



namespace App\Exports;

use App\Models\Asset;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;



class PenghapusanExport implements FromCollection, WithHeadings

{

    // /**

    //  * @return \Illuminate\Support\Collection

    //  */

    // public function collection()

    // {

    //     return User::select("id", "name", "email")->get();
    // }



    // /**

    //  * Write code on Method

    //  *

    //  * @return response()

    //  */

    // public function headings(): array

    // {

    //     return ["ID", "Name", "Email"];
    // }

    /**

     * @return \Illuminate\Support\Collection

     */

    public function collection()

    {

        return Asset::select("nama_barang", "kode_barang", "no_register", "merk", "bahan", "thn_pmbelian", "pabrik", "rangka", "mesin", "polisi", "bpkb", "harga", "deskripsi_brg", "keterangan", "opd")
            ->whereIn("status_id", ['5'])
            ->get();
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
