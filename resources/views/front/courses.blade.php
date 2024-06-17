@extends('front.layouts.app')

@section('content')

<section class = "page-banner-section">
    <img src="{{ asset('images/p-banner-1.png') }}" alt="Logo">
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <h2 class = "gradient-text">Beginner Courses</h2>
        
        <div class="our-mentors-cards-wrapper">
            @foreach($basicCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <h2 class = "gradient-text">Intermediate Courses</h2>
        
        <div class="our-mentors-cards-wrapper">
            @foreach($intermediateCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <h2 class = "gradient-text">Advanced Courses</h2>
        
        <div class="our-mentors-cards-wrapper">
            @foreach($advancedCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

@include('front.components.quick-cta')

<section class = "divider-section">
    <img src="{{ asset('images/divider.png') }}" alt="Logo">
</section>

@endsection