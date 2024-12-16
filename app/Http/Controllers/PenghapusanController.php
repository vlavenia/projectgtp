<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class PenghapusanController extends Controller
{

    public function index()
    {
        $asset = Asset::where('status_id', '1')->get();

        $asset_penghapusan = Asset::where('status_id', '5')->get();

        return view('penghapusan.index', compact('asset', 'asset_penghapusan'));
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
    public function update(Request $request)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
