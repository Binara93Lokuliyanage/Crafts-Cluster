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
        <h3 class = "text-primary">Add Course Type</h3>

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="two-col">
                    <div>
                        <label for="title">Course Type Name</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div>
                       
                    </div>
                </div>
            </div>

            <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                </div>

            

           

            <div class="form-group form-btn-wrapper">
                <a href="{{ route('admin.courses') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Course Type</button>
            </div>
        </form>
    </div>
    </div>
</div>


@endsection


