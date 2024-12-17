<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\InventarisasiController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MutasiKeluarController;
use App\Http\Controllers\MutasiMasukController;
use App\Http\Controllers\PenghapusanController;
use App\Http\Controllers\PerolehanController;
use App\Http\Controllers\SampahController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Asset;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

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
        Route::get('/get-asals', 'getAsals')->name('getAsals');
        Route::get('/search-assets', 'search')->name('assets.search');
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

        Route::put('edit', 'changeStatus')->name('kerusakan.changeStatus');
        Route::post('edit/{id}', 'update')->name('kerusakan.update');
        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy.kerusakan');

        Route::get('/asets-mutasiKeluar-export', 'export')->name('exportAsset.kerusakan');
        Route::get('search', 'search')->name('assets.search.kerusakan');
    });

    Route::controller(PenghapusanController::class)->prefix('penghapusan')->group(function () {
        Route::get('', 'index')->name('penghapusan');

        Route::put('edit', 'changeStatus')->name('penghapusan.edit');
        Route::post('edit/{id}', 'update')->name('assets.update.penghapusan');
        Route::delete('destroy/{id}', 'destroy')->name('penghapusan.destroy');

        Route::get('search', 'search')->name('assets.search.penghapusan');
        Route::get('/asets-penghapusan-export', 'export')->name('exportAsset.penghapusan');
    });

    Route::controller(InventarisasiController::class)->prefix('inventarisasi')->group(function () {
        Route::get('', 'index')->name('inventarisasi');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

    Route::get('/user', function (HttpRequest $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::post('/asets-import', [AssetController::class, 'import'])->name('importAsset');
    Route::get('/asets-export', [AssetController::class, 'export'])->name('exportAsset');
});
