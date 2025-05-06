@extends('layouts.welcome')
@section('meta')
<meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
<meta name="keywords" content="hotel, luxury, comfort, booking">
<meta name="author" content="Your Name">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'About Us')

@section('content')

<div class="section big-55-height over-hide z-bigger">

    <div id="poster_background-about"></div>
    <div id="video-wrap" class="parallax-top">
        <video id="video_background" preload="auto" autoplay loop="loop" muted="muted" poster="img/trans.png">
            <source src="{{asset('video/video-about.mp4')}}" type="video/mp4">
        </video>
    </div>
    <div class="dark-over-pages"></div>

    <div class="hero-center-section pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 parallax-fade-top">
                    <div class="hero-text">About Us</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top-bottom over-hide">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="subtitle with-line text-center mb-4">a bit about us</div>
                <h3 class="text-center padding-bottom-small">finest hotel</h3>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-4">
                <div class="services-box text-center">
                    <img src="{{asset('img/4.svg')}}" alt="">
                    <h5 class="mt-2">Amazing Amenities</h5>
                    <p class="mt-3">Pinnacle Guest Inn is a multi star best-in-class hospitality experience that will surely <br>blow your mind.</p>
                    <a class="mt-1 btn btn-primary" href="gallery">read more</a>
                </div>
            </div>



            <div class="col-md-4 mt-5 mt-md-0">
                <div class="services-box text-center">
                    <img src="{{asset('img/5.svg')}}" alt="">
                    <h5 class="mt-2">Gymnasium</h5>
                    <p class="mt-3">Our well-equipment gym with sauna rooms are accessible to our in-house fit fam junkies, and comes with an available instructor</p>
                    <a class="mt-1 btn btn-primary" href="gallery">read more</a>
                </div>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <div class="services-box text-center">
                    <img src="{{asset('img/6.svg')}}" alt="">
                    <h5 class="mt-2">food included</h5>
                    <p class="mt-3">Join us at our restaurants, where our skilled chefs eagerly await your arrival. Experience a blend of culinary traditions and international influences </p>
                    <a class="mt-1 btn btn-primary" href="gallery">read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.restaurants-side')
@include('partials.testimonials')
@include('partials.other-services')
@endsection
