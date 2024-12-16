<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $asset = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('kerusakan.index', compact('asset', 'asset_kerusakan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_mutasiKeluar = Asset::where('nama_barang', 'LIKE', "%{$query}%")
        ->whereIn('status_id', ['6'])
            // ->orWhere('description', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10); // Pindahkan paginate sebelum get()

        $asset_mutasiKeluar->appends(['search' => $query]);
        // dd($assets);
        // $asset_mutasiKeluar = Asset::where('status_id', 3)->paginate(10);

        return view('kerusakan.index', compact('assets', 'asset_mutasiKeluar'));
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

        // Update hanya kolom `status_id`
        $asset->update([
            'status_id' => '6', // Nilai statis
        ]);

        // Redirect ke halaman asset dengan pesan sukses
        return redirect()->route('kerusakan')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }
}
