<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::paginate(10);
        return view('ruangan.index', compact('ruangans'));
    }

    public function update(Request $request, string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan not found'], 404);
        }

        $ruangan->nama_ruangan = $request->name;
        $ruangan->update();

        return redirect()->route('ruangan')->with('success', 'Ruangan updated successfully');
    }

    public function add(Request $request)
    {
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = $request->name;
        $ruangan->deskripsi = $request->deskripsi ? $request->deskripsi : '';
        $ruangan->save();

        return redirect()->route('ruangan')->with('success', 'Ruangan add successfully');
    }

    public function delete($id){
        $ruangan = Ruangan::findOrFail($id);
        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan not found'], 404);
        }
        $ruangan->delete();

        return redirect()->route('ruangan')->with('success', 'Ruangan deleted successfully');
    }


}
