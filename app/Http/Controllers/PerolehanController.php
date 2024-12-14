<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class PerolehanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::whereIn('asal_id', ['1', '2', '3'])
            ->orderBy('created_at', 'DESC')
            ->get();


        // return view('assets.index');
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
        $validated = $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Asset::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'no_ba_terima' => $request->no_ba_terima,
            'tgl_ba_terima' => $request->tgl_ba_terima,
            'kategori_id' => $request->kategori_id,

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

        $asset->update($request->all());

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
}
