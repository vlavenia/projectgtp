<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\exportPerolehan;
use App\Exports\PerolehanExport;
use App\Models\asal;
use App\Models\Jenis;
use App\Models\Klasifikasi;
use App\Models\objek;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PerolehanController extends Controller
{

    public function index()
    {
        $assets = Asset::whereIn('asal_id', ['1', '2', '3'])
            ->where('status_id', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $asals = asal::select('id', 'asal_asset')
            ->whereIn('id', ['1', '2', '3'])->get();
        $jenis = Jenis::select('id', 'jenis_asset')->get();
        $units = Unit::select('id', 'nama_unit')->get();
        $Objeks = objek::select('id', 'nama_objek')->get();
        $klasifikasi = Klasifikasi::select('id', 'nama_klasifikasi')->get();
        return view('perolehan.index',compact('assets', 'asals', 'jenis', 'units', 'klasifikasi', 'Objeks'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $asals = Asal::whereIn('id', ['1', '2', '3'])->get();
        $assets = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('asal_id', ['1', '2', '3'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $assets->appends(['search' => $query]);

        return view('perolehan.index', compact('assets', 'asals'));
    }

    public function store(Request $request)
    {
        $imageName = '';
        if ($request->has('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        }

        $asset = new Asset;
        if (!$asset) {
            return response()->json(['message' => 'Asset not found'], 404);
        }

        Asset::create(['kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'no_register' => $request->no_register,
            'merk' => $request->merk,
            'bahan' => $request->bahan,
            'thn_pmbelian' => $request->thn_pembelian,
            'pabrik' => $request->pabrik,
            'rangka' => $request->rangka,
            'mesin' => $request->mesin,
            'polisi' => $request->polisi,
            'bpkb' => $request->bpkb,
            'unit_id' => $request->unit_id,
            'jenis_id' => $request->jenis_id_add,
            'objek_id' => $request->objek_id,
            'klasifikasi_id' => $request->klasifikasi_id,
            'asal_id' => $request->asal_id,
            'harga' => $request->harga,
            'deskripsi_brg' => $request->deskripsi_brg,
            'keterangan' => $request->keterangan,
            'opd' => $request->opd,
            'status_id' => 1,
            'img_url' =>  'images/' . $imageName,
        ]);

        return redirect()->route('perolehan')->with('success', 'Barang Perolehan Berhasil Ditambahkan');
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
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $imageName = '';
        if ($request->hasFile('gambar')) {
           // Simpan gambar baru
            $imageName = time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $validated['img_url'] = 'images/' . $imageName;
        }

        $asset->update($validated);
        
        return redirect()->route('perolehan')->with('success', 'Assets updated successfully');
    }



    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('perolehan')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }


    public function exportPerolehan()

    {
        return Excel::download(new PerolehanExport, 'AssetperolehanGTP.xlsx');
    }
}
