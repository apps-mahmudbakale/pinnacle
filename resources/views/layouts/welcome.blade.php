<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Pinnacle Guest Inn</title>
    <meta name="description" content="Welcome to Pinnacle Guest Inn Where you get comfort you needed most." />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="author" content="Pinnacle Guest Inn">
    <meta name="keywords" content="restaurant, hotel, sokoto, good life, meal, cuisines, deserts, menu, Pinnacle, castle, Guest Inn, Pinnacle Guest Inn" />
    <meta property="og:title" content="Pinnacle Guest Inn" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Welcome to Pinnacle Guest Inn Where you get comfort you needed most." />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#212121"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/datepicker.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/colors/color.css')}}"/>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-design.png') }}">
</head>
<body>
    <nav id="menu-wrap" class="menu-back cbp-af-header">
        <div class="menu-top background-black">
            <div class="container">
                <div class="row">
                    <div class="col-6 px-0 px-md-3 pl-1 py-3">
                        <span class="call-top">call us:</span> <a href="#" class="call-top">(234) 813-301-1117</a>
                    </div>
                    <div class="col-6 px-0 px-md-3 py-3 text-right">
                        <a href="https://www.facebook.com/people/Pinnacle-Guest-Inn-Sokoto/61554111091543/" class="social-top">fb</a>
                        <a href="https://www.instagram.com/pinnacleguestinnsokoto/" class="social-top">tw</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/') }}">
                <div class="logo">
                    <img src="{{ asset('images/logo-design.png') }}" alt="">
                </div>
            </a>
            <ul>
                <li><a class="@yield('home_active')" href="{{ url('/') }}">home</a></li>
                <li><a class="@yield('about_active')" href="{{ url('about') }}">about us</a></li>
                <li><a class="@yield('rooms_active')" href="{{ url('room') }}">rooms</a></li>
                <li><a class="@yield('gallery_active')" href="{{ url('gallery') }}">Gallery</a></li>
                <li><a class="@yield('restaurant_active')" href="{{ url('restaurant') }}">Restaurants</a></li>
                <li><a class="@yield('contact_active')" href="{{ url('contact-us') }}">contact us</a></li>
                <li><a href="{{ url('contact-us') }}"><span>book now</span></a></li>
            </ul>
        </div>
    </nav>
        @yield('content')
    @include('partials.footer')
    <script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script> 
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/plugins.js')}}"></script>
	<script src="{{asset('js/flip-slider.js')}}"></script>  
	<script src="{{asset('js/reveal-home.js')}}"></script>  
	<script src="{{asset('js/custom.js')}}"></script> 
</body>
</html>
