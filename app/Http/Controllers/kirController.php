<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Ruangan;
use App\Models\TransactionRuanganAsset;
use Illuminate\Http\Request;

class KirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::all();
        $assets = Asset ::where('status_id', '1')->get();
        $transaction_ruangan_asset = TransactionRuanganAsset::all();

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
                        ->paginate(10);
        return view('kir.index', compact('assets','asset_kir','ruangans','transaction_ruangan_asset'));
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
     * Display the specified resource.
     */
    public function detail($id)
    {
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
                        ->where('transaction_ruangan_assets.id',$id)
                        ->all();
        // dd($asset_kir);
        return view('kir.detail',compact('asset_kir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
