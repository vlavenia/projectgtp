<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\objek;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JenisController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $jenises = Jenis::paginate(10);
        return view('jenis.index', compact('jenises'));
    }

    public function update(Request $request, string $id)
    {
        $jenis = Jenis::findOrFail($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis not found'], 404);
        }

        $jenis->jenis_asset = $request->name;
        $jenis->update();

        return redirect()->route('jenis')->with('success', 'Jenis updated successfully');
    }

    public function add(Request $request)
    {
        $jenis = new Jenis();
        $jenis->jenis_asset = $request->name;
        $jenis->save();

        return redirect()->route('jenis')->with('success', 'Jenis add successfully');
    }
    public function addObjek(Request $request)
    {
        $jenis = new objek();
        $jenis->nama_objek = $request->name;
        $jenis->jenis_id = $request->jenis_id;
        $jenis->save();

        return redirect()->route('objek')->with('success', 'Jenis add successfully');
    }

    public function delete($id){
        $jenis = Jenis::findOrFail($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis not found'], 404);
        }
        $jenis->delete();

        return redirect()->route('jenis')->with('success', 'Jenis deleted successfully');
    }


}
