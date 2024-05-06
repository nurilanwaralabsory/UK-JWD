<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\StudentController;
use App\Models\Buku;
use App\Models\Course;
use App\Models\Penerbit;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $courses = Course::all();
    return view('welcome', compact('courses'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::resource('student', StudentController::class);
    Route::resource('course', CourseController::class);

    Route::get('/admin', function () {
        $course = Course::all();
        $student = Student::all();
        return view('admin', compact('course', 'student'));

    })->name('admin');
});

require __DIR__ . '/auth.php';
