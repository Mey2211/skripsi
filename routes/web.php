<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruDashboardController;
use App\Http\Controllers\TeacherProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Models\TeacherProfile;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ForgotPasswordOtpController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $teachers = TeacherProfile::where('status','approved')
                ->latest()
                ->take(3)
                ->get();

    return view('welcome', compact('teachers'));

});

/*
|--------------------------------------------------------------------------
| Dashboard Student
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $teachers = TeacherProfile::where('status','approved')->get();
    return view('dashboard', compact('teachers'));

})->middleware(['auth','verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Teacher Detail 
|--------------------------------------------------------------------------
*/

Route::get('/teacher/{id}', function ($id) {

    $teacher = TeacherProfile::findOrFail($id);
    return view('teacher.detail', compact('teacher'));

})->name('teacher.detail');


/*
|--------------------------------------------------------------------------
| Profile User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Guru Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard-guru', [GuruDashboardController::class, 'index'])
        ->name('guru.dashboard');

});


/*
|--------------------------------------------------------------------------
| Guru Profile
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/guru/profile', [TeacherProfileController::class,'create'])
        ->name('guru.profile');

    Route::post('/guru/profile', [TeacherProfileController::class,'store'])
        ->name('guru.profile.store');

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::get('/admin/approve/{id}', [AdminController::class, 'approve'])
    ->name('admin.approve');

Route::get('/admin/approve-teacher', [AdminController::class, 'approveTeacher'])
    ->name('admin.approve_teachers');

Route::get('/admin/teacher-profiles', [AdminController::class,'teacherProfiles'])
    ->name('admin.teacher_profiles');

Route::get('/admin/approve-profile/{id}', [AdminController::class,'approveProfile'])
    ->name('admin.approve_profile');


/*
|--------------------------------------------------------------------------
| Student
|--------------------------------------------------------------------------
*/

Route::get('/teachers', [StudentController::class,'teachers'])
    ->name('teachers');

//verifikasi email//
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';

//OTP
Route::get('/forgot-password-otp', function () {
    return view('auth.forgot-password-otp');
})->name('forgot.password.otp');

Route::post('/send-otp', [ForgotPasswordOtpController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-otp', [ForgotPasswordOtpController::class, 'verifyOtp'])->name('verify.otp');