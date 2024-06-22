@extends('admin.layouts.app')

@section('content')
<div class = "admin-main-wrapper section-padding-top section-padding-bottom">
    <!DOCTYPE html>

    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
       
        <div class="table-container">

            <div class = "admin-title-container">
                <h3 class = "text-primary">My Courses</h3>
            </div>

            <div class="four-blocks-container">
                @forelse ($purchasedCourses as $studentCourse)
                    <a href="{{ route('courses.purchased.show', $studentCourse->id) }}" class="course-card">
                        <div class="course-card__img-wrapper">
                            <img src="{{ asset($studentCourse->mentorCourse->img_url) }}" alt="Course Image">
                        </div>
                        <div class="course-card__content-wrapper">
                            <div>
                                <h4 class="text-primary">
                                    {{ $studentCourse->mentorCourse->title }}
                                </h4>
                                <p>by {{ $studentCourse->mentorCourse->mentor->first_name }} {{ $studentCourse->mentorCourse->mentor->last_name }}</p>
                            </div>
                            <p>{{ $studentCourse->mentorCourse->description }}</p>
                        </div>
                    </a>
                @empty
                    <p>No courses purchased yet.</p>
                @endforelse
            </div>  
        </div>
    </div>
</div>
@endsection
