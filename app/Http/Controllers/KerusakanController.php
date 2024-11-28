<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $asset = Asset::where('status_asset', ' ')->get();
        $asset_kerusakan = Asset::where('status_asset', 'Rusak')->get();

        return view('kerusakan.index', compact('asset', 'asset_kerusakan'));
    }

    public function update(Request $request)
    {
        // Mengambil nilai asset_id yang dipilih dari form
        $asset_id = $request->input('asset_id');

        // Validasi jika asset_id kosong atau tidak valid
        // $request->validate([
        //     'asset_id' => 'required|exists:assets,id', // Pastikan asset_id valid
        // ]);

        // Temukan asset berdasarkan ID
        $asset = Asset::findOrFail($asset_id);

        // Update hanya kolom `status_asset`
        $asset->update([
            'status_asset' => 'Rusak', // Nilai statis
        ]);

        // Redirect ke halaman asset dengan pesan sukses
        return redirect()->route('kerusakan')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }
}
