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

            <div class="table-container">
                <div class="admin-title-container">
                    <h3 class="text-primary">{{ $mentorCourse->title }}</h3>
                    
                </div>
                <div class = "course-level-tag">{{ $mentorCourse->course->category->name }}</div>

                <div class = "cart-container">
                    <div class = "cart-item__basic-block">
                        <div class = "cart-item__img-wrapper">
                            <img src="{{ asset($mentorCourse->img_url) }}" alt="Mentor Course Image">
                        </div>
                        <div class = "cart-item__basic-details">
                            <h4 class="text-primary" id = "top-up-link" style="cursor: pointer">By {{ $mentorCourse->mentor->first_name }} {{ $mentorCourse->mentor->last_name }}</h4>
                            <p class="text-secondary">Specialisation: {{ $mentorCourse->course->title }}</p>
                            <p>{{ $mentorCourse->description }}</p>
                        </div>
                        <div class="purchase-tag">
                            @if ($studentWallet->remaining_amount >= $mentorCourse->price)
                            <form action="{{ route('cart.pay') }}" method="POST">
                                @csrf
                                <input type="hidden" name="mentor_course_id" value="{{ $mentorCourse->id }}">
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>
                        @else
                            <div class="alert alert-error">
                                Not enough credit.<br>
                                <a href = "/student/student-wallet">
                                    Click here to top up your wallet now !
                                </a>
                            </div>
                        @endif
                            <h3>$ {{ $mentorCourse->price }}</h3>
                        </div>
                    </div>
                    <div class = "cart-item__lessons-overview">
                        <div class="lesson-cards-wrapper" style="margin-top: 0">
                            @foreach ($mentorCourse->mentorCourseLessons as $lesson)
                                <div class="lesson-card" style="background-color: rgba(218, 218, 218, 0.3)">
                                    <h3>{{ sprintf('%02d', $loop->iteration) }}</h3>
                                    <div>
                                        <h3>{{ $lesson->title }}</h3>
                                        <p>{{ Str::limit($lesson->lesson, 100) }}</p>
                                        <p class = "text-secondary">Purchase to access the content</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                
            </div>

            <div id="top-up-popup" class="popup">
                <div class="popup-content">
                    <span class="close-btn">&times;</span>
                    
                    <div class = "container">
                        <div class = "mentor-info-popup">
                            <div class = "student-info__img-wrapper">
                                <img src="{{ asset($mentorCourse->mentor->picture_url) }}" >
                            </div>
                            <div class = "student-course-info-block">
                                <div class = "student-info__item" style="display: block;">
                                    <h3 class= "text-primary" style=" margin-bottom: 1rem">{{ $mentorCourse->mentor->first_name }} {{ $mentorCourse->mentor->last_name }}</h3>
                                    {{ $mentorCourse->mentor->bio }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            var popup = $('#top-up-popup');
            var closeBtn = $('.close-btn');
    
            $('#top-up-link').click(function(event) {
                event.preventDefault();
                popup.show();
            });
    
            closeBtn.click(function() {
                popup.hide();
            });
    
            $(window).click(function(event) {
                if (event.target == popup[0]) {
                    popup.hide();
                }
            });
        });
    </script>

@endsection
