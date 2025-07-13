<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UnitController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $units = Unit::paginate(10);
        return view('unit.index', compact('units'));
    }

    public function update(Request $request, string $id)
    {
        $unit = Unit::findOrFail($id);
        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        $unit->nama_unit = $request->name;
        $unit->update();

        return redirect()->route('unit')->with('success', 'Unit updated successfully');
    }

    public function add(Request $request)
    {
        $unit = new Unit();
        $unit->nama_unit = $request->name;
        $unit->save();

        return redirect()->route('unit')->with('success', 'Unit add successfully');
    }

    public function delete($id){
        $unit = Unit::findOrFail($id);
        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }
        $unit->delete();

        return redirect()->route('unit')->with('success', 'Unit deleted successfully');
    }


}
