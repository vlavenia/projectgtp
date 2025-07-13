<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\objek;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ObjekController extends Controller
{
    public function index()
    {
        $jenises = Jenis::all();
        $objeks = objek::paginate(10);
        return view('objek.index', compact('objeks','jenises'));
    }

    public function update(Request $request, string $id)
    {
        $objek = objek::findOrFail($id);
        if (!$objek) {
            return response()->json(['message' => 'Objek not found'], 404);
        }

        $objek->nama_objek = $request->name;
        $objek->update();

        return redirect()->route('objek')->with('success', 'Objek updated successfully');
    }

    public function add(Request $request)
    {
        dd('test');
        $objek = new objek();
        $objek->nama_objek = $request->name;
        $objek->save();

        return redirect()->route('objek')->with('success', 'Objek add successfully');
    }

    public function delete($id){
        try {
            
            $objek = objek::findOrFail($id);
            if (!$objek) {
                return response()->json(['message' => 'Objek not found'], 404);
            }

            $objek->delete();
            return redirect()->route('objek')->with('success', 'Objek deleted successfully');

        } catch (\Throwable $th) {
                return redirect()->route('objek')->with('error', 'Failed to delete objek');
        }
       

    }


}
