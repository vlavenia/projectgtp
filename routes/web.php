<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MutasiKeluarController;
use App\Http\Controllers\PenghapusanController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Asset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

        Route::get('create', 'create')->name('assets.create');
        Route::post('store', 'store')->name('assets.store');
        Route::get('show/{id}', 'show')->name('assets.show');
        Route::get('edit/{id}', 'edit')->name('assets.edit');
        Route::put('edit/{id}', 'update')->name('assets.update');
        Route::delete('destroy/{id}', 'destroy')->name('assets.destroy');
    });

    Route::controller(MutasiKeluarController::class)->prefix('mutasikeluar')->group(function () {
        Route::get('', 'index')->name('mutasikeluar');

        Route::put('edit', 'update')->name('mutasikeluar.edit');
    });


    Route::controller(AssetController::class)->prefix('perolehan')->group(function () {
        Route::get('', 'perolehan')->name('perolehan');
    });



    Route::controller(AssetController::class)->prefix('mutasiMasuk')->group(function () {
        Route::get('', 'mutasiMasuk')->name('mutasiMasuk');
    });



    Route::controller(KerusakanController::class)->prefix('kerusakan')->group(function () {
        Route::get('', 'index')->name('kerusakan');

        Route::put('edit', 'update')->name('kerusakan.edit');

    });

    Route::controller(PenghapusanController::class)->prefix('penghapusan')->group(function () {
        Route::get('', 'index')->name('penghapusan');

        Route::put('edit', 'update')->name('penghapusan.edit');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

    // import-export
    Route::get('/user', function (HttpRequest $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::post('/asets-import', [AssetController::class, 'import'])->name('importAsset');
    Route::get('/asets-export', [AssetController::class, 'export'])->name('exportAsset');
});
