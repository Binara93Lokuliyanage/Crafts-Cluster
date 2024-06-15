<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    //
    public function showHomePage() {

        return view('front.home');
    }
    public function showAboutPage() {

        return view('front.about');
    }
    public function showCoursesPage() {

        return view('front.courses');
    }
    public function showMentorPage() {

        return view('front.become-a-mentor');
    }
}
