<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    //
    public function showHomePage() {
        $courses = Course::all(); // Fetch all courses
        $mentors = Mentor::where('status', 'active')->inRandomOrder()->take(4)->get(); // Fetch 4 random active mentors
    
        return view('front.home', compact('courses', 'mentors'));
    }
    public function showAboutPage() {

        return view('front.about');
    }
    public function showCoursesPage() {
        // Assuming 'category' is a field in your 'courses' table that contains 'basic', 'intermediate', and 'advanced'
        $basicCourses = Course::where('category_id', '1')->get();
        $intermediateCourses = Course::where('category_id', '2')->get();
        $advancedCourses = Course::where('category_id', '3')->get();
    
        return view('front.courses', compact('basicCourses', 'intermediateCourses', 'advancedCourses'));
    }
    public function showMentorPage() {

        return view('front.become-a-mentor');
    }
}
