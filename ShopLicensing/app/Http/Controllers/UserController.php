<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'is_admin' => 'required|boolean',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User added successfully.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'is_admin' => 'required|boolean',
        'password' => 'nullable|string|min:8', // Add password validation
    ]);

    $user = User::find($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->is_admin = $request->input('is_admin');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password')); // Hash the new password
    }

    $user->save();

    return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
}

    public function destroy($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        } else {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }
    
}
