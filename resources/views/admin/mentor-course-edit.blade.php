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
            <div class="form-container">
                <h3 class = "text-primary">Edit Course</h3>

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.mentor.course.update', $mentorCourse->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Display course details for editing -->
                    <div class="form-group">
                        <div class = "two-col">
                            <div>
                                <label for="title">Course Title</label>
                                <input type="text" id="title" name="title"
                                    value="{{ old('title', $mentorCourse->title) }}" required>
                            </div>
                            <div>
                                <label for="price">Price</label>
                                <input type="text" id="price" name="price"
                                    value="{{ old('price', $mentorCourse->price) }}" required>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4" required>{{ old('description', $mentorCourse->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <div class = "two-col">
                            <div>
                                <label for="img_url">Course Image</label>
                                <input type="file" id="img_url" name="img_url">
                            </div>
                            <img src="{{ asset($mentorCourse->img_url) }}" alt="Course Image" style="width: 200px;">
                        </div>


                    </div>


                    <div class="form-group form-btn-wrapper">
                        <button type="submit" class="btn btn-primary">Update Course</button>
                    </div>
                    <a href="{{ route('admin.mentor.course.lessons.index', $mentorCourse->id) }}" class="btn btn-secondary">View Lessons</a>

                </form>
            </div>
        </div>
    </div>
@endsection
