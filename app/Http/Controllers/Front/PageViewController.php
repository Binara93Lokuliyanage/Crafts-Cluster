<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Back\StudentController;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\MentorCourse;
use App\Models\Student;
use App\Models\StudentWallet;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    //
    public function showHomePage() {
        $courses = Course::with('category')->inRandomOrder()->take(3)->get();// Fetch all courses
        $mentors = Mentor::where('status', 'active')->inRandomOrder()->take(4)->get(); // Fetch 4 random active mentors
    
        return view('front.home', compact('courses', 'mentors'));
    }
    public function showAboutPage() {


        $mentors = Mentor::where('status', 'active')->inRandomOrder()->take(4)->get(); // Fetch 4 random active mentors
    
        return view('front.about', compact('mentors'));
    }
    public function showCoursesPage() {
        // Assuming 'category' is a field in your 'courses' table that contains 'basic', 'intermediate', and 'advanced'
        $basicCourses = MentorCourse::where('course_id', '1')->get();
        $intermediateCourses = MentorCourse::where('course_id', '2')->get();
        $advancedCourses = MentorCourse::where('course_id', '3')->get();
        $oneonone = MentorCourse::where('course_id', '4')->get();
    
        return view('front.courses', compact('basicCourses', 'intermediateCourses', 'advancedCourses', 'oneonone'));
    }
    public function showMentorPage() {

        return view('front.become-a-mentor');
    }

    public function showMemberPage() {

        return view('front.member');
    }

    public function showContactPage() {
        return view('front.contact');
    }

    public function showThanksPage() {
        return view('front.thank-you');
    }

    public function show($mentorCourseId)
    {
        $mentorCourse = MentorCourse::with('mentorCourseLessons')->findOrFail($mentorCourseId);
       

        return view('front.show', [
            'mentorCourse' => $mentorCourse
        ]);
    }

}
