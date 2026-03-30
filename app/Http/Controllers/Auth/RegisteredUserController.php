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
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required','in:guru,siswa'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'email.unique' => 'Maaf, email Anda sudah terdaftar',
        ]);
        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        // Login user
        Auth::login($user);

        // Jika guru masih pending, langsung logout
        if ($user->role == 'guru') {

            Auth::logout();

            return redirect('/login')->with(
                'error',
                'Pendaftaran berhasil. Akun Anda sedang menunggu persetujuan dari administrator sebelum dapat digunakan.'
            );
        }

        // Jika siswa langsung ke dashboard
        if ($user->role == 'siswa') {
            return redirect()->route('verification.notice');
        }

        return redirect('/');
    }
}