@extends('front.layouts.app')

@section('content')

<div class="admin-main-wrapper section-padding-top section-padding-bottom">
    <div class="container">
        <div class="course-detail">
            <div class="course-detail__img-wrapper">
                <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
            </div>
            <div class="course-detail__content-wrapper">
                <h1 class="text-primary">{{ $course->title }}</h1>
                <p class="text-secondary">{{ $course->category->name }}</p>
                <p>{{ $course->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
