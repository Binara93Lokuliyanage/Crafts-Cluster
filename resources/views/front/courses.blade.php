@extends('front.layouts.app')

@section('content')

<section class = "page-banner-section">
    <img src="{{ asset('images/p-banner-1.png') }}" alt="Logo">
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <h2 class = "gradient-text">Free to Join</h2>
        <p style = "margin-top: 1.25rem;"><strong>Discover Your Passion Without Commitment</strong><br> Explore a variety of introductory courses at no cost. Get a taste of our high-quality content and see how we can help you ignite your creative spark, all without any financial commitment.</p>
    
        
        <div class="our-mentors-cards-wrapper">
            @foreach($basicCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
    <h2 class = "gradient-text">Beginner Courses</h2>
    <p style = "margin-top: 1.25rem;"><strong>Build Your Foundation</strong><br> 
    Perfect for those new to crafting, our beginner courses cover the essential skills and techniques. Step-by-step guidance and hands-on projects will help you build a solid foundation and gain confidence in your abilities.</p>
        <div class="our-mentors-cards-wrapper">
            @foreach($intermediateCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
    <h2 class = "gradient-text">Advanced Courses</h2>
    <p style = "margin-top: 1.25rem;"><strong>Elevate Your Craft</strong><br>
    Designed for experienced crafters, our advanced courses delve deeper into complex techniques and intricate projects. Learn from experts, challenge yourself, and elevate your crafting to professional levels.</p>
        <div class="our-mentors-cards-wrapper">
            @foreach($advancedCourses as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
    <h2 class = "gradient-text">One-to-One Program</h2>
    <p style = "margin-top: 1.25rem;"><strong>Personalized Learning Experience</strong><br>
    Receive individualized attention and tailored instruction through our one-to-one program. Work closely with a mentor to refine your skills, get personalized feedback, and achieve your unique creative goals.</p>
        <div class="our-mentors-cards-wrapper">
            @foreach($oneonone as $course)
                <div class="course-card">
                    <div class="course-card__img-wrapper">
                        <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-card__content-wrapper">
                        <h4 class="text-primary">{{ $course->title }}</h4>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>

@include('front.components.quick-cta')


<section class = "divider-section">
    <img src="{{ asset('images/divider.png') }}" alt="Logo">
</section>

@include('front.components.testimonials')

@endsection