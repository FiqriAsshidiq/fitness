<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Providers\RouteServiceProvider;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telphone' => ['required', 'string', 'max:255', 'unique:users'], // ✅ ini diperbaiki
            'jenis_kelamin' => ['required'],
            'usia' => ['required', 'integer', 'min:10'],
            'tinggi_badan' => ['required', 'integer', 'min:100'],
            'berat_badan' => ['required', 'integer', 'min:30'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'foto_member' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_member')) {
            $fotoPath = $request->file('foto_member')->store('foto_member', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telphone' => $request->telphone,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'password' => Hash::make($request->password),
            'foto_member' => $fotoPath,            
            'role_id' => 3,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
