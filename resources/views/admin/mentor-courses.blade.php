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
            <a href = "{{ route('admin.mentor.course.add') }}" class = "cta-btn">Add New</a>
            <div class="table-container">



                <div class = "admin-title-container">
                    <h3 class = "text-primary">My Courses</h3>
                    
                </div>
                <div class = "four-blocks-container">
                    @foreach ($mentorCourses as $mentorCourse)
                    <a href="{{ route('admin.mentor.course.edit', $mentorCourse->id) }}" class = "course-card">
                        <div class = "course-card__img-wrapper">
                            <img src="{{ asset($mentorCourse->img_url) }}" alt="Course Image">
                        </div>
                        <div class = "course-card__content-wrapper">
                            <div>
                                <h4 class = "text-primary">
                                    {{ $mentorCourse->title }}
                                </h4>
                                <p class = "text-secondary">{{ $mentorCourse->course->title }} - {{ $mentorCourse->course->category->name }}</p>
                            </div>
                            
                            <p>
                                {{ $mentorCourse->description }}
                            </p>
                            <h3 class = "price-tag">
                                CA$ {{ $mentorCourse->price }}
                            </h3>
                        </div>
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
@endsection
