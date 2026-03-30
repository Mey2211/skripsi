<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordOtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        // validasi email
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // 🔢 INI YANG DIMAKSUD STEP 2 (generate OTP)
        $otp = rand(100000, 999999);

        // simpan ke database
        Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expired_at' => now()->addMinutes(5),
        ]);
        session(['email_otp' => $request->email]);
        Mail::to($request->email)->send(new SendOtpMail($otp));
        return back()->with('success', 'OTP berhasil dikirim');
    }

    public function verifyOtp(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    // cek OTP
    $otp = Otp::where('email', $request->email)
              ->where('otp', $request->otp)
              ->where('expired_at', '>', now())
              ->first();

    if (!$otp) {
        return back()->withErrors(['otp' => 'OTP tidak valid atau sudah kadaluarsa']);
    }

    // update password
    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    // hapus OTP setelah dipakai
    $otp->delete();

    return redirect('/login')->with('success', 'Password berhasil direset');
    }
}