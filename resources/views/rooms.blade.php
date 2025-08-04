@extends('layouts.welcome')
@section('meta')
<meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
<meta name="keywords" content="hotel, luxury, comfort, booking">
<meta name="author" content="Your Name">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'Rooms')

@section('content')
<div class="section big-55-height over-hide z-bigger">

    <div class="parallax parallax-top" style="background-image: url('img/rooms.jpg')"></div>
    <div class="dark-over-pages"></div>

    <div class="hero-center-section pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 parallax-fade-top">
                    <div class="hero-text">Our Rooms</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section padding-top-bottom over-hide background-grey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="subtitle with-line text-center mb-4">luxury</div>
                <h3 class="text-center padding-bottom-small">Our rooms</h3>
            </div>
            <div class="section clearfix"></div>
            @foreach(\App\Models\Room::all() as $room)
             @php
                $imagePath = $room->image_path
                ? asset('storage/' . $room->image_path)
                : asset('assets/img/room_default.png');
                @endphp
            <div class="col-md-6">
                <div class="room-box background-white">
                    <div class="room-name">{{$room->name}}</div>
                    <div class="room-per">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="{{$imagePath}}" alt="">
                    <div class="room-box-in">
                        <h5 class="">{{$room->name}}</h5>
                        <!-- <p class="mt-3">The hotel offer 65 Standard room, and each has a king-sized bed and en-suite bathrooms.</p> -->
                        <a class="mt-4 py-4 btn btn-primary" href="{{route('bookings.book', $room->id)}}">book from &#8358;{{$room->price}}</a>
                        <div class="room-icons mt-4 pt-4">
                            <img src="img/5.svg" alt="">
                            <img src="img/2.svg" alt="">
                            <img src="img/3.svg" alt="">
                            <img src="img/1.svg" alt="">
                            <a href="#">full info</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>


</div>
@include('partials.other-services')
@endsection