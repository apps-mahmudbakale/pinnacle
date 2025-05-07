@extends('layouts.welcome')
@section('meta')
<meta name="description" content="Welcome to our hotel, where comfort meets luxury. Book your stay with us today!">
<meta name="keywords" content="hotel, luxury, comfort, booking">
<meta name="author" content="Your Name">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@section('title', 'Restaurants')

@section('content')
<div class="section big-55-height over-hide z-bigger">

    <div id="poster_background-res"></div>
    <div id="video-wrap" class="parallax-top">
        <video id="video_background" preload="auto" autoplay loop="loop" muted="muted" poster="img/trans.png">
            <source src="video/video-res.mp4" type="video/mp4">
        </video>
    </div>
    <div class="dark-over-pages"></div>

    <div class="hero-center-section pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 parallax-fade-top">
                    <div class="hero-text">Restaurant</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top over-hide">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="services-box restaurant text-center">
                    <img src="img/res-1.png" alt="">
                    <h5 class="mt-3">High quality foods</h5>
                    <p class="mt-3">We offer an ample selection of the highest quality foods and beverages, always varied and full of imagination. Excellent quality products prepared carefully</p>
                    <a class="mt-1 btn btn-primary" href="restaurant">read more</a>
                </div>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <div class="services-box restaurant text-center">
                    <img src="img/res-2.png" alt="">
                    <h5 class="mt-3">Inspiring recipes</h5>
                    <p class="mt-3">
                        Embark on a flavourful adventure with our tailored recipe collections that bring the art of cooking to life. Come and taste delicious recipes to make you feel at home.</p>
                    <a class="mt-1 btn btn-primary" href="restaurant">read more</a>
                </div>
            </div>
            <div class="col-md-4 mt-5 mt-md-0">
                <div class="services-box restaurant text-center">
                    <img src="img/res-3.png" alt="">
                    <h5 class="mt-3">Salutary meals</h5>
                    <p class="mt-3">Salutary meals. Good taste, it's in our culture. main dishes. Our menu. get in touch. Contact us. available: 24hr. Call us at(234) 813-301-1117.
                    </p>
                    <a class="mt-1 btn btn-primary" href="restaurant">read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top-bottom z-bigger">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="subtitle with-line text-center mb-4">main dishes</div>
                <h3 class="text-center padding-bottom-small">Our menu</h3>
            </div>
            <div class="section clearfix"></div>
            <div class="col-md-6" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                <div class="restaurant-box">
                    <img src="images/fired-rice.jpg" alt="">
                    <h6><span>Garnished Jollof Rice</span></h6>
                    <p><span>Rice / veggies / oil</span></p>
                    <h5><span>&#8358;1,500</span></h5>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.4s">
                <div class="restaurant-box">
                    <img src="images/egg-sauce.jpg" alt="">
                    <h6><span>Boiled Ghips & Egg Sauce </span></h6>
                    <p><span>Egg / potatoes / Sauce</span></p>
                    <h5><span>&#8358;3,200</span></h5>
                </div>
            </div>
            <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.2s">
                <div class="restaurant-box">
                    <img src="images/fried-chicken.jpg" alt="">
                    <h6><span>Spiced fried chicken</span></h6>
                    <p><span>chicken / olive oil / Spicy</span></p>
                    <h5><span>&#8358;2,000</span></h5>
                </div>
            </div>
            <div class="col-md-6 mt-4" data-scroll-reveal="enter bottom move 50px over 0.7s after 0.4s">
                <div class="restaurant-box">
                    <img src="images/pounded-yam.jpg" alt="">
                    <h6><span>well Pounded Yam</span></h6>
                    <p><span> Soft / Yam / Well Package</span></p>
                    <h5><span>&#8358;2,500</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section padding-top-bottom over-hide background-grey">
    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Protein</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>1.</td>
                        <td>Beef </td>
                        <td>2,000</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>Chicken </td>
                        <td>1,500</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>
                            Cow Tail </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>Fish </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>Goat Meat</td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>Kayanciki</td>
                        <td>2,000</td>
                    </tr>






                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top z-bigger">

    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Soup</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>






                    <tbody>

                    <tr>
                        <td>1.</td>
                        <td>Bitter Leaf </td>
                        <td>1,500</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>Draw </td>
                        <td>1,300</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>
                            Egusi </td>
                        <td>1,300</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>Vegetable </td>
                        <td>1,500</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>Stew </td>
                        <td>700 </td>
                    </tr>







                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top-bottom over-hide background-grey">
    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Swallow</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>








                    <tr>
                        <td>1.</td>
                        <td>Amala </td>
                        <td>1,000</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>Garri </td>
                        <td>1,000</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>Poundo Yam </td>
                        <td>1,200</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>Pounded Yam </td>
                        <td>2,500</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>Semolina </td>
                        <td>1,000</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>Tuwon Rice </td>
                        <td>1,000</td>
                    </tr>



                    <tr>
                        <td>7.</td>
                        <td>
                            Wheat
                        </td>
                        <td>1,000</td>
                    </tr>






                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top z-bigger">
    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Breakfast</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>








                    <tr>
                        <td>1.</td>
                        <td>Chip & Omellet </td>
                        <td>2,600</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>
                            Chips & Kidney Sauce </td>
                        <td>3,500</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>
                            Chip & Chicken Sauce </td>
                        <td>4,000</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>
                            Chips & Fish Sauce </td>
                        <td>4,500</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>Boiled Yam & Egg Sauce </td>
                        <td>3,200</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>
                            Fried Yam & Sauce </td>
                        <td>3,200</td>
                    </tr>



                    <tr>
                        <td>7.</td>
                        <td>
                            Fried Yam & Omelet
                        </td>
                        <td>2,600</td>
                    </tr>




                    <tr>
                        <td>8.</td>
                        <td>
                            Toast Bread & Sardine
                        </td>
                        <td>1,300</td>
                    </tr>




                    <tr>
                        <td>9.</td>
                        <td>
                            Toast Bread & Omelet
                        </td>
                        <td> 900</td>
                    </tr>



                    <tr>
                        <td>10.</td>
                        <td>
                            Chicken Soup
                        </td>
                        <td>3,000</td>
                    </tr>


                    <tr>
                        <td>11.</td>
                        <td>
                            Vegetable Soup
                        </td>
                        <td>1,500</td>
                    </tr>



                    <tr>
                        <td>12.</td>
                        <td>

                            Bread & Omelet
                        </td>
                        <td>850</td>
                    </tr>


                    <tr>
                        <td>13.</td>
                        <td>Sandwich </td>
                        <td>1,500
                        </td>
                    </tr>


                    <tr>
                        <td>14.</td>
                        <td>
                            Chip Sandwich
                        </td>
                        <td>1,500</td>
                    </tr>



                    <tr>
                        <td>15.</td>
                        <td>
                            Plaintain
                        </td>
                        <td>700</td>
                    </tr>




                    <tr>
                        <td>16.</td>
                        <td>

                            Spaghetti (Jollof)
                        </td>
                        <td>1,000</td>
                    </tr>



                    <tr>
                        <td>17.</td>
                        <td>
                            White Spaghetti & Stew
                        </td>
                        <td>1,400</td>
                    </tr>



                    <tr>
                        <td>18.</td>
                        <td>
                            Indomie & Omelet
                        </td>
                        <td>1,300</td>
                    </tr>



                    <tr>
                        <td>19.</td>
                        <td>
                            Spanish Omelet
                        </td>
                        <td>1,000</td>
                    </tr>





                    <tr>
                        <td>20.</td>
                        <td>White Oat & Tin Milk
                        </td>
                        <td>1,100</td>
                    </tr>





                    <tr>
                        <td>21.</td>
                        <td>Jollof Rice
                        </td>
                        <td>1,500</td>
                    </tr>





                    <tr>
                        <td>22.</td>
                        <td>Fried Rice
                        </td>
                        <td>1,500</td>
                    </tr>





                    <tr>
                        <td>23.</td>
                        <td>White Rice
                        </td>
                        <td>1,000</td>
                    </tr>





                    <tr>
                        <td>24.</td>
                        <td>
                            Jollof Spaghetti
                        </td>
                        <td>1,000</td>
                    </tr>





                    <tr>
                        <td>25.</td>
                        <td>Jollof Cuscus
                        </td>
                        <td>1,500</td>
                    </tr>





                    <tr>
                        <td>26.</td>
                        <td>
                            White Cuscus
                        </td>
                        <td>1,200</td>
                    </tr>








                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top-bottom over-hide background-grey">


    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Beverages</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>








                    <tr>
                        <td>1.</td>
                        <td>Coffee & Cream </td>
                        <td>600</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>
                            Black Coffee </td>
                        <td>400</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>

                            Black Tea </td>
                        <td>200</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>

                            Tea </td>
                        <td>600</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>Tin Milk </td>
                        <td>600</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>Sachet Milk </td>
                        <td>200</td>
                    </tr>



                    <tr>
                        <td>7.</td>
                        <td>
                            Milo
                        </td>
                        <td>200</td>
                    </tr>




                    <tr>
                        <td>8.</td>
                        <td>

                            Bournvita
                        </td>
                        <td>200</td>
                    </tr>




                    <tr>
                        <td>9.</td>
                        <td>

                            Hollandia
                        </td>
                        <td> 1,500</td>
                    </tr>



                    <tr>
                        <td>10.</td>
                        <td>

                            Chi Active
                        </td>
                        <td>1,300</td>
                    </tr>


                    <tr>
                        <td>11.</td>
                        <td>

                            Chi Exotic
                        </td>
                        <td>1,300</td>
                    </tr>



                    <tr>
                        <td>12.</td>
                        <td>
                            B/5 Alive
                        </td>
                        <td>1,200</td>
                    </tr>


                    <tr>
                        <td>13.</td>
                        <td>
                            Maltina </td>
                        <td>450
                        </td>
                    </tr>


                    <tr>
                        <td>14.</td>
                        <td>
                            Fearless
                        </td>
                        <td> 450</td>
                    </tr>



                    <tr>
                        <td>15.</td>
                        <td>Coke
                        </td>
                        <td>350</td>
                    </tr>




                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top z-bigger">


    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Sauce</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>








                    <tr>
                        <td>1.</td>
                        <td>Chicken Sauce </td>
                        <td>2,500</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>
                            Fish Sauce </td>
                        <td>2,500</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>Kidney Sauce </td>
                        <td>1,500</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>

                            Egg Sauce </td>
                        <td>1,200</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>


                            Vegetable Sauce </td>
                        <td>1,500</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>
                            Cream Soup </td>
                        <td>1,500</td>
                    </tr>



                    <tr>
                        <td>7.</td>
                        <td>

                            Tomatoes Sauce
                        </td>
                        <td>500</td>
                    </tr>







                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
<div class="section padding-top-bottom over-hide background-grey">


    <div class="container">
        <div class="row justify-content-center padding-bottom-smaller">
            <div class="col-md-8">
                <div class="subtitle with-line text-center mb-4">Place your order Now</div>
                <h3 class="text-center padding-bottom-small">Starte</h3>
            </div>



            <div class="section clearfix"></div>
            <div class="col-md-12 col-lg-12">

                <table id="example" style="width: 100%;" class="table table-bordered table-striped">

                    <thead>
                    <tr>

                        <th>S/N</th>
                        <th>Menu</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>








                    <tr>
                        <td>1.</td>
                        <td>
                            Chicken Pepper Soup </td>
                        <td>2,000</td>
                    </tr>



                    <tr>
                        <td>2.</td>
                        <td>
                            Cow Tail Pepper Soup </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>3.</td>
                        <td>Fish Pepper Soup </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>4.</td>
                        <td>
                            Goat Meat Pepper Soup </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>5.</td>
                        <td>
                            Kayanciki Pepper Soup </td>
                        <td>2,000</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>
                            Salad </td>
                        <td>1,500</td>
                    </tr>



                    <tr>
                        <td>7.</td>
                        <td>Green Salad
                        </td>
                        <td>1,500</td>
                    </tr>




                    <tr>
                        <td>8.</td>
                        <td>
                            Vegetable Salad
                        </td>
                        <td>1,500</td>
                    </tr>




                    <tr>
                        <td>9.</td>
                        <td>


                            Fruit Salad
                        </td>
                        <td> 2,000</td>
                    </tr>



                    <tr>
                        <td>10.</td>
                        <td>


                            Cole Show
                        </td>
                        <td>5,000</td>
                    </tr>




                    </tbody>
                </table>

            </div>


        </div>

    </div>
</div>
@endsection