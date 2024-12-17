<?php

namespace App\Http\Controllers;

use App\Exports\KerusakanExport;
use App\Models\Asset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KerusakanController extends Controller
{
    public function index()
    {
        $assets = Asset::where('status_id', '1')->get();
        $asset_kerusakan = Asset::where('status_id', '6')->paginate(10);

        return view('kerusakan.index', compact('assets', 'asset_kerusakan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_kerusakan  = Asset::where('nama_barang', 'LIKE', "%{$query}%")
        ->whereIn('status_id', ['6'])
            // ->orWhere('description', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asset_kerusakan->appends(['search' => $query]);

        return view('kerusakan.index', compact('assets', 'asset_kerusakan'));
    }


    public function changeStatus(Request $request)
    {
        $asset_id = $request->input('asset_id');

        $asset = Asset::findOrFail($asset_id);

        $asset->update([
            'status_id' => '6',
        ]);

        return redirect()->route('kerusakan')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }

    public function update(Request $request, string $id)
    {

        $asset = Asset::findOrFail($id);
        if (!$asset) {
            return response()->json(['message' => 'Asset not found'], 404);
        }
        // dd($request);
        // Validasi input data
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'no_register' => 'nullable|numeric',
            'merk' => 'nullable|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'thn_pembelian' => 'nullable|integer|min:1900|max:' . date('Y'), // Tahun valid
            'pabrik' => 'nullable|string|max:255',
            'rangka' => 'nullable|string|max:255',
            'mesin' => 'nullable|string|max:255',
            'polisi' => 'nullable|string|max:255',
            'bpkb' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric', // Harga sebagai angka
            'deskripsi_brg' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'opd' => 'nullable|string|max:255',
            'asal_id' => 'nullable|exists:asals,id',
            // 'img_url' => 'nullable|exists:asals,id',
        ]);



        // Update asset dengan data baru
        $asset->update($validated);
        return redirect()->route('kerusakan')->with('success', 'Assets updated successfully');
    }

    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('kerusakan')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }


    public function export()

    {
        return Excel::download(new KerusakanExport, 'DataAsset-Kerusakan-GTP.xlsx');
    }
}
