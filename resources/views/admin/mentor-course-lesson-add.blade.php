@extends('admin.layouts.app')

@section('content')

    <div class="container mt-5">
        <h2>Add Lesson for {{ $mentorCourse->title }}</h2>
        <form action="{{ route('admin.lesson.store', $mentorCourse->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="form-group">
                <label for="lesson">Lesson Content</label>
                <textarea id="lesson" name="lesson" required>{{ old('lesson') }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="video_url">Upload Video</label>
                <input type="file" id="video_url" name="video_url" required>
            </div>

            <div class="form-group form-btn-wrapper">
                <button type="submit" class="btn btn-primary">Add Lesson</button>
            </div>
        </form>
    </div>
@endsection
