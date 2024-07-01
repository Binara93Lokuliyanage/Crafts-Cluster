@extends('front.layouts.app')

@section('content')

<section class = "page-banner-section">
    <img src="{{ asset('images/p-banner-1.png') }}" alt="Logo">
</section>

<section class = "section-padding-top section-padding-bottom">
    <div class = "container">
        <div class = "common-container">
            <div class = "common-container__text-block">
                <h2 class = "gradient-text">Contact Us</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__form-block">
                    <form action="{{ url('/submit-form') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div class="form-group">
                            <div class="two-col">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                </div>
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <div class="two-col">
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div>
                                    <label for="contact">Contact Number</label>
                                    <input type="text" id="contact" name="contact" value="{{ old('contact') }}" required>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label for="message">Your Message</label>
                           <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                        </div>
            
            
                        <div class="form-group form-btn-wrapper">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

@include('front.components.quick-cta')

@include('front.components.testimonials')

<section class = "divider-section">
    <img src="{{ asset('images/divider.png') }}" alt="Logo">
</section>

@endsection
