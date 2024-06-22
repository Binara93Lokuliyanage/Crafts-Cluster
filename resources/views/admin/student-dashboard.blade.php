@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">
        
            <div class = "container">
                <div class = "student-dashboard">
                    <div class = "student-info-block">
                        <div class = "student-info__img-wrapper">
                            <img src="{{ asset($student->picture_url) }}" >
                        </div>
                        <div class = "student-info__info-wrapper">
                            <h3 class = "text-primary"> {{ $student->first_name }} {{ $student->last_name }}</h3>
                            <p> {{ $user->email }} </p>
                        </div>
                    </div>
                    <div class = "student-course-info-block">
                        <div class = "student-info__item">
                            <h3> Total Courses</h3>
                            <h3><strong>{{ $purchasedCoursesCount }}</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        


    </div>
@endsection
