<?php

namespace App\Http\Controllers;

use App\Models\MutasiKeluar;
use Illuminate\Http\Request;

class MutasiKeluarController extends Controller
{
    public function index()
    {
        // $asset = MutasiKeluar::orderBy('created_at', 'DESC')->get();

        // return view('assets.index');
        return view('mutasiKeluar.index');
    }

}
