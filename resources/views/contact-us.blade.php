@extends('layouts.welcome')
@section('meta')
<meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
<meta name="keywords" content="hotel, luxury, comfort, booking">
<meta name="author" content="Your Name">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'Contact Us')

@section('content')
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<script type="text/javascript">



    $(function(){


        $('#submitbtn').click(function(){


            var fullname = $('#fullname').val();
            var email = $('#email').val();
            var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            var phone = $('#phone').val();
            var website = $('#website').val();
            var message = $('#message').val();
            var data='fullname='+fullname+'&email='+email+'&phone='+phone+'&message='+message;


            if(fullname==''){
                $('#fullname').css('border-bottom','1px solid #f32');
                $('#fullname').focus();
                return false;
            }else if(email==''){
                $('#email').css('border-bottom','1px solid #f32');
                $('#email').focus();
                return false;
            }else if(!email_regex.test(email)){
                alert('This is not valid email');
                $('#email').css('border-bottom','1px solid #f32');
                $('#email').focus();
                return false;
            }else if(phone == ''){
                $('#phone').css('border-bottom','1px solid #f32');
                $('#phone').focus();
                return false;
            }else if( phone.length < 11){
                alert('This is not valid phone number');
                $('#phone').css('border','1px solid #FF7E39');
                $('#phone').focus();
                return false;

            }else if(message == ''){
                $('#message').css('border-bottom','1px solid #f32');
                $('#message').focus();
                return false;
            }else{

                $('#submitbtn').html('<img src="ajax-loader4.gif" style="max-height:20px;max-width:20px;"/>&nbsp;&nbsp;'+'Sending message');

                $.ajax({
                    url:'ajax-contact.php',
                    type:'POST',
                    data:data,
                    cache:false,
                    success:function(html){
                        $('#submitbtn').html('<img src="ajax-loader4.gif" style="max-height:20px;max-width:20px;"/>&nbsp;&nbsp;'+html);
                    }
                });

                return false;
            }

        });
    });

</script>
<div class="section big-55-height over-hide z-bigger">

    <div class="parallax parallax-top" style="background-image: url('img/gallery/10.jpg')"></div>
    <div class="dark-over-pages"></div>

    <div class="hero-center-section pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 parallax-fade-top">
                    <div class="hero-text">Get in Touch</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top z-bigger">
    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">get in touch</div>
                <h3 class="text-center padding-bottom-small">drop us a line</h3>
            </div>

            <div class="section clearfix"></div>

            <div class="col-md-4 ajax-form">
                <input name="name" type="text" id="fullname" placeholder="Your Name: *" autocomplete="off"/>
            </div>
            <div class="col-md-4 mt-4 mt-md-0 ajax-form">
                <input name="email" type="text" id="email"  placeholder="E-Mail: *" autocomplete="off"/>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-8 mt-4 ajax-form">
                <input name="phone" type="text" id="phone"  placeholder="Phone Number: *" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-8 mt-4 ajax-form">
                <textarea name="message" id="message" placeholder="Tell Us Everything"></textarea>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-8 mt-3 ajax-checkbox">
                <ul class="list">
                    <li class="list__item">
                        <label class="label--checkbox">
                            <input type="checkbox" class="checkbox" checked>
                            collect my details through this form
                        </label>
                    </li>
                </ul>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-8 mt-3 ajax-form text-center">
                <button class="send_message"  data-lang="en" id="submitbtn" ><span>submit</span></button>
            </div>


            <div class="section clearfix"></div>
            <div class="col-md-8 padding-top-bottom">
                <div class="sep-line"></div>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-6 col-lg-4">
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">Address:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>Tamaje, Along Bye Pass, </p>
                    </div>
                </div>
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">City:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>Sokoto, Sokoto State.</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">Check-In:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>Anytime</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">Phone:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>+234-813-301-1117</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">Email:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>pinnacleguestinnandresort@gmail.com</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address-in text-left">
                        <p class="color-black">Internet Access:</p>
                    </div>
                    <div class="address-in text-right">
                        <p>Yes.</p>
                    </div>
                </div>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-8 text-center mt-5" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                <p class="mb-0"><em>available at: 8am - 10pm</em></p>
                <h2 class="text-opacity">+234-813-301-1117</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="subscribe-home">
                    <input type="text" placeholder="your email here"/>
                    <button data-lang="en">subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.gallery-side')
@endsection