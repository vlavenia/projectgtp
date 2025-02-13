<?php

namespace App\Http\Controllers;

use App\Exports\KibaExport;
use App\Models\Asset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KibaController extends Controller
{
    public function index (Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_tanah = Asset::where('jenis_id', 1);

        if ($query) {
            $asset_tanah->where('nama_barang', 'LIKE', "%{$query}%");
        }

        $asset_tanah = $asset_tanah->orderBy('created_at', 'DESC')->paginate(10);
        $asset_tanah->appends(['search' => $query]);

        return view('kib.kiba', compact('assets', 'asset_tanah'));
    }


    public function export()

    {
        return Excel::download(new KibaExport, 'KIBA.xlsx');
    }

}
