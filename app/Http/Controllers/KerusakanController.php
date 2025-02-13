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

    public function restore(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update([
            'status_id' => '1',
        ]);

        return redirect()->route('kerusakan')->with('success', 'Asset status restore successfully');
    }

    public function update(Request $request, string $id)
    {

        $asset = Asset::findOrFail($id);
        if (!$asset) {
            return response()->json(['message' => 'Asset not found'], 404);
        }

        // Validasi input data
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
            'objek_id' => 'nullable|exists:objeks,id','img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $imageName = '';
        if ($request->hasFile('gambar')) {
            // Simpan gambar baru
            $imageName = time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $validated['img_url'] = 'images/' . $imageName;
        }

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
