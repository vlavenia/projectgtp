<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $assets = Asset::where('status_id', '1')->get();

        $asset_peminjaman = Asset::where('status_id', '5')->paginate(10);

        return view('peminjaman.index', compact('assets', 'asset_peminjaman'));
    }

    public function peminjaman_staf()
    {
        $assets = Asset::where('status_id', '1')->get();

        $asset_peminjaman= Asset::where('status_id', '5')->paginate(10); //join ke tble pminjaman

        return view('peminjaman.peminjaman_staf', compact('assets', 'asset_peminjaman'));
    }

    public function addPeminjaman(Request $request)
    {
        dd(Auth::user()->id);
        $asset_id = $request->input('asset_id');
        $asset = Asset::findOrFail($asset_id);
        $asset->update([
            'status_id' => '5', //itu jangan lupa statusnya diubah ya jadi "PengajuanPeminjaman"
        ]);
            //nambah data ke pinjeman
        return redirect()->route('peminjaman_staf')->with('success', ' peminjaman Asset berhasil diajukan ');
        //set status jd request
    }

    public function restorePeminjaman(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update([
            'status_id' => '1',
        ]);

        return redirect()->route('peminjaman_staf')->with('success', 'Pengajuan berhasil dibatalkan');
    }

    public function search_pengelola(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_peminjaman  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['5'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_peminjaman->appends(['search' => $query]);

        return view('peminjaman.index', compact('assets', 'asset_peminjaman'));
    }

    public function search_staf(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_peminjaman  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['5'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_peminjaman->appends(['search' => $query]);

        return view('peminjaman.peminjaman_staf', compact('assets', 'asset_peminjaman'));
    }
}
