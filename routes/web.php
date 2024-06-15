<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Front\PageViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageViewController::class, 'showHomePage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Route::get('/mentor/dashboard', [MentorController::class, 'dashboard'])->name('mentor.dashboard');
// Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');


Route::get('/admin/mentor-request', [AdminController::class, 'mentorRequest'])->name('admin.mentor-request');
Route::get('/admin/mentors', [AdminController::class, 'mentors'])->name('admin.mentors');
Route::patch('/admin/mentor-request/approve/{id}', [AdminController::class, 'approveMentor'])->name('admin.mentor.approve');
Route::delete('/admin/mentor-request/decline/{id}', [AdminController::class, 'declineMentor'])->name('admin.mentor.decline');


Route::get('/admin/courses', [AdminController::class, 'showCourses'])->name('admin.courses');
Route::get('/admin/course/edit/{id}', [AdminController::class, 'editCourse'])->name('admin.course.edit');
Route::delete('/admin/course/delete/{id}', [AdminController::class, 'deleteCourse'])->name('admin.course.delete');
Route::patch('/admin/course/update/{id}', [AdminController::class, 'updateCourse'])->name('admin.course.update');
Route::get('/admin/course/add', [AdminController::class, 'addCourse'])->name('admin.course.add');
Route::post('/admin/course/store', [AdminController::class, 'storeCourse'])->name('admin.course.store');
