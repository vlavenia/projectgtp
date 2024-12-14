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
            })->where('status_id', '1');
        } else {
            $query->where('status_id', '1');
        }

        // Menambahkan pagination
        $assets = $query->paginate(10);

        if ($request->ajax()) {
            return view('assets.partials.table', ['assets' => $assets])->render();
        }

        // Hitung data tambahan
        $asetsCount = Asset::where('status_id', '1')->count();

        $perolehanCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', [1, 2, 3]); // Pastikan ID benar
        })->where('status_id', '1')->count();

        $mutasimasukCount = Asset::whereHas('asal', function ($query) {
            $query->where('asal_id', 'mutasi'); // Pastikan nilai 'mutasi' sesuai dengan database Anda
        })->where('status_id', '1')->count();

        $hibahCount = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', [4, 5]); // Pastikan ID benar
        })->where('status_id', '1')->count();


        // Data filter
        $unit = Unit::all();
        $jenis = Jenis::all();
        $objek = Objek::select('id', 'nama_objek', 'jenis_id')->get();
        $Klasifikasi = Klasifikasi::select('id', 'nama_klasifikasi')->get();

        return view('assets.index', compact(
            'assets',
            'asetsCount',
            'perolehanCount',
            'mutasimasukCount',
            'hibahCount',
            'unit',
            'jenis',
            'objek',
            'Klasifikasi'
        ));
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

    // public function filter(Request $request)
    // {
    //     $query = Asset::query();


    //     if ($request->has('objek_id') && $request->objek_id != '') {
    //         $query->where('objek_id', $request->objek_id);
    //     }

    //     if ($request->has('unit_id') && $request->unit_id != '') {
    //         $query->where('unit_id', $request->unit_id);
    //     }

    //     if ($request->has('klasifikasi_id') && $request->klasifikasi_id != '') {
    //         $query->where('klasifikasi_id', $request->klasifikasi_id);
    //     }

    //     $assets = $query->get();

    //     return response()->json($assets);
    // }


    public function filter(Request $request)
    {
        $query = Asset::query();

        // Filter berdasarkan pencarian
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

        // Filter berdasarkan objek_id
        if ($request->has('objek_id') && $request->objek_id != '') {
            $query->where('objek_id', $request->objek_id);
        }

        // Filter berdasarkan unit_id
        if ($request->has('unit_id') && $request->unit_id != '') {
            $query->where('unit_id', $request->unit_id);
        }

        // Filter berdasarkan klasifikasi_id
        if ($request->has('klasifikasi_id') && $request->klasifikasi_id != '') {
            $query->where('klasifikasi_id', $request->klasifikasi_id);
        }

        // Menambahkan status jika diperlukan (misalnya status aktif)
        $query->where('status_id', '1');

        // Paginate data jika ada parameter page
        $assets = $query->paginate(10);  // Sesuaikan jumlah per halaman sesuai kebutuhan

        if ($request->ajax()) {
            return view('assets.partials.table', ['assets' => $assets])->render();
        }

        // Jika tidak menggunakan AJAX, kembalikan data JSON
        return response()->json($assets);
    }



    public function mutasiMasuk()
    {
        $assets = Asset::whereHas('asal', function ($query) {
            $query->whereIn('asal_id', ['Hibah']);
        })->get();
        return view('mutasiMasuk.index', compact('assets'));
    }

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
        $asset = Asset::find($id); // Cari asset berdasarkan ID
        if (!$asset) {
            return response()->json(['message' => 'Asset not found'], 404);
        }

        // Validasi input data
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255',
            'no_ba_terima' => 'nullable|string|max:255',
            'tgl_ba_terima' => 'nullable|date',
        ]);

        // Update asset dengan data baru
        $asset->update($validated);

        return response()->json(['message' => 'Asset updated successfully'], 200);
    }


    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);

        $asset->delete();

        return redirect()->route('assets')->with('success', 'Data telah dipindahkan ke halaman sampah.');
    }

    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv'
    //     ]);

    //     $import = new AsetsImport();
    //     Excel::import($import, $request->file('file')->store('temp'));

    //     // Ambil data baru dan data duplikat dari AsetsImport
    //     $newDataCount = $import->getNewDataCount(); // Jumlah data baru yang berhasil ditambahkan
    //     $existingData = $import->getExistingData(); // Data duplikat yang ditemukan
    //     $duplicateCount = count($existingData);

    //     // Buat respons JSON untuk memberi tahu status
    //     if ($newDataCount > 0 && $duplicateCount > 0) {
    //         return response()->json([
    //             'status' => 'warning',
    //             'message' => "$newDataCount data berhasil ditambahkan, dan $duplicateCount data sudah diimpor sebelumnya.",
    //             'newDataCount' => $newDataCount // Kirim jumlah data baru
    //         ]);
    //     } elseif ($newDataCount > 0) {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => "$newDataCount data berhasil ditambahkan tanpa duplikat.",
    //             'newDataCount' => $newDataCount
    //         ]);
    //     } elseif ($duplicateCount > 0) {
    //         return response()->json([
    //             'status' => 'warning',
    //             'message' => "Semua file yang diimpor sudah ada di database. Tidak ada data baru yang ditambahkan."
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'info',
    //         'message' => "File tidak berisi data yang valid untuk diimpor."
    //     ]);
    // }



    public function import(Request $request)
    {
        // Validasi bahwa file harus ada dan memiliki ekstensi yang benar
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ], [
            'file.mimes' => 'File yang diupload harus memiliki ekstensi .xlsx, .xls, atau .csv.',
        ]);

        // Pastikan file yang diupload sesuai ekstensi
        $file = $request->file('file');
        if (!in_array($file->extension(), ['xlsx', 'xls', 'csv'])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ekstensi file tidak didukung. Hanya file dengan ekstensi .xlsx, .xls, atau .csv yang dapat diimpor.'
            ]);
        }

        // Proses import file
        $import = new AsetsImport();
        Excel::import($import, $file->store('temp'));

        // Ambil data yang sudah ada (duplikat) dan data baru
        $existingData = $import->getExistingData();
        $newData = $import->getNewData();

        $duplicateCount = count($existingData);
        $newDataCount = count($newData);

        // Cek jika tidak ada data baru yang diimpor
        if ($newDataCount === 0 && $duplicateCount > 0) {
            return response()->json([
                'status' => 'warning',
                'message' => 'File sudah pernah diupload sebelumnya, semua data adalah duplikat.'
            ]);
        }

        // Jika ada data duplikat, berikan peringatan
        if ($duplicateCount > 0) {
            return response()->json([
                'status' => 'warning',
                'message' => 'Berhasil diimpor, namun ada ' . $duplicateCount . ' data yang sudah diimpor.'
            ]);
        }

        // Jika tidak ada duplikat, beri pesan sukses
        return response()->json([
            'status' => 'success',
            'message' => 'File berhasil diimpor!'
        ]);
    }



    public function export()

    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
