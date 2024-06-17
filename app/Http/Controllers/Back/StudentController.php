<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\MentorCourse;
use App\Models\MentorWallet;
use App\Models\Order;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StudentWallet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //

    public function dashboard()
    {
        $userId = auth()->id();


        $user = User::find($userId);
        $userType = $user->type;


        $student = Student::where('user_id', $userId)->first();

        $status = "null";

        return view('admin.student-dashboard', ['mentorStatus' => $status, 'userType' => $userType]);
    }

    public function getWallet()
    {
        $userId = auth()->id();


        $user = User::find($userId);
        $userType = $user->type;


        $student = Student::where('user_id', $userId)->first();
        $wallet = StudentWallet::where('student_id', $student->id)->first();

        $status = "null";

        return view('admin.student-wallet', ['mentorStatus' => $status, 'userType' => $userType, 'wallet' => $wallet]);
    }

    public function showCourses()
    {
        // Fetch courses with their related categories where category_id is 1
        $courses = Course::all();
        $categories = Category::all();

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        // Pass the data to the view
        return view('admin.student-courses', ['courses' => $courses, 'categories' => $categories, 'userType' => $userType]);
    }

    public function showMentorCourses($courseId)
    {
        $course = Course::findOrFail($courseId);
        $mentorCourses = MentorCourse::with('mentor')
            ->where('course_id', $courseId)
            ->get();

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        return view('admin.student-mentor-course-list', [
            'course' => $course,
            'mentorCourses' => $mentorCourses,
            'userType' => $userType
        ]);
    }

    public function show($mentorCourseId)
    {
        $mentorCourse = MentorCourse::with('mentorCourseLessons')->findOrFail($mentorCourseId);
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $studentWallet = StudentWallet::where('student_id', $student->id)->first();


        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        return view('cart.show', [
            'mentorCourse' => $mentorCourse,
            'studentWallet' => $studentWallet,
            'userType' => $userType
        ]);
    }

    public function pay(Request $request)
    {
        $mentorCourseId = $request->input('mentor_course_id');
        $mentorCourse = MentorCourse::findOrFail($mentorCourseId);
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $studentWallet = StudentWallet::where('student_id', $student->id)->first();

        // Calculate the payments
        $orderAmount = $mentorCourse->price;
        $mentorPayment = $orderAmount * 0.80;
        $companyEarning = $orderAmount * 0.20;

        if ($studentWallet->remaining_amount >= $orderAmount) {
            // Deduct the amount from the student's wallet
            $studentWallet->remaining_amount -= $orderAmount;
            $studentWallet->total_spent += $orderAmount;
            $studentWallet->save();

            // Add the purchased course to the student_courses table
            StudentCourse::create([
                'student_id' => $student->id,
                'mentor_course_id' => $mentorCourse->id
            ]);

            // Update the mentor's wallet
            $mentorWallet = MentorWallet::where('mentor_id', $mentorCourse->mentor_id)->first();
            if ($mentorWallet) {
                $mentorWallet->remaining_amount += $mentorPayment;
                $mentorWallet->total_earnings += $mentorPayment;
                $mentorWallet->save();
            } else {
                // Create a new wallet entry if not exists
                MentorWallet::create([
                    'mentor_id' => $mentorCourse->mentor_id,
                    'remaining_amount' => $mentorPayment,
                    'withdraw_amount' => 0,
                    'total_earnings' => $mentorPayment,
                ]);
            }

            // Create an order record
            Order::create([
                'mentor_id' => $mentorCourse->mentor_id,
                'student_id' => $student->id,
                'order_amount' => $orderAmount,
                'mentor_payment' => $mentorPayment,
                'company_earning' => $companyEarning,
            ]);

            return redirect()->route('cart.show', $mentorCourseId)->with('success', 'Purchase successful!');
        } else {
            return redirect()->route('cart.show', $mentorCourseId)->with('error', 'Not enough credit.');
        }
    }


    public function purchasedCourses()
    {
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();
        $purchasedCourses = StudentCourse::where('student_id', $student->id)
            ->with('mentorCourse')
            ->get();


        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        return view('admin.student-purchased', [
            'purchasedCourses' => $purchasedCourses,
            'userType' => $userType
        ]);
    }
}
