<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TeacherProfile;

class StudentController extends Controller
{
    public function teachers()
    {
        $teachers = TeacherProfile::where('status','approved')->get();

        return view('student.teachers', compact('teachers'));
    }

    public function index(Request $request)
    {

    $teachers = TeacherProfile::where('status','approved');

    if($request->subject){
        $teachers->where('subject','like','%'.$request->subject.'%');
    }

    if($request->max_price){
        $teachers->where('price','<=',$request->max_price);
    }

    if($request->gender){
        $teachers->where('gender',$request->gender);
    }

    $teachers = $teachers->get();

    return view('dashboard',compact('teachers'));

    }
}
