<?php

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
Route::get('/about', [PageViewController::class, 'showAboutPage']);
Route::get('/courses', [PageViewController::class, 'showCoursesPage']);
Route::get('/mentor', [PageViewController::class, 'showMentorPage']);