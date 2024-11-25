<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\MutasiKeluar;
use Illuminate\Http\Request;

class MutasiKeluarController extends Controller
{
    public function index()
    {
        $asset = Asset::where('status_asset', ' ')->get();
        $asset_mutasiKeluar = Asset::where('status_asset', 'Mutasi Keluar')->get();


        return view('mutasiKeluar.index', compact('asset', 'asset_mutasiKeluar'));
    }

    public function update(Request $request)
    {
        // Mengambil nilai asset_id yang dipilih dari form
        $asset_id = $request->input('asset_id');

        // Validasi jika asset_id kosong atau tidak valid
        $request->validate([
            'asset_id' => 'required|exists:assets,id', // Pastikan asset_id valid
        ]);

        // Temukan asset berdasarkan ID
        $asset = Asset::findOrFail($asset_id);

        // Update hanya kolom `status_asset`
        $asset->update([
            'status_asset' => 'Mutasi Keluar', // Nilai statis
        ]);

        // Redirect ke halaman asset dengan pesan sukses
        return redirect()->route('mutasikeluar')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }
}
