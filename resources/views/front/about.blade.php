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
                <p>At Crafts Cluster, we are passionate about empowering individuals to explore and develop their creative talents. Our platform offers a wide range of expertly curated craft courses designed to cater to all skill levels, from beginners to seasoned artisans. We believe that everyone has the potential to create something beautiful, and we are here to provide the tools, knowledge, and community to make that happen.</p>
                
            </div>
            <div>
                <div class = "common-container__two-col-block">
                    <div class = "two-col-card">
                        <h3 class = "text-primary">Our Vision</h3>
                        <p class = "text-center mission-text">Our vision is to become the leading online destination for craft education, where creativity knows no bounds. We envision a world where people of all ages and backgrounds can explore their artistic passions, develop new skills, and share their creations with a global community. Through innovation and dedication, we aspire to make crafting an integral part of everyone’s life.</p>
                    </div>
                    <div class = "two-col-card">
                        <h3 class = "text-primary">Our Mission</h3>
                        <p class = "text-center mission-text"">Our mission is to inspire and nurture creativity in every individual. We aim to provide accessible, high-quality craft education that encourages lifelong learning and artistic expression. By connecting learners with expert instructors and a supportive community, we strive to foster an environment where creativity can flourish.</p>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

@include('front.components.quick-cta')



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
                        <h3 class = "text-primary">Creativity</h3>
                        
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Quality</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Community</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Accessibility</h3>
                    </div>
                    <div class = "value-card">
                        <img src="{{ asset('images/star.png') }}" alt="Logo">
                        <h3 class = "text-primary">Lifelong Learning</h3>
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
                <h2 class = "gradient-text">Contact Us</h2>
                <p>Unlock your creativity with our comprehensive range of craft courses designed for all skill levels. Whether you’re a beginner eager to learn the basics or an experienced crafter looking to refine your techniques, our expertly curated courses offer something for everyone.</p>
                
            </div>
            <div>
                <div class = "common-container__form-block">
                    <form action="" method="POST" enctype="multipart/form-data">
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

<section class = "divider-section">
    <img src="{{ asset('images/divider.png') }}" alt="Logo">
</section>

@endsection
