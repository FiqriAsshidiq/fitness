<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash; // ← Tambahkan baris ini

class UserController extends Controller
{
    public function index()
    {
        $data['roles'] = Role::all(); 
        $data['users'] = User::with('role')->get(); 
        return view('admin.user.index', $data); 
    }

    // edit
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.user.edit', compact('user'));
    }

    // reset password
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        // Reset password ke nilai default
        $user->password = Hash::make('password123');
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Password berhasil direset ke default');
    }

    // hapus
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus.');
    }
}
