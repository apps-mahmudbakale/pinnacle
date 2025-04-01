@extends('layouts.app')

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
                                                <input class="input-sm" type="text" autocomplete="off" id="start-date-1" name="start" placeholder="check-in date" data-date-format="DD, MM d"/>
                                                <span class="date-text date-depart"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-item">
                                                <span class="fontawesome-calendar"></span>
                                                <input class="input-sm" type="text" autocomplete="off" id="end-date-1" name="end" placeholder="check-out date" data-date-format="DD, MM d"/>
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
        <div class="slide slide--current parallax-top">
            <figure class="slide__figure">
                <div class="slide__figure-inner">
                    <div class="slide__figure-img" style="background-image: url({{asset('img/slider1.jpeg')}})"></div>
                    <div class="slide__figure-reveal"></div>
                </div>
            </figure>
        </div>
        <div class="slide parallax-top">
            <figure class="slide__figure">
                <div class="slide__figure-inner">
                    <div class="slide__figure-img" style="background-image: url(slider2.jpeg)"></div>
                    <div class="slide__figure-reveal"></div>
                </div>
            </figure>
        </div>
        <div class="slide parallax-top">
            <figure class="slide__figure">
                <div class="slide__figure-inner">
                    <div class="slide__figure-img" style="background-image: url(slider1.jpeg)"></div>
                    <div class="slide__figure-reveal"></div>
                </div>
            </figure>
        </div>
        <!-- revealer -->
        <div class="revealer">
            <div class="revealer__item revealer__item--left"></div>
            <div class="revealer__item revealer__item--right"></div>
        </div>
        <nav class="arrow-nav fade-top">
            <button class="arrow-nav__item arrow-nav__item--prev">
                <svg class="icon icon--nav"><use xlink:href="#icon-nav"></use></svg>
            </button>
            <button class="arrow-nav__item arrow-nav__item--next">
                <svg class="icon icon--nav"><use xlink:href="#icon-nav"></use></svg>
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

@include('partials.restaurants-side')
@include('partials.other-services')

@endsection
