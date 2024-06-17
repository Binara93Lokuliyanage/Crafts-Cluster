@extends('admin.layouts.app')

@section('content')
    <div class="admin-main-wrapper section-padding-top section-padding-bottom">
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
                <div class="admin-title-container">
                    <h3 class="text-primary">Courses offered by our Mentors for {{ $course->title }}</h3>
                </div>

                <div class="four-blocks-container">
                    @foreach ($mentorCourses as $mentorCourse)
                        <div href="{{ route('admin.mentor.course.edit', $mentorCourse->id) }}" class="course-card">
                            <div class="course-card__img-wrapper">
                                <img src="{{ asset($mentorCourse->img_url) }}" alt="Mentor Course Image">
                            </div>
                            <div class="course-card__content-wrapper">
                                <div>
                                    <h4 class="text-primary">
                                        {{ $mentorCourse->title }}
                                    </h4>
                                    <p class="text-secondary">by {{ $mentorCourse->mentor->first_name }} {{ $mentorCourse->mentor->last_name }}</p>
                                </div>
                                <p>
                                    {{ $mentorCourse->description }}
                                </p>
                                <div class = "purchase-tag">
                                    <a href="{{ route('cart.show', $mentorCourse->id) }}" class="purchase-btn">Purchase</a>
                                    <h3 >
                                        $ {{ $mentorCourse->price }}
                                    </h3>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>   
            </div>
        </div>
    </div>
@endsection
