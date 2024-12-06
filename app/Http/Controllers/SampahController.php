<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function trash()
    {
        $trashedAssets = Asset::onlyTrashed()->get(); // Mengambil hanya data yang dihapus sementara
        return view('sampah.index', compact('trashedAssets'));
    }

    public function restore($id)
    {
        $asset = Asset::onlyTrashed()->findOrFail($id);
        $asset->restore(); // Mengembalikan data yang dihapus
        return redirect()->back()->with('success', 'Data berhasil dikembalikan.');
    }

    public function forceDelete($id)
    {
        $asset = Asset::onlyTrashed()->findOrFail($id);
        $asset->forceDelete(); // Hapus data secara permanen
        return redirect()->back()->with('success', 'Data telah dihapus secara permanen.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
