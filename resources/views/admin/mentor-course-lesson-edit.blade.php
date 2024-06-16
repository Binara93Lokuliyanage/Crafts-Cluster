@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Edit Lesson for {{ $mentorCourse->title }}</h2>
        <form action="{{ route('admin.lesson.update', ['mentorCourse' => $mentorCourse->id, 'lesson' => $lesson->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
            </div>
            
            <div class="form-group">
                <label for="lesson">Lesson Content</label>
                <textarea id="lesson" name="lesson" required>{{ old('lesson', $lesson->lesson) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="video_url">Upload Video</label>
                <input type="file" id="video_url" name="video_url" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Lesson</button>
        </form>
    </div>
@endsection
