<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class KlasifikasiController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $klasifikasis = Klasifikasi::paginate(10);
        return view('klasifikasi.index', compact('klasifikasis'));
    }

    public function update(Request $request, string $id)
    {
        $klasifikasi = Klasifikasi::findOrFail($id);
        if (!$klasifikasi) {
            return response()->json(['message' => 'Klasifikasi not found'], 404);
        }

        $klasifikasi->nama_klasifikasi = $request->name;
        $klasifikasi->update();

        return redirect()->route('klasifikasi')->with('success', 'Klasifikasi updated successfully');
    }

    public function add(Request $request)
    {
        $klasifikasi = new Klasifikasi();
        $klasifikasi->nama_klasifikasi = $request->name;
        $klasifikasi->save();

        return redirect()->route('klasifikasi')->with('success', 'Klasifikasi add successfully');
    }

    public function delete($id){
        try {
            
            $klasifikasi = Klasifikasi::findOrFail($id);
            if (!$klasifikasi) {
                return response()->json(['message' => 'Klasifikasi not found'], 404);
            }

            $klasifikasi->delete();
            return redirect()->route('klasifikasi')->with('success', 'Klasifikasi deleted successfully');

        } catch (\Throwable $th) {
                return redirect()->route('klasifikasi')->with('error', 'Failed to delete klasifikasi');
        }
       

    }


}
