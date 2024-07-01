@extends('front.layouts.app')

@section('content')

<div class="admin-main-wrapper section-padding-top section-padding-bottom">
    <div class="container">
    <div class="table-container">
                <div class="admin-title-container">
                    <h3 class="text-primary">{{ $mentorCourse->title }}</h3>
                    
                </div>
                <div class = "course-level-tag">{{ $mentorCourse->course->category->name }}</div>

                <div class = "cart-container">
                    <div class = "cart-item__basic-block">
                        <div class = "cart-item__img-wrapper">
                            <img src="{{ asset($mentorCourse->img_url) }}" alt="Mentor Course Image">
                        </div>
                        <div class = "cart-item__basic-details">
                            <h4 class="text-primary" id = "top-up-link" style="cursor: pointer">By {{ $mentorCourse->mentor->first_name }} {{ $mentorCourse->mentor->last_name }}</h4>
                            <p class="text-secondary">Specialisation: {{ $mentorCourse->course->title }}</p>
                            <p>{{ $mentorCourse->description }}</p>
                        </div>
                        <div class="purchase-tag">
                           
                            <div class="alert alert-error">
                                Please Login to Purchase this Course<br>
                                <a href = "/login">
                                    Login
                                </a>
                            </div>
                            <h3>CA$ {{ $mentorCourse->price }}</h3>
                        </div>
                    </div>
                    <div class = "cart-item__lessons-overview">
                        <div class="lesson-cards-wrapper" style="margin-top: 0">
                            @foreach ($mentorCourse->mentorCourseLessons as $lesson)
                                <div class="lesson-card" style="background-color: rgba(218, 218, 218, 0.3)">
                                    <h3>{{ sprintf('%02d', $loop->iteration) }}</h3>
                                    <div>
                                        <h3>{{ $lesson->title }}</h3>
                                        <p>{{ Str::limit($lesson->lesson, 100) }}</p>
                                        <p class = "text-secondary">Purchase to access the content</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                
            </div>
    </div>
</div>

@endsection
