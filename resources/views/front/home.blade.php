@extends('front.layouts.app')

@section('content')

<section class = "home-hero-banner-section">
    
    <div class = "home-hero-banner-container">
        <div class="owl-carousel">
            <div class = "home-banner__img-wrapper">
                <img src="{{ asset('images/banner-2.png') }}" alt="Logo">
                <div class = "container banner-text-container">
                    <h1 class = "text-white">Handmade with Love <br>
                        and a touch of Magic</h1>
                </div>             
            </div>
            <div class = "home-banner__img-wrapper">
                <img src="{{ asset('images/c1.png') }}" alt="Logo">
                <div class = "container banner-text-container">
                    <h1 class = "text-white">Handmade with Love <br>
                        and a touch of Magic</h1>
                </div> 
            </div>
            <div class = "home-banner__img-wrapper">
                <img src="{{ asset('images/divider.png') }}" alt="Logo">
                <div class = "container banner-text-container">
                    <h1 class = "text-white">Handmade with Love <br>
                        and a touch of Magic</h1>
                </div> 
            </div>
        </div>
    </div>
    <div class = "container dots-container" >
        <div class = "hero-slider-dots">
        </div>
    </div>
</section>


    <section class = "banner-divider bg-gradient">
        <div class = "banner-divider__item">
            <div class = "banner-divider__item-img-wrapper">
                <img src="{{ asset('images/d1.png') }}" alt="Logo">
            </div>
            <h4 class = "text-white">
                Learn The<br>
                Essential Skills
            </h4>
        </div>
        <div class = "banner-divider__item">
            <div class = "banner-divider__item-img-wrapper">
                <img src="{{ asset('images/d2.png') }}" alt="Logo">
            </div>
            <h4 class = "text-white">
                Get Ready for<br>
                The Next Career
            </h4>
        </div>
        <div class = "banner-divider__item">
            <div class = "banner-divider__item-img-wrapper">
                <img src="{{ asset('images/d3.png') }}" alt="Logo">
            </div>
            <h4 class = "text-white">
                Master at <br>
                Different Areas
            </h4>
        </div>
    </section>
    
    <section class = "section-padding-top section-padding-bottom">
        <div class = "container">
            <div class = "common-container">
                <div class = "common-container__text-block">
                    <h2 class = "gradient-text">Explore Our Courses</h2>
                    <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                    <a href = "/courses" class = "btn-primary">
                        All Courses
                    </a>
                </div>
                <div>
                    <div class="common-container__item-block">
                        @foreach($courses as $course)
                            <div class="course-card">
                                <div class="course-card__img-wrapper">
                                    <img src="{{ asset($course->img_url) }}" alt="{{ $course->title }}">
                                </div>
                                <div class="course-card__content-wrapper">
                                    <h4 class="text-primary">
                                        {{ $course->title }}
                                    </h4>
                                    <p>
                                        {{ Str::limit($course->description, 150) }} <!-- Limit description to 150 characters -->
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @include('front.components.quick-cta')

    <section class = "section-padding-top section-padding-bottom">
        <div class = "container">
            <h2 class = "gradient-text">Our Mentors</h2>
            
            <div class="our-mentors-cards-wrapper">
                @foreach($mentors as $mentor)
                    <div class="our-mentors-card">
                        <div class="our-mentor-card__img-wrapper" style="background-color: aliceblue">
                            <img src="{{ asset($mentor->picture_url) }}" alt="{{ $mentor->first_name }} {{ $mentor->last_name }}">
                        </div>
                        <div class="our-mentor-card__text-wrapper">
                            <h4 class="text-primary">
                                {{ $mentor->first_name }} {{ $mentor->last_name }}
                            </h4>
                            <p>
                                {{ Str::limit($mentor->bio, 150) }} <!-- Assuming mentors have a bio field -->
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>

    <section class = "divider-section">
        <img src="{{ asset('images/divider.png') }}" alt="Logo">
    </section>

@endsection
