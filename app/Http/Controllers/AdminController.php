<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TeacherProfile;

class AdminController extends Controller
{
    public function dashboard()
    {
        $gurus = User::where('role', 'guru')
                    ->where('status', 'pending')
                    ->get();

        return view('admin.dashboard', compact('gurus'));
    }

    public function approve($id)
    {
        $guru = User::findOrFail($id);

        $guru->status = 'approved';
        $guru->save();

        return redirect()->route('admin.dashboard')
        ->with('success','Guru berhasil di approve');
    }

    public function approveTeacher()
    {

    $teachers = User::where('role','guru')
                    ->where('status','pending')
                    ->get();

    return view('admin.approve_teacher', compact('teachers'));
    }
    
    public function teacherProfiles()
    {
    $profiles = TeacherProfile::where('status','pending')->get();

    return view('admin.teacher_profiles', compact('profiles'));
    }

    public function approveProfile($id)
    {
    $profile = TeacherProfile::findOrFail($id);
    $profile->status = 'approved';
    $profile->save();

    return back()->with('success','Profil guru berhasil di approve');
    }

    public function pendingProfiles()
    {
    $profiles = TeacherProfile::where('status','pending')->get();

    return view('admin.teacher_profiles', compact('profiles'));
    }
}