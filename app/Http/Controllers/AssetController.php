<?php

namespace App\Http\Controllers;

use App\Exports\AsetssExport;
use App\Exports\UsersExport;
use App\Http\Requests\AssetRequest;

use App\Imports\UsersImport;
use App\Imports\AsetsImport;
use App\Models\Asset;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{

    public function index()
    {
        $asset = Asset::orderBy('created_at', 'DESC')->get();
        $asets = Asset::get();
        // return view('assets.index');
        return view('assets.index', compact('asset', 'asets'));
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

    // import
    public function import()

    {

        // Excel::import(new UsersImport, request()->file('file'));
        Excel::import(new AsetsImport, request()->file('file'));



        return back();
    }

    public function export()

    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }


    // public function import(AssetRequest $request)
    // {
    //     try {

    //         Excel::import(new UsersImport, $request->file('file'));
    //         return response()->json(['data' => 'Users imported successfully.', 201]);
    //     } catch (\Exception $ex) {
    //         Log::info($ex);
    //         return response()->json(['data' => 'Some error has occur.', 400]);
    //     }
    // }

    // /**
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function export()
    // {
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }
}
