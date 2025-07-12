<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSemuaAset;
use App\Exports\LaporanUser;
use Illuminate\Http\Request;
use App\Exports\MutasiMasukExport;
use App\Models\asal;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Klasifikasi;
use App\Models\objek;
use App\Models\Unit;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporanAset(){
        return view('laporan.aset');
    }

    public function laporanPeminjaman(){
        return view();
    }
    
    public function laporanUser(){
        return view('laporan.user');
    }

    public function exportSemuaLaporanAset(Request $request){
        $filter = [
            'jenis_laporan' => $request->jenis_laporan ? $request->jenis_laporan : '0',    
            'start_date' => $request->start_date,    
            'end_date' => $request->end_date,    
        ];
        return Excel::download(new LaporanSemuaAset($filter), 'DataSemuaAsset-GTP.xlsx');
    }

    public function exportLaporanUser(Request $request){
        $filter = [
            'jenis_role' => $request->jenis_role ? $request->jenis_role : '0',    
        ];
        return Excel::download(new LaporanUser($filter), 'DataAccountUser-GTP.xlsx');
    }
    
}
