<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengubah role.');
        }

        return view('users.edit', compact($user));
    }

    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user->update([
            'role' => $request->role
        ]);

        // DIPERBAIKI: Menggunakan 'users.index'
        return redirect()->route('users.index')->with('success', 'Role user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $user->delete();
        // DIPERBAIKI: Menggunakan 'users.index'
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
