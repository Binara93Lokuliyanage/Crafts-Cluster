@extends('admin.layouts.app')

@php
use Illuminate\Support\Str;
@endphp

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
            <div class="form-container">
                <h3 class="text-primary">{{ $mentorCourse->title }}</h3>
                <h4 class="text-primary">Lessons</h4>

                <div class="lesson-cards-wrapper">
                    @foreach ($lessons as $lesson)
                        <a href="{{ route('admin.lesson.edit', ['mentorCourse' => $mentorCourse->id, 'lesson' => $lesson->id]) }}" class="lesson-card">
                            <video src="{{ asset($lesson->video_url) }}" controls></video>
                            <div>
                                <h3>{{ $lesson->title }}</h3>
                                <p>{{ Str::limit($lesson->lesson, 100) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
