<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\exportPerolehan;
use App\Exports\PerolehanExport;
use App\Models\asal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PerolehanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::whereIn('asal_id', ['1', '2', '3'])
            ->where('status_id', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10); // Pindahkan paginate sebelum get()
        $asals = asal::all();
        return view('perolehan.index', compact('assets','asals'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $assets = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('asal_id', ['1', '2', '3'])
            // ->orWhere('description', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10); // Pindahkan paginate sebelum get()

        $assets->appends(['search' => $query]);


        return view('perolehan.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        Asset::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'no_ba_terima' => $request->no_ba_terima,
            'tgl_ba_terima' => $request->tgl_ba_terima,
            'kategori_id' => $request->kategori_id,
            'status_id' => '1',
            'img_url' =>  'images/' . $imageName,
        ]);

        return redirect()->route('assets')->with('success', 'Barang Perolehan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        return redirect()->route('perolehan')->with('success', 'Assets updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
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
