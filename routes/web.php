<?php

use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\MentorController;
use App\Http\Controllers\Back\StudentController;
use App\Http\Controllers\Front\PageViewController;
use Illuminate\Support\Facades\Route;
use App\Models\Mentor;

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
Route::get('/about', [PageViewController::class, 'showAboutPage']);
Route::get('/courses', [PageViewController::class, 'showCoursesPage']);
Route::get('/mentor', [PageViewController::class, 'showMentorPage']);
Route::get('/contact', [PageViewController::class, 'showContactPage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/mentor/dashboard', [MentorController::class, 'dashboard'])->name('mentor.dashboard');
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');


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

Route::get('/mentor/mentor-courses', [MentorController::class, 'mentorCourses'])->name('mentor.courses');
Route::get('/admin/mentor-courses/{id}/edit', [MentorController::class, 'edit'])->name('admin.mentor.course.edit');
Route::patch('/admin/mentor-courses/{id}', [MentorController::class, 'update'])->name('admin.mentor.course.update');
Route::get('/admin/mentor-courses/{mentor_course}/lessons', [MentorController::class, 'index'])
    ->name('admin.mentor.course.lessons.index');
Route::get('admin/mentor-course/{mentorCourse}/lesson/{lesson}/edit', [MentorController::class, 'editLesson'])->name('admin.lesson.edit');
Route::patch('admin/mentor-course/{mentorCourse}/lesson/{lesson}', [MentorController::class, 'updateLesson'])->name('admin.lesson.update');
Route::post('/admin/mentor-courses', [MentorController::class, 'store'])->name('admin.mentor.course.store');
Route::get('/admin/mentor-courses/add', [MentorController::class, 'add'])->name('admin.mentor.course.add');
Route::get('admin/mentor-course/{mentorCourse}/lessons/create', [MentorController::class, 'createLesson'])->name('admin.lesson.create');
Route::post('admin/mentor-course/{mentorCourse}/lessons', [MentorController::class, 'storeLesson'])->name('admin.lesson.store');
Route::get('/mentor/mentor-orders', [MentorController::class, 'orders'])->name('admin.mentor.orders');
Route::get('/mentor/mentor-wallet', [MentorController::class, 'getWallet'])->name('admin.mentor.wallet');


Route::get('/student/student-wallet', [StudentController::class, 'getWallet'])->name('admin.student.wallet');
Route::get('/student/courses', [StudentController::class, 'showCourses'])->name('admin.student.courses');
Route::get('student/courses/{course}/mentor-courses', [StudentController::class, 'showMentorCourses'])->name('student.mentor.course.index');
Route::get('/courses/purchased/{studentCourseId}', [StudentController::class, 'showPurchasedCourse'])->name('courses.purchased.show');


Route::get('/cart/{mentorCourseId}', [StudentController::class, 'show'])->name('cart.show');
Route::post('/cart/pay', [StudentController::class, 'pay'])->name('cart.pay');

// web.php

Route::get('/student/purchased-courses', [StudentController::class, 'purchasedCourses'])->name('student.courses.purchased');










