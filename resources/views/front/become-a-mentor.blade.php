@extends('front.layouts.app')

@section('content')

<section class = "page-banner-section">
    <img src="{{ asset('images/p-banner-1.png') }}" alt="Logo">
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Become a Mentor</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__form-block">
                    <form method="POST" action="contactForm" class="margin-default">
                        @csrf
        
                        <div class="">
                            <div class="grid-two-col">
        
                                <div>
        
                                    <div class="input-with-placeholder">
                                        <input type="text" id="first_name" name="first_name"
                                            placeholder="@lang('auth.fn-label')" class="first_name" required>
                                        <div class="placeholder-image" style="background-image: url(images/form/name.svg)">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-with-placeholder">
                                        <input type="text" id="last_name" name="last_name"
                                            placeholder="@lang('auth.ln-label')" class="last_name" required>
                                        <div class="placeholder-image" style="background-image: url(images/form/name.svg)">
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <div class="grid-two-col">
        
        
                                <div>
                                    <div class="input-with-placeholder">
                                        <input type="number" id="contact" name="contact" placeholder="@lang('auth.cn-label')"
                                            class="contact" required="">
                                        <div class="placeholder-image" style="background-image: url(images/form/contact.svg)">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-with-placeholder">
                                        <input type="email" id="email" name="email" placeholder="@lang('auth.email-label')"
                                            class="email" required>
                                        <div class="placeholder-image" style="background-image: url(images/form/email.svg)">
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <div>
                                <textarea id="message" name="message" placeholder="@lang('auth.msg-label')"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="owl-next">@lang('auth.frm-btn')</button>
                            </div>
                    </form>
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

@endsection