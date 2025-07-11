<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserMenuController extends Controller
{
    public function index()
    {
        $user = User::select('id', 'name','email','created_at','role_id')->get();
        return view('usermenu.index', compact('user'));
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

        $user->update($validated);

        return redirect()->route('usermenu')->with('success', 'User updated successfully');
    }


}
