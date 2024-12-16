<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\MutasiKeluar;
use Illuminate\Http\Request;

class MutasiKeluarController extends Controller
{
    public function index()
    {
        // $assets = Asset::whereIn('status_id', ['3'])
        //     ->orderBy('created_at', 'DESC')
        //     ->paginate(10); // Pindahkan paginate sebelum get()

        // return view('perolehan.index', compact('assets'));

        $assets = Asset::where('status_id', 1)->get(); // Jika hanya ingin mendapatkan semua data
        $asset_mutasiKeluar = Asset::where('status_id', 3)->paginate(10); // Paginate untuk 10 item per halaman
        // dd($asset_mutasiKeluar);
        return view('mutasiKeluar.index', compact('assets', 'asset_mutasiKeluar'));

    }

    public function changeStatus(Request $request)
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
            'status_id' => '3', // Nilai statis
        ]);

        // Redirect ke halaman asset dengan pesan sukses
        return redirect()->route('mutasikeluar')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_mutasiKeluar = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['3'])
            // ->orWhere('description', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10); // Pindahkan paginate sebelum get()

        $asset_mutasiKeluar->appends(['search' => $query]);
        // dd($assets);
        // $asset_mutasiKeluar = Asset::where('status_id', 3)->paginate(10);

        return view('mutasiKeluar.index', compact('assets', 'asset_mutasiKeluar'));
    }
    
    public function update(Request $request, string $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('mutasikeluar')->with('success', 'Assets updated successfully');
    }

    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('mutasikeluar')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }
}
