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
                <h3 class="text-primary">{{ $studentCourse->mentorCourse->title }}</h3>
            </div>
            <div class="course-level-tag">{{ $studentCourse->mentorCourse->course->category->name }}</div>

            <div class="cart-container">
                <div class="cart-item__basic-block">
                    <div class="cart-item__img-wrapper">
                        <video id="lesson-video" src="{{ asset($studentCourse->mentorCourse->mentorCourseLessons[0]->video_url) }}" controls></video>
                    </div>
                    <div class="cart-item__basic-details">
                        <h4 id="lesson-title" class="text-primary">{{ $studentCourse->mentorCourse->mentorCourseLessons[0]->title }}</h4>
                        <p id="lesson-description" style="margin-top: 1.5rem;">{{ $studentCourse->mentorCourse->mentorCourseLessons[0]->lesson }}</p>
                    </div>
                </div>
                <div class="cart-item__lessons-overview">
                    <div class="lesson-cards-wrapper" style="margin-top: 0">
                        @foreach ($studentCourse->mentorCourse->mentorCourseLessons as $index => $lesson)
                            <div class="lesson-card" style="background-color: rgba(218, 218, 218, 0.3)">
                                <h3>{{ sprintf('%02d', $loop->iteration) }}</h3>
                                <div>
                                    <h3>{{ $lesson->title }}</h3>
                                    <p>{{ Str::limit($lesson->lesson, 100) }}</p>
                                    <button class="view-lesson-btn" data-index="{{ $index }}">View Lesson</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.view-lesson-btn').forEach(button => {
    button.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        const lessons = @json($studentCourse->mentorCourse->mentorCourseLessons);

        // Update the video source, title, and description
        document.getElementById('lesson-video').src = '{{ asset('') }}' + lessons[index].video_url;
        document.getElementById('lesson-title').textContent = lessons[index].title;
        document.getElementById('lesson-description').textContent = lessons[index].lesson;
    });
});
</script>

@endsection
