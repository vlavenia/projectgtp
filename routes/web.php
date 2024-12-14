<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\InventarisasiController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MutasiKeluarController;
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

        Route::delete('/counters', 'getCounters')->name('get.counters');
        Route::get('/filter-assets', 'filter')->name('filter.assets');
        Route::get('/search-assets', 'search')->name('assets.search');
    });

    Route::post('/objek/{id}', [DropdownController::class, 'getObjek']);

    Route::controller(PerolehanController::class)->prefix('perolehan')->group(function () {
        Route::get('', 'index')->name('perolehan');

        Route::put('edit/{id}', 'update')->name('assets.update.perolehan');
        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy.perolehan');
    });

    Route::controller(MutasiKeluarController::class)->prefix('mutasikeluar')->group(function () {
        Route::get('', 'index')->name('mutasikeluar');
        Route::put('editStatus', 'changeStatus')->name('mutasikeluar.changeStatus');
        Route::put('editAsset/{id}', 'update')->name('mutasiKeluar.update');
        Route::delete('destroy/{id}', 'destroy')->name('mutasiKeluar.destroy');
    });

    Route::controller(AssetController::class)->prefix('mutasiMasuk')->group(function () {
        Route::get('', 'mutasiMasuk')->name('mutasiMasuk');
    });

    Route::controller(SampahController::class)->prefix('sampah')->group(function () {
        Route::get('', 'trash')->name('sampah');

        Route::get('/assets/trash', [SampahController::class, 'trash'])->name('assets.trash');
        Route::post('/assets/restore/{id}', [SampahController::class, 'restore'])->name('assets.restore');
        Route::delete('/assets/force-delete/{id}', [SampahController::class, 'forceDelete'])->name('assets.forceDelete');
    });

    Route::controller(KerusakanController::class)->prefix('kerusakan')->group(function () {
        Route::get('', 'index')->name('kerusakan');

        Route::put('edit', 'update')->name('kerusakan.edit');
    });

    Route::controller(PenghapusanController::class)->prefix('penghapusan')->group(function () {
        Route::get('', 'index')->name('penghapusan');

        Route::put('edit', 'update')->name('penghapusan.edit');
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
