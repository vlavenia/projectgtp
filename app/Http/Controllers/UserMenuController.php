<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserMenuController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::leftJoin('role','role.id','=','users.role_id')
                        ->select('users.id',
                                    'users.name',
                                    'users.email',
                                    'users.password',
                                    'users.created_at',
                                    'users.role_id',
                                    'role.role_name'
                                )
                        ->get();
        return view('usermenu.index', compact('users','roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'role_id' => 'nullable|exists:role,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if (!Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->password);
        }
        // $user->update($validated);
        $user->update();

        return redirect()->route('usermenu')->with('success', 'User updated successfully');
    }


}
