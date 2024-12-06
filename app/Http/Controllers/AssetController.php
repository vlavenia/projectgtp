<?php

namespace App\Http\Controllers;

use App\Exports\AsetssExport;
use App\Exports\UsersExport;
use App\Http\Requests\AssetRequest;

use App\Imports\UsersImport;
use App\Imports\AsetsImport;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Klasifikasi;
use App\Models\objek;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->query('search');
        $query = Asset::query();

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('kode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('merk', 'like', '%' . $search . '%')
                    ->orWhere('bpkb', 'like', '%' . $search . '%')
                    ->orWhere('polisi', 'like', '%' . $search . '%');
            })
                ->where(function ($query) {
                    $query->where('status_asset', 'aset terkini')
                        ->orWhere('status_asset', '');
                });
        } else {
            $query->where(function ($query) {
                $query->where('status_asset', 'aset terkini')
                    ->orWhere('status_asset', ' ');
            });
        }

        $assets = $query->paginate(10);

        // Jika permintaan AJAX, kembalikan data JSON
        if ($request->ajax()) {
            return response()->json([
                'data' => $assets->items(),
            ]);
        }

        //query count
        $asetsCount = Asset::where('status_asset', ' ')
            ->orWhere('status_asset', 'Aset terkini')
            ->count();

        $perolehanCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('nama_asal', ['APBD', 'DAK', 'DAIS', 'Hadiah']);
        })->where('status_asset', ' ')
            ->get()->count();

        $mutasimasukCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('nama_asal', ['Hibah']);
        })->where('status_asset', ' ')
            ->orWhere('status_asset', 'Aset terkini')
            ->get()->count();

        // Ambil data Dropdown jenis, objek, dan klasifikasi
        // $jenis = Jenis::select('id', 'nama_jenis')->get();
        $jenis = Jenis::all();
        $objek = Objek::select('id', 'nama_objek', 'jenis_id')->get();
        $Klasifikasi = Klasifikasi::select('id', 'nama_klasifikasi')->get();


        return view('assets.index', compact('assets', 'asetsCount', 'perolehanCount', 'mutasimasukCount', 'jenis', 'objek', 'Klasifikasi', 'search'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $assets = Asset::where(function ($query) use ($search) {
            $query->where('Kode_Barang', 'like', "%$search%");
        })->get();

        return view('assets.index', compact('assets', 'search'));
    }

    public function perolehan()
    {
        // $asset = Asset::orderBy('created_at', 'DESC')->get();
        $assets = Asset::whereHas('asal', function ($query) {
            $query->whereIn('nama_asal', ['APBD', 'DAK', 'DAIS', 'Hadiah']);
        })
            ->where('status_asset', ' ')
            ->get();


        // return view('assets.index');
        return view('perolehan.index', compact('assets'));
    }

    public function mutasiMasuk()
    {
        $assets = Asset::whereHas('asal', function ($query) {
            $query->whereIn('nama_asal', ['Hibah']);
        })->get();

        // return view('assets.index');
        return view('mutasiMasuk.index', compact('assets'));
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
        return view('assets.index', compact('assets'));

        // return view('assets.edit', compact('asset'));
    }


    public function update(Request $request, string $id)
    {
        //$user = auth()->user();
        //$id = $user->id; cronjob
        //crudke_tble_Log | props nya di sv: name,id crrnt user,aktivitas("update")
        $asset = Asset::findOrFail($id);

        $asset->update($request->all());

        return redirect()->route('assets')->with('success', 'Assets updated successfully');
    }


    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('assets')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }



    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $import = new AsetsImport();
        Excel::import($import, $request->file('file')->store('temp'));
        // Ambil data yang sudah ada dari import
        $existingData = $import->getExistingData();

        // Berikan feedback kepada pengguna
        if (count($existingData) > 0) {
            return redirect()->back()->with('warning', 'Beberapa data sudah ada: ' . implode(', ', $existingData));
        }

        return redirect()->back()->with('success', 'File berhasil diimpor!');
        // return redirect()->back()->with('success', 'File berhasil diimpor!');
    }

    public function export()

    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
