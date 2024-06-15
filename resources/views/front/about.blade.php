@extends('front.layouts.app')

@section('content')

<section class = "page-banner-section">
    <img src="{{ asset('images/p-banner-1.png') }}" alt="Logo">
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Who We Are</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__two-col-block">
                    <div class = "two-col-card">
                        <h3 class = "text-primary">Vision</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales. Fusce tincidunt, lorem at faucibus elementum, nisl magna cursus felis, sed malesuada urna nisl at purus.</p>
                    </div>
                    <div class = "two-col-card">
                        <h3 class = "text-primary">Mission</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec est at libero ullamcorper sodales. Fusce tincidunt, lorem at faucibus elementum, nisl magna cursus felis, sed malesuada urna nisl at purus.</p>
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
        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Our Team</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__team-card-block">
                    <div class = "team-card">
                        <div class = "team-card__member-wrapper">
                            <div class = "team-card__member-img-wrapper">
                                <img src="{{ asset('images/member.png') }}" alt="Logo">
                            </div>
                            <div>
                                <p class = "text-primary">Name</p>
                                <p style = "margin: 0">Position</p>
                            </div>
                        </div>
                        <p>
                            Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                        </p>
                    </div>
                    <div class = "team-card">
                        <div class = "team-card__member-wrapper">
                            <div class = "team-card__member-img-wrapper">
                                <img src="{{ asset('images/member.png') }}" alt="Logo">
                            </div>
                            <div>
                                <p class = "text-primary">Name</p>
                                <p style = "margin: 0">Position</p>
                            </div>
                        </div>
                        <p>
                            Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                        </p>
                    </div>
                    <div class = "team-card">
                        <div class = "team-card__member-wrapper">
                            <div class = "team-card__member-img-wrapper">
                                <img src="{{ asset('images/member.png') }}" alt="Logo">
                            </div>
                            <div>
                                <p class = "text-primary">Name</p>
                                <p style = "margin: 0">Position</p>
                            </div>
                        </div>
                        <p>
                            Start your crafting journey with easy-to-follow tutorials that cover essential techniques and foundational skills.
                        </p>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Our Values</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__value-card-block">
                    
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Value one</h3>
                    </div>
                </div>
            </div>
            
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
