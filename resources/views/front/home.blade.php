@extends('front.layouts.app')

@section('content')
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
                    <a class = "btn-primary">
                        Read more
                    </a>
                </div>
                <div>
                    <div class = "common-container__item-block">
                        <div class = "course-card">
                            <div class = "course-card__img-wrapper">
                                <img src="{{ asset('images/c1.png') }}" alt="Logo">
                            </div>
                            <div class = "course-card__content-wrapper">
                                <h4 class = "text-primary">
                                    Course 1
                                </h4>
                                <p>
                                    Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                                </p>
                            </div>
                        </div>
                        <div class = "course-card">
                            <div class = "course-card__img-wrapper">
                                <img src="{{ asset('images/c1.png') }}" alt="Logo">
                            </div>
                            <div class = "course-card__content-wrapper">
                                <h4 class = "text-primary">
                                    Course 1
                                </h4>
                                <p>
                                    Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                                </p>
                            </div>
                        </div>
                        <div class = "course-card">
                            <div class = "course-card__img-wrapper">
                                <img src="{{ asset('images/c1.png') }}" alt="Logo">
                            </div>
                            <div class = "course-card__content-wrapper">
                                <h4 class = "text-primary">
                                    Course 1
                                </h4>
                                <p>
                                    Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class = "section-padding-top section-padding-bottom">
        <div class = "container register-cta-container">
            <div class = "register-cta-item">
                <div>
                    <h3 class = "gradient-text">Become a Mentor</h3>
                    <p class="margin-top">Register today to <br>start your teaching journey</p>
                </div>
                <a class = "btn-primary">
                    Register
                </a>
            </div>
            <div class = "register-cta-item">
                <div>
                    <h3 class = "gradient-text">Access to Education</h3>
                    <p class="margin-top">
                        Create an account <br>
                        to start learning at Crafts Cluster
                    </p>
                </div>
                <a class = "btn-primary">
                    Sign up
                </a>
            </div>
            
        </div>
    </section>

    <section class = "section-padding-top section-padding-bottom">
        <div class = "container">
            <h2 class = "gradient-text">Our Mentors</h2>
            
            <div class = "our-mentors-cards-wrapper">
                <div class = "our-mentors-card">
                    <div class = "our-mentor-card__img-wrapper">
                        <img src="{{ asset('images/mentor.png') }}" alt="Logo">
                    </div>
                    <div class = "our-mentor-card__text-wrapper">
                        <h4 class = "text-primary">
                            Mentor Name
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales.</p>
                                <h3 class = "text-secondary" style="text-align: right">
                                    4.7
                                </h3>
                    </div>
                </div>

                <div class = "our-mentors-card">
                    <div class = "our-mentor-card__img-wrapper">
                        <img src="{{ asset('images/mentor.png') }}" alt="Logo">
                    </div>
                    <div class = "our-mentor-card__text-wrapper">
                        <h4 class = "text-primary">
                            Mentor Name
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales.</p>
                                <h3 class = "text-secondary" style="text-align: right">
                                    4.7
                                </h3>
                    </div>
                </div>

                <div class = "our-mentors-card">
                    <div class = "our-mentor-card__img-wrapper">
                        <img src="{{ asset('images/mentor.png') }}" alt="Logo">
                    </div>
                    <div class = "our-mentor-card__text-wrapper">
                        <h4 class = "text-primary">
                            Mentor Name
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales.</p>
                                <h3 class = "text-secondary" style="text-align: right">
                                    4.7
                                </h3>
                    </div>
                </div>

                <div class = "our-mentors-card">
                    <div class = "our-mentor-card__img-wrapper">
                        <img src="{{ asset('images/mentor.png') }}" alt="Logo">
                    </div>
                    <div class = "our-mentor-card__text-wrapper">
                        <h4 class = "text-primary">
                            Mentor Name
                        </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales.</p>
                                <h3 class = "text-secondary" style="text-align: right">
                                    4.7
                                </h3>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <section class = "divider-section">
        <img src="{{ asset('images/divider.png') }}" alt="Logo">
    </section>

@endsection
