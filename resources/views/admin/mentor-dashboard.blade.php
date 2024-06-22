@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">
        
            <div class = "container">
                <div class = "student-dashboard">
                    <div class = "student-info-block">
                        <div class = "student-info__img-wrapper">
                            <img src="{{ asset($mentor->picture_url) }}" >
                        </div>
                        <div class = "student-info__info-wrapper">
                            <h3 class = "text-primary"> {{ $mentor->first_name }} {{ $mentor->last_name }}</h3>
                            <p class = "text-secondary"> {{ $user->email }} </p>
                            <p> {{ $mentor->bio }} </p>
                        </div>
                    </div>
                    <div class = "student-course-info-block">
                        <div class = "student-info__item">
                            <h3> Total Courses</h3>
                            <h3><strong>{{ $mentorCourses}}</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        


    </div>
@endsection
