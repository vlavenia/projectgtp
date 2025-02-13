<?php

namespace App\Http\Controllers;

use App\Exports\KibaExport;
use App\Exports\KibbExport;
use App\Exports\KibcExport;
use App\Models\Asset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanKibController extends Controller
{
    //export KIB-A
    public function kiba()
    {
        return Excel::download(new KibaExport, 'KIBA.xlsx');
    }

    //export KIB-B
    public function kibb()
    {
        return Excel::download(new KibbExport, 'KIBB.xlsx');
    }
    //export KIB-C
    public function kibc()
    {
        return Excel::download(new KibcExport, 'KIBC.xlsx');
    }

    public function kib_c()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('laporankib.kib_c', compact('assets', 'asset_kerusakan'));
    }

    public function kib_d()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('laporankib.kib_D', compact('assets', 'asset_kerusakan'));
    }

    public function kib_e()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('laporankib.kib_e', compact('assets', 'asset_kerusakan'));
    }

    public function kib_f()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('laporankib.kib_f', compact('assets', 'asset_kerusakan'));
    }

    public function kib_atb()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('laporankib.kib_atb', compact('assets', 'asset_kerusakan'));
    }
}
