<?php



namespace App\Exports;

use App\Models\Asset;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;



class AsetssExport implements FromCollection, WithHeadings

{

    /**

     * @return \Illuminate\Support\Collection

     */

    public function collection()

    {

        return Asset::select("id", "nama_barang", "kode_barang", "kategori_id", "asal_id")->get();
    }



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function headings(): array

    {

        return ["ID", "nama_barang", "kode_barang", "kategori_id", "asal_id"];
    }
}
