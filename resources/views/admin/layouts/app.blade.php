<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('meta')
        @include('admin.layouts.partials._metas', ['description' => '', 'title' => ''])
    @show

    <link rel="icon" href="{{asset( 'images/favicon.ico' )}}" type="image/x-icon">
    
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}?v1.6">

    <script src="https://cdn.tiny.cloud/1/fai8b6mnpy5vgivulhi2f49vkukzbg5ood0p7yldkfr6ix8k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/bodymovin/build/player/lottie.min.js"></script> --}}

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    @yield('styles-header')
    
    @yield('js-header')
    

</head>
<body >

    @include ('admin.layouts.partials.header')

    <div class="page-wrap">
        @yield('content')
    </div>
    
    @include ('admin.layouts.partials.footer')


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    {{-- <script src="{{ asset('front/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js')}}?v1.4"></script>
    <script type="text/javascript" src="{{asset('front/js/app.js')}}?v1.0"></script> --}}
    <script src="{{ asset('js/custom.js') }}?v1.1"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @yield('javascript')

</body>
</html>