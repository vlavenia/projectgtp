<?php

namespace App\Http\Controllers;

use App\Exports\AsetssExport;
use App\Exports\AssetsExport;
use App\Exports\AssetssExport;
use App\Exports\UsersExport;
use App\Http\Requests\AssetRequest;
use App\Imports\UsersImport;
use App\Imports\AsetsImport;
use App\Models\asal;
use App\Models\Asset;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Klasifikasi;
use App\Models\objek;
use App\Models\Unit;
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
        $jenis_id = $request->query('jenis_id');
        $objek_id = $request->query('objek_id');
        $unit_id = $request->query('unit_id');
        $klasifikasi_id = $request->query('klasifikasi_id');

        $query = Asset::query();

        // Filter berdasarkan jenis, objek, unit, dan klasifikasi
        if (!empty($jenis_id)) {
            $query->where('jenis_id', $jenis_id);
        }

        if (!empty($objek_id)) {
            $query->where('objek_id', $objek_id);
        }

        if (!empty($unit_id)) {
            $query->where('unit_id', $unit_id);
        }

        if (!empty($klasifikasi_id)) {
            $query->where('klasifikasi_id', $klasifikasi_id);
        }

        // Filter pencarian
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('kode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('merk', 'like', '%' . $search . '%')
                    ->orWhere('bpkb', 'like', '%' . $search . '%')
                    ->orWhere('polisi', 'like', '%' . $search . '%');
            })->whereIn('status_id', ['1', '6']);
        } else {
            $query->whereIn('status_id', ['1', '6']);
        }

        $query->orderBy('updated_at', 'DESC');

        $assets = $query->with('asal')->paginate(10);




        if ($request->ajax()) {
            return view('assets.partials.table', ['assets' => $assets])->render();
        }

        $asetsCount = Asset::whereIn('status_id', [1, 6])->count();

        $perolehanCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', [1, 2, 3]);
        })->whereIn('status_id', ['1', '6'])->count();

        $mutasimasukCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', ['4', '5']);
        })->whereIn('status_id', ['1', '6'])->count();

        $hibahCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', []); //notes:?
        })->whereIn('status_id', ['1', '6'])->count();


        $unit = Unit::all();
        $jenis = Jenis::select('id', 'jenis_asset')->get();
        $objek = Objek::select('id', 'nama_objek', 'jenis_id')->get();
        $Klasifikasi = Klasifikasi::select('id', 'nama_klasifikasi')->get();
        $jenis_select = Jenis::select('id', 'jenis_asset')->get();
        return view('assets.index', compact(
            'assets',
            'asetsCount',
            'perolehanCount',
            'mutasimasukCount',
            'hibahCount',
            'unit',
            'jenis',
            'jenis_select',
            'objek',
            'Klasifikasi',

        ));
    }



    public function getUnit(Request $request)
    {
        // Ambil semua data asal
        $unit = Unit::select('id', 'nama_unit')->get();

        // Pastikan ini mengembalikan data unit dalam bentuk JSON
        return response()->json([
            'unit' => $unit
        ]);
    }

    public function getJenis(Request $request)
    {
        // Ambil semua data asal
        $jenis = Jenis::select('id', 'jenis_asset')->get();

        // Pastikan ini mengembalikan data jenis dalam bentuk JSON
        return response()->json([
            'jenis' => $jenis
        ]);
    }

    public function getObjek(Request $request)
    {
        // Ambil semua data asal
        $objek = objek::select('id', 'nama_objek')->get();

        // Pastikan ini mengembalikan data jenis dalam bentuk JSON
        return response()->json([
            'objek' => $objek
        ]);
    }
    public function getKlasifikasi(Request $request)
    {
        // Ambil semua data Klasifikasi
        $Klasifikasi = Klasifikasi::select('id', 'nama_klasifikasi')->get();

        return response()->json([
            'Klasifikasi' => $Klasifikasi
        ]);
    }

    public function getAsals(Request $request)
    {
        // Ambil semua data asal
        $asals = Asal::select('id', 'asal_asset')->get();

        // Pastikan ini mengembalikan data asal dalam bentuk JSON
        return response()->json([
            'asals' => $asals
        ]);
    }


    public function search(Request $request)
    {

        $searchTerm = $request->input('search');
        $assets = Asset::where('nama_barang', 'like', '%' . $searchTerm . '%')
            ->orWhere('kode_barang', 'like', '%' . $searchTerm . '%')
            ->orWhere('merk', 'like', '%' . $searchTerm . '%')
            ->paginate(10);  // Pagination dengan 10 item per halaman

        return response()->json($assets);
    }


    public function filter(Request $request)
    {
        $query = Asset::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($query) use ($search) {
                $query->where('kode_barang', 'like', '%' . $search . '%')
                    ->orWhere('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('merk', 'like', '%' . $search . '%')
                    ->orWhere('bpkb', 'like', '%' . $search . '%')
                    ->orWhere('polisi', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('objek_id') && $request->objek_id != '') {
            $query->where('objek_id', $request->objek_id);
        }

        if ($request->has('unit_id') && $request->unit_id != '') {
            $query->where('unit_id', $request->unit_id);
        }

        if ($request->has('klasifikasi_id') && $request->klasifikasi_id != '') {
            $query->where('klasifikasi_id', $request->klasifikasi_id);
        }

        $query->whereIn('status_id', ['1', '6']);

        $query->orderBy('updated_at', 'DESC');


        $assets = $query->paginate(10);
        $asals = Asal::all();

        if ($request->ajax()) {
            $asals = Asal::select('id', 'asal_asset')->get(); // Query untuk mengambil data asal

            return response()->json([
                'html' => view('assets.partials.table', ['assets' => $assets])->render(),
                'asals' => $asals // Tambahkan daftar asals
            ]);
        }

        return response()->json($assets);
    }



    // public function mutasiMasuk()
    // {
    //     $assets = Asset::whereIn('asal_id', ['1', '2', '3'])
    //         ->orderBy('created_at', 'DESC')
    //         ->paginate(10); // Pindahkan paginate sebelum get()

    //     return view('mutasiMasuk.index', compact('assets'));
    // }

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

        return redirect()->route('assets')->with('success', 'Assets added successfully');
    }


    public function show(string $id)
    {
        $asset = Asset::findOrFail($id);

        return view('assets.show', compact('asset'));
    }


    public function update(Request $request, $id)
    {
        $imageName = '';
        if ($request->has('gambar')) {
            $imageName = time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images'), $imageName);
            $request['img_url'] = 'images/' . $imageName;
        }

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
            'objek_id' => 'nullable|exists:objeks,id',
            'img_url' => 'nullable',
        ]);

        // Update asset dengan data baru
        $asset->update($validated);

        return response()->json(['message' => 'Asset updated successfully',], 200);
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
            'file' => 'required|mimes:xlsx,xls,csv',
        ], [
            'file.mimes' => 'File yang diupload harus memiliki ekstensi .xlsx, .xls, atau .csv.',
        ]);

        $file = $request->file('file');
        if (!in_array($file->extension(), ['xlsx', 'xls', 'csv'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ekstensi file tidak didukung. Hanya file dengan ekstensi .xlsx, .xls, atau .csv yang dapat diimpor.'
            ]);
        }

        $import = new AsetsImport();
        Excel::import($import, $file->store('temp'));

        $newData = $import->getNewData();
        $duplicateData = $import->getDuplicateData();

        $newDataCount = count($newData);
        $duplicateCount = count($duplicateData);

        if ($newDataCount == 0 && $duplicateCount > 0) {
            return response()->json([
                'status' => 'warning',
                'message' => 'File telah diupload sebelumnya dan semua data adalah duplikat',
                'duplicateCount' => $duplicateCount
            ]);
        }

        if ($newDataCount > 0 && $duplicateCount > 0) {
            return response()->json([
                'status' => 'warning',
                'message' => " $newDataCount data baru berhasil ditambahkan",
                'newDataCount' => $newDataCount,
                'duplicateCount' => $duplicateCount
            ]);
        }

        if ($newDataCount > 0 && $duplicateCount == 0) {
            return response()->json([
                'status' => 'success',
                'message' => "$newDataCount data baru berhasil diimport",
                'newDataCount' => $newDataCount
            ]);
        }

        return response()->json([
            'status' => 'info',
            'message' => 'Tidak ada data yang ditambahkan atau ditemukan duplikat.',
        ]);
    }

    public function export()

    {
        return Excel::download(new AssetssExport, 'DataAssetGTP.xlsx');
    }
}
