<?php

namespace App\Http\Controllers;

use App\Models\objek;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function getObjek($id)
    {
        // Ambil objek berdasarkan jenis_id
        $objects = Objek::where('jenis_id', $id)->get();

        // Kembalikan data dalam format JSON
        return response()->json($objects);
    }
}
