<?php

namespace App\Http\Controllers;

use App\Exports\PenghapusanExport;
use App\Models\Asset;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenghapusanController extends Controller
{

    public function index()
    {
        $assets = Asset::where('status_id', '1')->get();

        $asset_penghapusan = Asset::where('status_id', '5')->paginate(10);

        return view('penghapusan.index', compact('assets', 'asset_penghapusan'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $assets = Asset::where('status_id', 1)->get();
        $asset_penghapusan = Asset::where('nama_barang', 'LIKE', "%{$query}%")
            ->whereIn('status_id', ['5'])
            // ->orWhere('description', 'LIKE', "%{$query}%")
            ->orderBy('created_at', 'DESC')
            ->paginate(10); // Pindahkan paginate sebelum get()

        $asset_penghapusan->appends(['search' => $query]);


        return view('penghapusan.index', compact('assets', 'asset_penghapusan'));
    }

    public function restore(Request $request, $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->update([
            'status_id' => '1',
        ]);

        return redirect()->route('penghapusan')->with('success', 'Asset status restore successfully');
    }

    public function create() {}


    public function store(Request $request)
    {
        // Asset::create($request->all());
        // Validasi data
        $validated = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori_id' => 'required|exists:kategoris,id', // Pastikan kategori_id valid

        ]);

        // Menyimpan asset dengan kategori_id
        Asset::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'no_ba_terima' => $request->no_ba_terima,
            'tgl_ba_terima' => $request->tgl_ba_terima,
            'kategori_id' => $request->kategori_id,

        ]);

        return redirect()->route('assets')->with('success', 'Assets added successfully');
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


        $asset->update([
            'status_id' => '5', // Nilai statis
        ]);

        // Redirect ke halaman asset dengan pesan sukses
        return redirect()->route('penghapusan')->with('success', 'Asset status updated to Mutasi Keluar successfully');
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

        // Update asset dengan data baru
        $asset->update($validated);
        return redirect()->route('penghapusan')->with('success', 'Assets updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('penghapusan')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }

    public function export()

    {
        return Excel::download(new PenghapusanExport, 'DataAsset-Penghapusan-GTP.xlsx');
    }
}
