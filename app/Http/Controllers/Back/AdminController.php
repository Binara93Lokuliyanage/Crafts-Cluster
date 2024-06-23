<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        // Fetch the number of inactive mentor requests
        $inactiveMentorRequests = Mentor::where('status', 'inactive')->count();

        // Calculate the income from the past 7 days
        $sevenDaysAgo = \Carbon\Carbon::now()->subDays(7);
        $incomeLastSevenDays = Order::where('created_at', '>=', $sevenDaysAgo)
            ->sum('company_earning');

        return view('admin.admin-dashboard', [
            'userType' => $userType,
            'inactiveMentorRequests' => $inactiveMentorRequests,
            'incomeLastSevenDays' => $incomeLastSevenDays
        ]);
    }


    public function mentorRequest()
    {
        // Fetch mentors where status is inactive
        $inactiveMentors = Mentor::where('status', 'inactive')->get();

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        // Pass the data to the view
        return view('admin.mentor-request', ['mentors' => $inactiveMentors, 'userType' => $userType]);
    }

    public function mentors()
    {
        // Fetch mentors where status is inactive
        $activeMentors = Mentor::where('status', 'active')->get();

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        // Pass the data to the view
        return view('admin.mentors', ['mentors' => $activeMentors, 'userType' => $userType]);
    }

    public function approveMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->status = 'active';
        $mentor->save();

        return redirect()->route('admin.mentor-request')->with('success', 'Mentor approved successfully.');
    }

    public function declineMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        $userId = $mentor->user_id;

        // Delete the mentor
        $mentor->delete();

        // Delete the related user
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('admin.mentor-request')->with('success', 'Mentor declined and related user deleted successfully.');
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
        return view('admin.admin-courses', ['courses' => $courses, 'categories' => $categories, 'userType' => $userType]);
    }

    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        return view('admin.admin-course-edit', ['course' => $course, 'categories' => $categories, 'userType' => $userType]);
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::find($id);
        $category = Category::find($course->category_id);


       

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $categoryData = [
            'name' => $request->title
        ];

        $courseData = [
            'title' => $request->title,
            'description' => $request->description
        ];



        $course->update($courseData);
        $category->update($categoryData);

        return redirect()->route('admin.courses')->with('success', 'Course updated successfully.');
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully.');
    }

    public function addCourse()
    {

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        $categories = Category::all();
        return view('admin.admin-course-add', ['categories' => $categories, 'userType' => $userType]);
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $categoryData = [
            'name' => $request->title
        ];

        $category = Category::create($categoryData);

        $courseData = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $category->id,
            'min_price' => 0,
            'max_price' => 0,
            'img_url' => 'abc'
        ];

        Course::create($courseData);

        return redirect()->route('admin.courses')->with('success', 'Course added successfully.');
    }

    public function business()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        // Get the start and end of the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();



        // Fetch orders for the current month
        $orders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();

        // Calculate the income of the last month
        $lastMonthIncome = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('company_earning');

        $orders = Order::all();
        $totalIncome = $orders->sum('company_earning');

        $startOfMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfMonth = Carbon::now()->subMonth()->endOfMonth();

        // Query orders for last month
        $lastMonthIncomereal = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('company_earning');

        // Pass the data to the view
        return view('admin.admin-business', [
            'userType' => $userType,
            'orders' => $orders,
            'lastMonthIncome' => $lastMonthIncome,
            'lastMonthIncomereal' => $lastMonthIncomereal,
            'totalIncome' => $totalIncome
        ]);
    }
}
