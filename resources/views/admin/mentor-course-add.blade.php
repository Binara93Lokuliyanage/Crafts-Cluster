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

            <div class="form-container">
                <h3 class="text-primary">Add New Course</h3>

                <form action="{{ route('admin.mentor.course.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Display fields for new course creation -->
                    <div class="form-group">
                        <label for="course_id">Select Original Course</label>
                        <select id="course_id" name="course_id" required>
                            <option value="">-- Select Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="two-col">
                            <div>
                                <label for="title">Course Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div>
                                <label for="price">Price</label>
                                <input type="text" id="price" name="price" value="{{ old('price') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <div class="two-col">
                            <div>
                                <label for="img_url">Course Image</label>
                                <input type="file" id="img_url" name="img_url" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-btn-wrapper">
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
