<?php

namespace App\Http\Controllers;

use App\Exports\MutasiKeluarExport;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\MutasiKeluar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MutasiKeluarController extends Controller
{
    public function index()
    {

        $assets = Asset::whereIn('status_id', [1, 6])->get();
        $jenis = Jenis::select('id', 'jenis_asset')->get();
        $asset_mutasiKeluar = Asset::where('status_id', 3)->paginate(10);
        return view('mutasiKeluar.index', compact('assets', 'asset_mutasiKeluar', 'jenis'));
    }


    public function changeStatus(Request $request)
    {

        $asset_id = $request->input('asset_id');

        $request->validate([
            'asset_id' => 'required|exists:assets,id',
        ]);

        $asset = Asset::findOrFail($asset_id);


        $asset->update([
            'status_id' => '3',
        ]);

        return redirect()->route('mutasikeluar')->with('success', 'Asset status updated to Mutasi Keluar successfully');
    }

    public function restore(Request $request, $id)
    {

        $asset = Asset::findOrFail($id);

        $asset->update([
            'status_id' => '1',
        ]);

        return redirect()->route('mutasikeluar')->with('success', 'Asset status restore successfully');
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

        $jenis = Jenis::select('id', 'jenis_asset')->get();

        return view('mutasiKeluar.index', compact('assets', 'asset_mutasiKeluar', 'jenis'));
    }

    public function update(Request $request, string $id)
    {

        $asset = Asset::findOrFail($id);
        if (!$asset) {
            return response()->json(['message' => 'Asset not found'], 404);
        }

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'no_register' => 'nullable|numeric',
            'merk' => 'nullable|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'thn_pmbelian' => 'nullable|integer|min:1900|max:' . date('Y'),
            'pabrik' => 'nullable|string|max:255',
            'rangka' => 'nullable|string|max:255',
            'mesin' => 'nullable|string|max:255',
            'polisi' => 'nullable|string|max:255',
            'bpkb' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'deskripsi_brg' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'opd' => 'nullable|string|max:255',
            'unit_id' => 'nullable|exists:units,id',
            'jenis_id' => 'nullable|exists:jenis,id',
            'klasifikasi_id' => 'nullable|exists:klasifikasis,id',
            'asal_id' => 'nullable|exists:asals,id',
            'objek_id' => 'nullable|exists:objeks,id',
        ]);

        $asset->update($validated);
        return redirect()->route('mutasikeluar')->with('success', 'Assets updated successfully');
    }

    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('mutasikeluar')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }


    public function export()

    {
        return Excel::download(new MutasiKeluarExport, 'DataAsset-MutasiKeluar-GTP.xlsx');
    }
}
