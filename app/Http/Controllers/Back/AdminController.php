<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {

        $userId = auth()->id();

   
        $user = User::find($userId);
        $userType = $user->type;

        return view('admin.admin-dashboard', ['userType' => $userType]);
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

        

        $materialFile = '';

        if ($request->hasFile('img_url')) {
            $uploadedFile = $request->file('img_url');
            $materialFile = $uploadedFile->store('uploads/course-images', 'public');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $courseData = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
        ];

        if ($materialFile !== '') {
            $courseData['img_url'] = "storage/".$materialFile;
        }

        

        $course->update($courseData);

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
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:'.$request->min_price,
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $courseData = $request->except('img_url');
        
        if ($request->hasFile('img_url')) {
            $courseData['img_url'] = "storage/".$request->file('img_url')->store('uploads/course-images', 'public');
        }

        Course::create($courseData);

        return redirect()->route('admin.courses')->with('success', 'Course added successfully.');
    }

}
