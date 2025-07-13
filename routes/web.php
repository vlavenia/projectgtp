<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\InventarisasiController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\KibaController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanKibController;
use App\Http\Controllers\MutasiKeluarController;
use App\Http\Controllers\MutasiMasukController;
use App\Http\Controllers\ObjekController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenghapusanController;
use App\Http\Controllers\PerolehanController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserMenuController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Asset;

Route::get('/', function () {
    // return view('auth/login');
    return view('dashboard');
})->middleware('auth')->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware(['auth', 'role:admin,balai,pengelola'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(AssetController::class)->prefix('assets')->group(function () {
        Route::get('', 'index')->name('assets');

        // Route::get('create', 'create')->name('assets.create');
        Route::post('store', 'store')->name('assets.store');
        Route::get('show/{id}', 'show')->name('assets.show');
        // Route::get('edit/{id}', 'edit')->name('assets.edit');
        Route::put('edit/{id}', 'update')->name('assets.update');
        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy');

        Route::delete('/assets/count', 'getCounters')->name('assets.count');
        #

        Route::get('/filter-assets', 'filter')->name('filter.assets');
        Route::get('/search-assets', 'search')->name('assets.search');

        Route::get('/get-asals', 'getAsals')->name('getAsals');
        Route::get('/get-unit', 'getUnit')->name('getUnit');
        Route::get('/get-jenis', 'getJenis')->name('getJenis');
        Route::get('/get-objek', 'getObjek')->name('getObjek');
        Route::get('/get-Klasifikasi', 'getKlasifikasi')->name('getKlasifikasi');
    });

    Route::post('/objek/{id}', [DropdownController::class, 'getObjek']);
    // Route::post('/asals', [DropdownController::class, 'getAsals'])->name('get.asals');

    Route::controller(PerolehanController::class)->prefix('perolehan')->group(function () {
        Route::get('', 'index')->name('perolehan');
        Route::post('store', 'store')->name('assets.store.perolehan');
        Route::post('edit/{id}', 'update')->name('assets.update.perolehan');
        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy.perolehan');

        Route::get('search', 'search')->name('assets.search.perolehan');
        Route::get('/asets-perolehan-export', 'exportPerolehan')->name('exportAsset.perolehan');
    });

    Route::controller(MutasiKeluarController::class)->prefix('mutasikeluar')->group(function () {
        Route::get('', 'index')->name('mutasikeluar');

        Route::put('editStatus', 'changeStatus')->name('mutasikeluar.changeStatus');
        Route::post('editAsset/{id}', 'update')->name('mutasiKeluar.update');
        Route::delete('destroy/{id}', 'destroy')->name('mutasiKeluar.destroy');
        Route::post('restore/{id}', 'restore')->name('mutasiKeluar.restore');

        Route::get('search', 'search')->name('assets.search.mutasiKeluar');
        Route::get('/asets-mutasiKeluar-export', 'export')->name('exportAsset.mutasiKeluar');
    });

    Route::controller(MutasiMasukController::class)->prefix('mutasiMasuk')->group(function () {
        Route::get('', 'index')->name('mutasiMasuk');
        Route::post('store', 'store')->name('mutasiMasuk.store');
        Route::post('edit/{id}', 'update')->name('mutasiMasuk.update');
        Route::delete('destroy/{id}', 'destroy')->name('mutasimasuk.destroy');

        Route::get('search', 'search')->name('mutasiMasuk.search');
        Route::get('/asets-mutasiMasuk-export', 'export')->name('exportAsset.mutasiMasuk');
    });

    Route::controller(SampahController::class)->prefix('sampah')->group(function () {
        Route::get('', 'trash')->name('sampah');

        Route::get('/assets/trash', [SampahController::class, 'trash'])->name('assets.trash');
        Route::post('/assets/restore/{id}', [SampahController::class, 'restore'])->name('assets.restore');
        Route::delete('/assets/force-delete/{id}', [SampahController::class, 'forceDelete'])->name('assets.forceDelete');
    });

    Route::controller(KerusakanController::class)->prefix('kerusakan')->group(function () {
        Route::get('', 'index')->name('kerusakan');

        Route::put('edit', 'AddKerusakan')->name('kerusakan.add');
        Route::post('edit/{id}', 'updateStatus')->name('kerusakan.updateStatus');
        Route::post('return/{id}', 'ReturnKerusakan')->name('assets.return.kerusakan');

        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy.kerusakan');
        Route::post('edit/{id}', 'update')->name('kerusakan.update');
        Route::get('/asets-mutasiKeluar-export', 'export')->name('exportAsset.kerusakan');
        Route::get('search', 'search')->name('assets.search.kerusakan');
    });

    //Peminjaman
    Route::controller(PeminjamanController::class)->prefix('peminjaman')->group(function () {
        //pengelola
        Route::get('', 'index')->name('peminjaman');
        //staf
        Route::get('staf', 'peminjaman_staf')->name('peminjaman_staf');
        Route::put('edit', 'addPeminjaman')->name('peminjaman.addpeminjaman');
        Route::post('return/{id}', 'returnPeminjaman')->name('ReturnPeminjaman');
        Route::delete('destroy/{id}', 'destroyPeminjaman')->name('assets.destroy.peminjaman');

        Route::get('search-pengelola', 'search_pengelola')->name('search.pengelola');
        Route::get('search-staf', 'search_staf')->name('search.staf');


        // Route::post('edit/{id}', 'update')->name('peminjaman.update');

        // Route::get('/asets-mutasiKeluar-export', 'export')->name('exportAsset.peminjaman');

        Route::get('approvePeminjaman/{id}', 'approvePeminjaman')->name('approvePeminjaman');
    });

    Route::controller(PenghapusanController::class)->prefix('penghapusan')->group(function () {
        Route::get('', 'index')->name('penghapusan');

        Route::put('edit', 'changeStatus')->name('penghapusan.edit');
        Route::post('edit/{id}', 'update')->name('assets.update.penghapusan');
        Route::get('search', 'search')->name('assets.search.penghapusan');
        Route::delete('destroy/{id}', 'destroy')->name('penghapusan.destroy');
        Route::post('restore/{id}', 'restore')->name('assets.restore.penghapusan');

        Route::get('/asets-penghapusan-export', 'export')->name('exportAsset.penghapusan');
    });

    Route::controller(LaporanKibController::class)->prefix('kib')->group(function () {
        Route::get('/a', 'kiba')->name('kibaExport');
        Route::get('/b', 'kibb')->name('kibbExport');
        Route::get('/c', 'kibc')->name('kibcExport');
        Route::get('/d', 'kib_d')->name('kib-d');
        Route::get('/e', 'kib_e')->name('kib-e');
        Route::get('/f', 'kib_f')->name('kib-f');
        Route::get('/atb', 'kib_atb')->name('kib-atb');
    });

    // Route::controller(KibaController::class)->prefix('kib')->group(function () {
    //     Route::get('/a', 'index')->name('kiba');
    //     Route::get('/a/export', 'export')->name('kibaExport');
    // });


    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

    // Route::get('/user-menu', [App\Http\Controllers\UserMenuController::class, 'index'])->name('usermenu');



    Route::get('/user', function (HttpRequest $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::post('/asets-import', [AssetController::class, 'import'])->name('importAsset');
    Route::get('/asets-export', [AssetController::class, 'export'])->name('exportAsset');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(UserMenuController::class)->prefix('usermenu')->group(function () {
        Route::get('', 'index')->name('usermenu');
        Route::post('/update/{id}', 'update')->name('usermenu.update');
    });
    Route::controller(UnitController::class)->prefix('unit')->group(function () {
        Route::get('', 'index')->name('unit');
        Route::post('/update/{id}', 'update')->name('unit.update');
        Route::post('/add', 'add')->name('unit.add');
        Route::post('/delete/{id}', 'delete')->name('unit.delete');
    });
    Route::controller(JenisController::class)->prefix('jenis')->group(function () {
        Route::get('', 'index')->name('jenis');
        Route::post('/update/{id}', 'update')->name('jenis.update');
        Route::post('/add', 'add')->name('jenis.add');
        Route::post('/delete/{id}', 'delete')->name('jenis.delete');

        Route::post('/addObjek', 'addObjek')->name('addObjek');

    });
    Route::controller(ObjekController::class)->prefix('objek')->group(function () {
        Route::get('', 'index')->name('objek');
        Route::post('/update/{id}', 'update')->name('objek.update');
        Route::post('/add', 'add')->name('objek.add');
        Route::post('/delete/{id}', 'delete')->name('objek.delete');
    });
    Route::controller(KlasifikasiController::class)->prefix('klasifikasi')->group(function () {
        Route::get('', 'index')->name('klasifikasi');
        Route::post('/update/{id}', 'update')->name('klasifikasi.update');
        Route::post('/add', 'add')->name('klasifikasi.add');
        Route::post('/delete/{id}', 'delete')->name('klasifikasi.delete');
    });
});

Route::middleware(['auth', 'role:Pengelola'])->group(function () {
    // Route::controller(UserMenuController::class)->prefix('usermenu')->group(function () {
    //     Route::get('', 'index')->name('usermenu');
    // });
});


// ROUTES LAPORAN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(LaporanController::class)->prefix('laporan')->group(function () {
        Route::get('/laporanAset', 'laporanAset')->name('laporanAset');
        Route::post('/exportSemuaLaporanAset', 'exportSemuaLaporanAset')->name('exportSemuaLaporanAset');

        Route::get('/laporanUser', 'laporanUser')->name('laporanUser');
        Route::post('/exportLaporanUser', 'exportLaporanUser')->name('exportLaporanUser');

        Route::get('/laporanPeminjaman', 'laporanPeminjaman')->name('laporanPeminjaman');
    });
});
