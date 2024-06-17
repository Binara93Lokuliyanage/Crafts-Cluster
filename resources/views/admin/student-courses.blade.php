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
           
            <div class="table-container">


                
                <div class = "admin-title-container">
                    <h3 class = "text-primary">I like to specialise :</h3>
                <div class="select-container">
                    
                    <select id="category" name="category" onchange="changeCategory(this)">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class = "four-blocks-container">
                    @foreach ($courses as $course)
                    <a href="{{ route('student.mentor.course.index', $course->id) }}" class = "course-card" data-category="{{ $course->category_id }}">
                        <div class = "course-card__img-wrapper">
                            <img src="{{ asset($course->img_url) }}" alt="Course Image">
                        </div>
                        <div class = "course-card__content-wrapper">
                            <div>
                                <h4 class = "text-primary">
                                    {{ $course->title }}
                                </h4>
                                <p class = "text-secondary">{{ $course->category->name }}</p>
                            </div>
                            
                            <p>
                                {{ $course->description }}
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>   
            </div>
        </div>
    </div>

    <script>
        function changeCategory(select) {
            let categoryId = select.value;
            let cards = document.querySelectorAll('.course-card');

            cards.forEach(card => {
                let category = card.getAttribute('data-category');
                if (categoryId && categoryId !== '' && categoryId !== category) {
                    card.style.display = 'none';
                } else {
                    card.style.display = 'block';
                }
            });
        }
    </script>
@endsection
