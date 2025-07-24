<?php

namespace App\Http\Controllers;

use App\Exports\KirExport;
use App\Models\Asset;
use App\Models\Ruangan;
use App\Models\TransactionRuanganAsset;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
class KirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::all();
        $assets = Asset ::where('status_id', '1')->get();

        $asset_kir = Ruangan::
                        select(
                            'ruangan.*',
                        )
                        ->paginate(10);
        return view('kir.index', compact('assets','asset_kir','ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request)
    {
        foreach($request->asset_id as $asset_id){
            $tx_ruangan_asset = new TransactionRuanganAsset;
            $tx_ruangan_asset->id_asset = $asset_id;
            $tx_ruangan_asset->id_ruangan = $request->ruangan_id;
            $tx_ruangan_asset->keterangan = $request->keterangan ? $request->keterangan : '';
            $tx_ruangan_asset->save();
        }

        return redirect()->route('kir')->with('success', 'KIR add successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_asset(Request $request)
    {
        foreach($request->asset_id as $asset_id){
            $tx_ruangan_asset = new TransactionRuanganAsset;
            $tx_ruangan_asset->id_asset = $asset_id;
            $tx_ruangan_asset->id_ruangan = $request->id_ruangan;
            $tx_ruangan_asset->keterangan = $request->keterangan ? $request->keterangan : '';
            $tx_ruangan_asset->save();
        }

        return redirect()->route('kir')->with('success', 'KIR add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $ruangans = Ruangan::find($id);
        $assets = Asset ::all();
        $asset_kir = TransactionRuanganAsset::
                        leftJoin('assets','assets.id','=','transaction_ruangan_assets.id_asset')
                        ->leftJoin('ruangan','ruangan.id','=','transaction_ruangan_assets.id_ruangan')
                        ->leftJoin('statuses','statuses.id','=','assets.status_id')
                        ->select(
                            'transaction_ruangan_assets.*',
                            
                            'assets.id as aset_id',
                            'assets.nama_barang',
                            'assets.kode_barang',
                            'assets.no_register',

                            'transaction_ruangan_assets.id_asset',
                            'transaction_ruangan_assets.id_ruangan',
                            'transaction_ruangan_assets.keterangan',
                            'ruangan.deskripsi',
                            'ruangan.nama_ruangan',
                            'statuses.status_asset',
                        )
                        ->where('transaction_ruangan_assets.id_ruangan',$id)
                        ->paginate(10);

        return view('kir.detail',compact('asset_kir','assets','ruangans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function export($id_ruangan)
    {
        $filter = [
            'id_ruangan' => $id_ruangan ? $id_ruangan : '0',    
        ];

        return Excel::download(new KirExport($filter), 'DataAsset-KIR-GTP.xlsx');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteDetailKIR(string $id)
    {
        
        $asset_kir = TransactionRuanganAsset::find($id);

        if($asset_kir){
            $asset_kir->delete();
        }

        return redirect()->back()->with('success', 'Asset detail KIR delete successfully');
    }
}
