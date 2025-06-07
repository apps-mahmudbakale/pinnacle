@extends('layouts.welcome')
@section('meta')
<meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
<meta name="keywords" content="hotel, luxury, comfort, booking">
<meta name="author" content="Your Name">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'About Us')

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
<div class="section padding-top-bottom-smaller background-dark over-hide z-too-big">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xl-4 px-sm-0">
                            <div class="booking-sep-wrap">
                                <div class="input-daterange input-group" id="flight-datepicker-1">
                                    <div class="form-item">
                                        <span class="fontawesome-calendar"></span>
                                        <input class="input-sm" type="text" autocomplete="off" id="start-date" name="start" placeholder="check-in" data-date-format="DD, MM d"/>
                                        <span class="date-text date-depart"></span>
                                    </div>
                                    <div class="form-item">
                                        <span class="fontawesome-calendar"></span>
                                        <input class="input-sm" type="text" autocomplete="off" id="end-date" name="end" placeholder="check-out" data-date-format="DD, MM d"/>
                                        <span class="date-text date-return"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-2 px-sm-0">
                            <div class="quantity">
                                <input type="number" min="1" max="9999" step="1" value="1" >
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-2 px-sm-0">
                            <a class="booking-button-big" href="rooms">check<br>availability</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top-bottom over-hide background-grey">
    <div class="container">
        <section class="section-padding">
            <div class="container">
                <h2 class="mb-4">Book {{ $room->name }}</h2>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" required value="{{ old('firstname') }}">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" required value="{{ old('lastname') }}">
                    </div>
                    <div class="form-group">
                        <label>Your Email</label>
                        <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label>Check-in Date</label>
                        <input type="date" name="check_in" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Check-out Date</label>
                        <input type="date" name="check_out" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Proceed to Payment</button>
                </form>
            </div>
        </section>
    </div>


</div>
@include('partials.other-services')
@endsection