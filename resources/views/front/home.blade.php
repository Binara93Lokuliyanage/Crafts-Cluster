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
            Unleash<br>Your Creativity
            </h4>
        </div>
        <div class = "banner-divider__item">
            <div class = "banner-divider__item-img-wrapper">
                <img src="{{ asset('images/d3.png') }}" alt="Logo">
            </div>
            <h4 class = "text-white">
                Master<br>
                Your Craft
            </h4>
        </div>
    </section>
    
    <section class = "section-padding-top ">
        <div class = "container">
            <div class = "common-container">
                <div class = "common-container__text-block">
                <img src="{{ asset('images/home.jpg') }}" alt="Logo" class = "home-jpg">
                    <!-- <h2 class = "gradient-text">Explore Our Courses</h2>
                    <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p> -->
                    <a href = "/courses" class = "btn-primary">
                        All Courses
                    </a>
                </div>
                <div>
                    <div class="" class = "course-leveller">
                    <h2 class = "gradient-text" >Explore Our Courses</h2>
                    
                    <div>
                    <h4 class = "gradient-secondary" style = "margin-top: 2rem">Find Your Charm Touch in the Beginner Guide Course</h4>
                    <p style = "margin-top: 1rem">Discover the Basics Start your crafting journey with our beginner guide course. Learn the fundamental skills and techniques that form the foundation of every great project. Our step-by-step lessons and hands-on activities will help you find your unique creative voice and charm</p>

                    <h4 class = "gradient-secondary" style = "margin-top: 2rem">Ignite Your Power with Advanced Training</h4>
                    <p style = "margin-top: 1rem">Elevate Your Craft Take your skills to the next level with our advanced training courses. Dive deeper into complex techniques and sophisticated projects designed to challenge and inspire you. Whether you’re refining your style or mastering new tools, our expert instructors are here to guide you every step of the way.</p>

                    <h4 class = "gradient-secondary" style = "margin-top: 2rem">Master the Art with One-on-One Training</h4>
                    <p style = "margin-top: 1rem">Personalized Instruction Achieve mastery with personalized, one-on-one training sessions. Work directly with our skilled artisans to receive tailored feedback and guidance. This bespoke approach ensures that your individual needs and creative goals are met, helping you become a true master of your craft.</p>
                    </div>

                    

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
                                {{ $mentor->first_name }} 
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

    @include('front.components.testimonials')

@endsection
