@extends('layouts.welcome')
@section('meta')
    <meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
    <meta name="keywords" content="hotel, luxury, comfort, booking">
    <meta name="author" content="Your Name">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'Home')

@section('content')

    <div class="section background-dark over-hide">
        <div class="hero-center-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-8 parallax-fade-top">
                        <div class="hero-text"><br>Perfect Base For You & Your Loved Ones</div>
                    </div>
                    <div class="col-12 mt-3 mb-5 parallax-fade-top">
                        <div class="hero-stars">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div class="col-12 mt-3 parallax-fade-top">
                        <div class="booking-hero-wrap">
                            <div class="row justify-content-center">
                                <div class="col-5 no-mob">
                                    <div class="input-daterange input-group" id="flight-datepicker">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-item">
                                                    <span class="fontawesome-calendar"></span>
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                        id="start-date-1" name="start" placeholder="check-in date"
                                                        data-date-format="DD, MM d" />
                                                    <span class="date-text date-depart"></span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-item">
                                                    <span class="fontawesome-calendar"></span>
                                                    <input class="input-sm" type="text" autocomplete="off"
                                                        id="end-date-1" name="end" placeholder="check-out date"
                                                        data-date-format="DD, MM d" />
                                                    <span class="date-text date-return"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 no-mob">
                                    <div class="row">
                                        <div class="col-6">
                                            <select name="adults" class="wide">
                                                <option data-display="adults">adults</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="children" class="wide">
                                                <option data-display="children">children</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-lg-2">
                                    <a class="booking-button" href="{{ url('rooms') }}">book now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slideshow">
            @foreach (['slider3.jpeg', 'slider2.jpeg', 'slider1.jpeg'] as $slider)
                <div class="slide {{ $loop->first ? 'slide--current' : '' }} parallax-top">
                    <figure class="slide__figure">
                        <div class="slide__figure-inner">
                            <div class="slide__figure-img" style="background-image: url({{ asset($slider) }})"></div>
                            <div class="slide__figure-reveal"></div>
                        </div>
                    </figure>
                </div>
            @endforeach
            <!-- revealer -->
            <div class="revealer">
                <div class="revealer__item revealer__item--left"></div>
                <div class="revealer__item revealer__item--right"></div>
            </div>
            <nav class="arrow-nav fade-top">
                <button class="arrow-nav__item arrow-nav__item--prev">
                    <svg class="icon icon--nav">
                        <use xlink:href="#icon-nav"></use>
                    </svg>
                </button>
                <button class="arrow-nav__item arrow-nav__item--next">
                    <svg class="icon icon--nav">
                        <use xlink:href="#icon-nav"></use>
                    </svg>
                </button>
            </nav>
            <!-- navigation -->
            <nav class="nav fade-top">
                <button class="nav__button">
                    <span class="nav__button-text"></span>
                </button>
                <h2 class="nav__chapter">Make yourself at home in our <strong>hotel</strong></h2>
                <div class="toc">
                    <a class="toc__item" href="#entry-1">
                        <span class="toc__item-title">Choose your luxurious rooms</span>
                    </a>
                    <a class="toc__item" href="#entry-2">
                        <span class="toc__item-title">Stay with us feel like home in our hotel</span>
                    </a>
                    <a class="toc__item" href="#entry-3">
                        <span class="toc__item-title">Start your experience in our Hotel.</span>
                    </a>
                </div>
            </nav>
            <!-- little sides -->
            <div class="slideshow__indicator"></div>
            <div class="slideshow__indicator"></div>
        </div>
    </div>
    <div class="section padding-top-bottom over-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="subtitle text-center mb-4">Pinnacle Guest Inn</div>
                            <h2 class="text-center">Here is a tribute to good life!</h2>
                            <p class="text-justify mt-5"><strong>Pinnacle Guest Inn</strong> is a luxury styled hotel
                                located at the heart of the beautiful City of Tamaje, Along Eastern Bye Pass, Sokoto, Sokoto
                                State. The very best of comfort and beauty. The hotel is a well secured facility with
                                cooperate/armed security personnel, with modern technological security support.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="img-wrap">
                        <img src="img/rooms.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.restaurants-side')
    @include('partials.other-services')

    <div class="section padding-top-bottom over-hide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 align-self-center">
                    <div class="subtitle with-line text-center mb-4">elegant suites</div>
                    <h3 class="text-center padding-bottom-small">Unpretentious luxury</h3>
                </div>
                <div class="section clearfix"></div>
                <div class="col-sm-6 col-lg-4">
                    <div class="services-box text-center">
                        <img src="img/1.svg" alt="">
                        <h5 class="mt-2">Amazing Amenities</h5>
                        <p class="mt-3">
                            Pinnacle Guest Inn is a multi star best-in-class hospitality experience that will surely
                            <br>blow your mind.</p>
                        <!-- 	<a class="mt-1 btn btn-primary" href="#">read more</a> -->
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-5 mt-sm-0">
                    <div class="services-box text-center">
                        <img src="img/2.svg" alt="">
                        <h5 class="mt-2">king beds</h5>
                        <p class="mt-3">Experience a stylish sanctuary in Sokoto with our King Bed hotel rooms featuring
                            luxury amenities and curated art. Book now!.</p>
                        <!-- 	<a class="mt-1 btn btn-primary" href="services.html">read more</a>
    -->
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-5 mt-lg-0">
                    <div class="services-box text-center">
                        <img src="img/3.svg" alt="">
                        <h5 class="mt-2">Gymnasium</h5>
                        <p class="mt-3">

                            Our well-equipment gym with sauna rooms are accessible to our in-house fit fam junkies, and
                            comes with an available instructor.</p>
                        <!-- 	<a class="mt-1 btn btn-primary" href="services.html">read more</a> -->
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-5">
                    <div class="services-box text-center">
                        <img src="img/4.svg" alt="">
                        <h5 class="mt-2">Spa
                        </h5>
                        <p class="mt-3">
                            You are invited to experience a variety of relaxing wellness treatment from massages to getting
                            your hair and nails done. These pampering sessions guarante a memorable stay with us.</p>
                        <!-- 	<a class="mt-1 btn btn-primary" href="services.html">read more</a> -->
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-5">
                    <div class="services-box text-center">
                        <img src="img/5.svg" alt="">
                        <h5 class="mt-2">swimming pool</h5>
                        <p class="mt-3">Additional perks of being an in-house guest is to enjoy a day or night time swim.
                            Access to the pool for outside guests are at an additional <br> and affordable cost.</p>
                        <!-- 	<a class="mt-1 btn btn-primary" href="services.html">read more</a> -->
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-5">
                    <div class="services-box text-center">
                        <img src="img/6.svg" alt="">
                        <h5 class="mt-2">food included</h5>
                        <p class="mt-3">Join us at our restaurants, where our skilled chefs eagerly await your arrival.
                            Experience a blend of culinary traditions and international influences that are sure to gratify
                            even the most discerning palates.</p>
                        <!-- <a class="mt-1 btn btn-primary" href="services.html">read more</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section padding-top-bottom-big over-hide">
        <div class="parallax" style="background-image: url('images/pinnacle/20.jpg')"></div>
        <div class="section z-bigger">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xl-4 px-sm-0">
                                <div class="booking-sep-wrap">
                                    <div class="input-daterange input-group" id="flight-datepicker-1">
                                        <div class="form-item">
                                            <span class="fontawesome-calendar"></span>
                                            <input class="input-sm" type="text" autocomplete="off" id="start-date"
                                                name="start" placeholder="check-in" data-date-format="DD, MM d" />
                                            <span class="date-text date-depart"></span>
                                        </div>
                                        <div class="form-item">
                                            <span class="fontawesome-calendar"></span>
                                            <input class="input-sm" type="text" autocomplete="off" id="end-date"
                                                name="end" placeholder="check-out" data-date-format="DD, MM d" />
                                            <span class="date-text date-return"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-xl-2 px-sm-0">
                                <div class="quantity">
                                    <input type="number" min="1" max="9999" step="1" value="1">
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
                            <a class="mt-4 py-4 btn btn-primary" href="booking/{{$room->id}}">book from &#8358;{{$room->price}}</a>
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

        <div class="col-md-7" style="margin:0 auto;">

            <hr>


            <a class="booking-button-big" href="rooms">check More Room Suites and Pricing</a>


        </div>
    </div>

    @include('partials.testimonials')
    <div class="section padding-top-bottom background-grey over-hide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 align-self-center">
                    <div class="subtitle with-line text-center mb-4">Excellent restaurant</div>
                    <h3 class="text-center padding-bottom-small">Dining &amp; Bars</h3>
                </div>
                <div class="section clearfix"></div>
            </div>
            <div class="row background-white p-0 m-0">
                <div class="col-xl-6 p-0">
                    <div class="img-wrap" id="rev-3">
                        <img src="images/2/4.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 p-0 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-9 pt-4 pt-xl-0 pb-5 pb-xl-0 text-center">
                            <h5 class="">Delicious Meals</h5>
                            <p class="mt-3">Our fine dining restaurant & bars in Sokoto offers delicious cuisines, as well as refreshing drinks at the Pinnacle Guest Inn.</p>
                            <a class="mt-1 btn btn-primary" href="restaurant">explore</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row background-white p-0 m-0">
                <div class="col-xl-6 p-0 align-self-center">
                    <div class="row justify-content-center">
                        <div class="col-9 pt-4 pt-xl-0 pb-5 pb-xl-0 text-center">
                            <h5 class="">Affordable Menus</h5>
                            <p class="mt-3">Whatever your preference our stylish, trendy and above all, <strong>Pinnacle Guest Inn</strong> strives to provide not only great food, but excellent service with affordable pricing.</p>
                            <a class="mt-1 btn btn-primary" href="restaurant">explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-first order-xl-last p-0">
                    <div class="img-wrap" id="rev-4">
                        <img src="images/pinnacle/12.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.gallery-side')    
@endsection
