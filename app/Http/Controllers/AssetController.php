<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AssetController extends Controller
{

    public function index()
    {
        $asset = Asset::orderBy('created_at', 'DESC')->get();

        // return view('assets.index');
        return view('assets.index', compact('asset'));
    }

    public function perolehan()
    {
        $asset = Asset::orderBy('created_at', 'DESC')->get();

        // return view('assets.index');
        return view('perolehan.index', compact('asset'));
    }
    public function mutasiMasuk()
    {
        $asset = Asset::orderBy('created_at', 'DESC')->get();

        // return view('assets.index');
        return view('mutasiMasuk.index', compact('asset'));
    }


    public function create()
    {
        $kategori = Kategori::all();

        return view('assets.create', compact('kategori'));
    }


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


    public function show(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.show', compact('asset'));
    }

    public function edit(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.edit', compact('asset'));
    }


    public function update(Request $request, string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->update($request->all());

        return redirect()->route('assets')->with('success', 'Assets updated successfully');
    }


    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('assets')->with('success', 'Assets deleted successfully');
    }
}
