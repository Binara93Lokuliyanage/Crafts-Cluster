<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\MentorCourse;
use App\Models\MentorCourseLesson;
use App\Models\MentorWallet;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    //
    public function dashboard()
    {
        $userId = auth()->id();


        $user = User::find($userId);
        $userType = $user->type;


        $mentor = Mentor::where('user_id', $userId)->first();

        $mentorCourses = MentorCourse::where('mentor_id', $mentor->id)->count();

        if ($mentor) {
            $status = $mentor->status;
        } else {
            $status = null;
        }

        return view('admin.mentor-dashboard', ['user' => $user, 'mentorStatus' => $status, 'userType' => $userType, 'mentor' => $mentor, 'mentorCourses' => $mentorCourses]);
    }

    public function mentorCourses()
    {
        // Get the current logged-in user
        $user = Auth::user();
        $userType = $user->type;


        // Find the mentor associated with the user
        $mentor = Mentor::where('user_id', $user->id)->first();
        $status = $mentor->status;

        if (!$mentor) {
            return redirect()->back()->with('error', 'No mentor profile found.');
        }

        // Fetch the courses associated with the mentor
        $mentorCourses = $mentor->mentorCourses()->with(['course.category'])->get();

        // Pass the data to the view
        return view('admin.mentor-courses', [
            'mentor' => $mentor,
            'mentorCourses' => $mentorCourses,
            'mentorStatus' => $status,
            'userType' => $userType
        ]);
    }

    public function edit($id)
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        $mentor = Mentor::where('user_id', $user->id)->first();
        $status = $mentor->status;

        $mentorCourse = MentorCourse::findOrFail($id); // Fetch the mentor course by ID
        // Assuming you want to edit related course details, you can use $mentorCourse->course to fetch course details

        return view('admin.mentor-course-edit', [
            'mentorCourse' => $mentorCourse,
            'mentorStatus' => $status,
            'userType' => $userType
        ]);
    }


    public function add()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;

        $mentor = Mentor::where('user_id', $user->id)->first();
        $status = $mentor->status;

        $courses = Course::all();

        return view('admin.mentor-course-add', [
            'courses' => $courses,
            'mentorStatus' => $status,
            'userType' => $userType
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as per your needs
        ]);

        $mentorCourse = MentorCourse::find($id);


        $materialFile = '';

        if ($request->hasFile('img_url')) {
            $uploadedFile = $request->file('img_url');
            $materialFile = $uploadedFile->store('uploads/course-images', 'public');
        }

        $courseData = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ];

        if ($materialFile !== '') {
            $courseData['img_url'] = "storage/" . $materialFile;
        }




        $mentorCourse->update($courseData);

        $userId = auth()->id();
        $user = User::find($userId);
        $userType = $user->type;


        $mentor = Mentor::where('user_id', $user->id)->first();
        $status = $mentor->status;

        $mentorCourses = $mentor->mentorCourses()->with(['course.category'])->get();

        return view('admin.mentor-courses', [
            'mentor' => $mentor,
            'mentorCourses' => $mentorCourses,
            'mentorStatus' => $status,
            'userType' => $userType
        ])->with('success', 'Course updated successfully.');
    }

    public function index(MentorCourse $mentor_course)
    {
        $lessons = $mentor_course->MentorCourseLessons()->get();

        $user = Auth::user();
        $userType = $user->type;


        // Find the mentor associated with the user
        $mentor = Mentor::where('user_id', $user->id)->first();
        $status = $mentor->status;

        return view('admin.mentor-course-lessons', [
            'mentorCourse' => $mentor_course,
            'lessons' => $lessons,
            'mentorStatus' => $status,
            'userType' => $userType
        ]);
    }

    public function editLesson($mentorCourseId, $lessonId)
{
    $mentorCourse = MentorCourse::findOrFail($mentorCourseId);
    $lesson = MentorCourseLesson::findOrFail($lessonId);

    // Get the current logged-in user
    $user = Auth::user();
    $userType = $user->type;

    // Find the mentor associated with the user
    $mentor = Mentor::where('user_id', $user->id)->first();
    $mentorStatus = $mentor ? $mentor->status : null;

    return view('admin.mentor-course-lesson-edit', compact('mentorCourse', 'lesson', 'user', 'userType', 'mentor', 'mentorStatus'));
}

public function updateLesson(Request $request, $mentorCourseId, $lessonId)
{

    $materialFile = '';

    if ($request->hasFile('video_url')) {
        $uploadedFile = $request->file('video_url');
        $materialFile = $uploadedFile->store('uploads/course-images', 'public');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'lesson' => 'required|string'
    ]);

    $lessonData = [
        'title' => $request->title,
        'lesson' => $request->lesson,
    ];

    if ($materialFile !== '') {
        $lessonData['video_url'] = "storage/".$materialFile;
    }


    $lesson = MentorCourseLesson::findOrFail($lessonId);
    
    $lesson->update($lessonData);

    $user = Auth::user();
    $userType = $user->type;

    // Find the mentor associated with the user
    $mentor = Mentor::where('user_id', $user->id)->first();
    $mentorStatus = $mentor ? $mentor->status : null;

    $mentorCourse = MentorCourse::find($mentorCourseId);
    $lessons = $mentorCourse->MentorCourseLessons()->get();

    return view('admin.mentor-course-lessons', [
        'mentorCourse' => $mentorCourse,
        'userType' => $userType,
        'mentorStatus' => $mentorStatus,
        'lessons' => $lessons
    ])->with('success', 'Lesson updated successfully.');;

    
}

public function store(Request $request)
{
    $materialFile = '';

    if ($request->hasFile('img_url')) {
        $uploadedFile = $request->file('img_url');
        $materialFile = $uploadedFile->store('uploads/course-images', 'public');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric'
    ]);

    $mentor = Mentor::where('user_id', Auth::id())->firstOrFail();

    $mentorCourse = new MentorCourse([
        'course_id' => $request->course_id,
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'mentor_id' => $mentor->id,
        'img_url' => $materialFile ? "storage/" . $materialFile : null,
    ]);

    

    $mentorCourse->save();
    

    return $this->mentorCourses();
}

public function storeLesson(Request $request, $mentorCourseId)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'lesson' => 'required|string',
        'video_url' => 'required|file|mimes:mp4,avi,mov,flv'
    ]);

    $materialFile = '';

    if ($request->hasFile('video_url')) {
        $uploadedFile = $request->file('video_url');
        $materialFile = $uploadedFile->store('uploads/course-videos', 'public');
    }

    $lessonData = [
        'mentor_course_id' => $mentorCourseId,
        'title' => $request->title,
        'lesson' => $request->lesson,
        'video_url' => $materialFile ? "storage/" . $materialFile : null,
    ];

    MentorCourseLesson::create($lessonData);

    $user = Auth::user();
    $userType = $user->type;
    $mentor = Mentor::where('user_id', $user->id)->first();
    $status = $mentor ? $mentor->status : null;

    $mentorCourse = MentorCourse::findOrFail($mentorCourseId);
    $lessons = $mentorCourse->mentorCourseLessons;

    return view('admin.mentor-course-lessons', [
        'mentorCourse' => $mentorCourse,
        'lessons' => $lessons,
        'mentorStatus' => $status,
        'userType' => $userType
    ])->with('success', 'Lesson added successfully.');
}

public function createLesson($mentorCourseId)
{
    $mentorCourse = MentorCourse::findOrFail($mentorCourseId);

    $user = Auth::user();
    $userType = $user->type;
    $mentor = Mentor::where('user_id', $user->id)->first();
    $status = $mentor ? $mentor->status : null;

    return view('admin.mentor-course-lesson-add', [
        'mentorCourse' => $mentorCourse,
        'mentorStatus' => $status,
        'userType' => $userType
    ]);

}

public function orders()
    {
        $userId = auth()->id();


        $user = User::find($userId);
        $userType = $user->type;


        $mentor = Mentor::where('user_id', $userId)->first();

        $orders = Order::where('mentor_id', $mentor->id)->get();

        if ($mentor) {
            $status = $mentor->status;
        } else {
            $status = null;
        }

        return view('admin.mentor-orders', ['user' => $user, 'mentorStatus' => $status, 'userType' => $userType, 'mentor' => $mentor, 'orders' => $orders]);
    }


    public function getWallet()
    {
        $userId = auth()->id();


        $user = User::find($userId);
        $userType = $user->type;


        $mentor = Mentor::where('user_id', $userId)->first();
        $wallet = MentorWallet::where('mentor_id', $mentor->id)->first();

        $status = Mentor::where('user_id', $userId)->pluck('status')->first();

        return view('admin.mentor-wallet', ['mentorStatus' => $status, 'userType' => $userType, 'wallet' => $wallet]);
    }

}
