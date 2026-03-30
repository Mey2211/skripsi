<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherProfile;
use Illuminate\Support\Facades\Auth;

class TeacherProfileController extends Controller
{
    public function create()
    {
        return view('guru.profile');
    }

    public function store(Request $request)
    {
        TeacherProfile::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'experience' => $request->experience,
            'education' => $request->education,
            'price' => $request->price,
            'availability' => $request->availability,
            'gender' => $request->gender,
            'jenjang' => $request->jenjang,
            'detail' => $request->detail,
            'status' => 'pending' 
        ]);

        return redirect()->route('guru.dashboard')->with('success','Profil berhasil disimpan');
    }
}