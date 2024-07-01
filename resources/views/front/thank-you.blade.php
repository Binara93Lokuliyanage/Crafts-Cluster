@extends('front.layouts.app')

@section('content')


<section class = "section-padding-top section-padding-bottom">
    <div class = "container text-center">
    <h2 class = "gradient-text">Thank You !</h2>
    <p style="margin-top: 24px;">Thank you for reaching out to us. <br>
    We have received your message and our team will get back to you as soon as possible.<br>
     Your inquiry is important to us, and we strive to respond within 24 hours</p>
        
    </div>
</section>

@include('front.components.quick-cta')



<section class = "divider-section">
    <img src="{{ asset('images/divider.png') }}" alt="Logo">
</section>

@endsection
