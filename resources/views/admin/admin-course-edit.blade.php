@extends('admin.layouts.app')

@section('content')

<div class = "admin-main-wrapper section-padding-top section-padding-bottom" >
    <!DOCTYPE html>

    <div class="container mt-5">
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <div class="form-container">
        <h3 class = "text-primary">Edit Course</h3>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <div class = "two-col">
                    <div>
                        <label for="name">Course Title</label>
                        <input type="text" id="title" name="title" value="{{ old('name', $course->title) }}" required>
                    </div>
                    <div>
                        <label for="category_id">Category</label>
                <select id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="form-group">
                <div class = "two-col">
                    <div>
                        <label for="name">Minimum Price (USD)</label>
                        <input type="text" id="min_price" name="min_price" value="{{ old('name', $course->min_price) }}" required>
                    </div>
                    <div>
                        <label for="name">Maximum Price (USD)</label>
                        <input type="text" id="max_price" name="max_price" value="{{ old('name', $course->max_price) }}" required>
                    </div>
                </div>
                
            </div>

            <div class="form-group">
                <div class = "two-col">
                    <div>
                        <label for="img_url">Course Image</label>
                        <input type="file" id="img_url" name="img_url">
                    </div>
                    <div>
                        <img src="{{ asset($course->img_url) }}" alt="Course Image" class="image-preview">
                    </div>
                </div>
                
            </div>

            <div class="form-group form-btn-wrapper">
                <a href="{{ route('admin.courses') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Course</button>
                
            </div>
        </form>
    </div>
    </div>
</div>

@endsection


