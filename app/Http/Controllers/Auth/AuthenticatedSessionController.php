<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 🔥 logout dulu biar session bersih
        Auth::logout();

        // cek login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Email atau password salah');
        }

        $request->session()->regenerate();

        $user = auth()->user();

        // guru pending
        if ($user->role == 'guru' && $user->status == 'pending') {

            Auth::logout();

            return redirect('/login')->with(
                'error',
                'Maaf, akun Anda belum dapat digunakan karena masih menunggu persetujuan dari administrator.'
            );
        }

        // admin
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // guru approved
        if ($user->role == 'guru' && $user->status == 'approved') {
            return redirect()->route('guru.dashboard');
        }

        // siswa
        if ($user->role == 'siswa') {
            return redirect()->route('dashboard');
        }

        return redirect('/');
    }

    /**
     * Handle logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}