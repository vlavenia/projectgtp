<?php



namespace App\Exports;

use App\Models\Asset;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class KibbExport implements FromCollection, WithHeadings

{

    public function collection()

    {
        return Asset::where("jenis_id", 2)
            ->where("status_id", 1)
            ->select([
                "nama_barang",
                "kode_barang",
                "no_register",
                "merk",
                "bahan",
                "thn_pmbelian",
                "pabrik",
                "rangka",
                "mesin",
                "polisi",
                "bpkb",
                "harga",
                "deskripsi_brg",
                "keterangan",
                "opd"
            ])
            ->get();
    }

    public function headings(): array

    {

        return ["nama_barang", "kode_barang", "no_register", "merk", "bahan", "thn_pmbelian", "pabrik", "rangka", "mesin", "polisi", "bpkb", "harga", "deskripsi_brg", "keterangan", "opd"];
    }
}
