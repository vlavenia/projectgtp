<?php

namespace App\Http\Controllers;

use App\Exports\KerusakanExport;
use App\Models\Asset;
use App\Models\Kerusakan;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KerusakanController extends Controller
{
    public function index()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Kerusakan::leftJoin('assets','assets.id','=','kerusakan.aset_id')
                            ->leftJoin('users','users.id','=','kerusakan.user_id')
                            ->Select(
                                'assets.*',
                                'users.name as user_name',
                                'kerusakan.id as kerusakan_id',
                                'kerusakan.tanggal_kerusakan as tanggal_kerusakan',
                                'kerusakan.status as status',                            )
                            // ->where('status_id', '6')
                            ->paginate(10);
        // dd($asset_kerusakan);
        return view('kerusakan.index', compact('assets', 'asset_kerusakan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_kerusakan  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['6'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_kerusakan->appends(['search' => $query]);

        return view('kerusakan.index', compact('assets', 'asset_kerusakan'));
    }


    public function AddKerusakan(Request $request)
    {
        $now = Carbon::now()->format('Y-m-d');
        $asset_id = $request->input('asset_id');
        $currentUser = Auth::user()->id;

        // Insert data Kerusakan
        $kerusakan = new Kerusakan();
        $kerusakan->aset_id = $asset_id;
        $kerusakan->tanggal_kerusakan = $now;
        $kerusakan->user_id = $currentUser;
        $kerusakan->status = $request->status;
        $kerusakan->save();

        // Update status data aset
        $asset_id = $request->input('asset_id');
        $asset = Asset::findOrFail($asset_id);
        $asset->update([
            'status_id' => '6',
        ]);

        return redirect()->route('kerusakan')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }

    //changeStatus
    public function ReturnKerusakan(string $id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->update([
            'status' => 'Selesai Diperbaiki',
        ]);

        $asset_peminjaman = $kerusakan->aset_id;
        $asset = Asset::findOrFail($asset_peminjaman);
        $asset->update([
            'status_id' => '1',
        ]);


        return redirect()->route('kerusakan')->with('success', 'Data aset berhasil diupdate');
    }

    public function updateStatus(Request $request,string $id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->update([
            'status' => $request->status,
        ]);

        if($request->status == 'Diperbaiki'){
            $asset_kerusakan = $kerusakan->aset_id;
            $asset = Asset::findOrFail($asset_kerusakan);
            $asset->update([
                'status_id' => '1',
            ]);
        }

        return redirect()->route('kerusakan')->with('success', 'Status Perbaikan aset berhasil diupdate');
    }

    public function export()

    {
        return Excel::download(new KerusakanExport, 'DataAsset-Kerusakan-GTP.xlsx');
    }
}
