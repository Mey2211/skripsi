<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        // Jika guru masih pending
        if ($user->role == 'guru' && $user->status == 'pending') {
            Auth::logout();

            return redirect('/login')
                ->with('error', 'Akun anda masih menunggu persetujuan admin');
        }

        // Redirect admin
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Redirect guru
        if ($user->role == 'guru') {
            return redirect()->route('guru.dashboard');
        }

        // Redirect siswa
        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}