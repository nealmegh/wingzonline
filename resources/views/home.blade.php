@extends('app')

{{--#{{ set_meta('html::class', 'page') }}--}}

@section('content')
    <div id="content" class="home">

        <section class="intro animated fadeIn cf">
            <div class="wrap cf">
                <div class="m-all t-all d-all cf">
                    <header>
                        <h1 class="intro-logo"><img class="wow fadeIn" src="images/wingzonline_logo_white.png" alt="Wingz Online"/></h1>
                        <p class="tagline wow fadeIn">Spend More Time in the Air</p>
                    </header>

                    <section class="entry-content cf">

                        <div class="wow fadeIn"><p>It&#8217;s easy to rent an aircraft. Choose your dates to begin:</p>
                        </div>

                        <div class="search-aircraft-container wow fadeIn">
                            <div class="search-aircraft-form">
                                {!! Form::open(['url'=>'aircraft/available', 'method'=>'GET','id'=>'frm_search_aircraft']) !!}
                                    <div class="search-aicraft-input">
                                        @include('frontend.partial.search')
                                    </div>
                                    <div class="search-aircraft-submit">
                                        <button type="submit" class="button" style="color:#fff; border:none;">Find Availability</button>
                                    </div>
                                {!! Form::close() !!}
                                <div id="error_summary" class="search-aircraft-submit-error"></div>
                            </div>
                            <div class="search-aircraft-advanced-link wow fadeIn">
                                <a class="advanced-link cf" href="#div_advanced_search">Advanced Search</a>
                            </div>

                        </div>

                        <a class="button wow fadeInUp" href="#innovative">How It Works</a>

                        @include('frontend.advanced-search-modal-form')

                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

        <section class="type cf" name="innovative">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">



                    <header>
                        <p class="h2 wow fadeInUp">An Innovative Way to Rent Aircraft</p>
                        <p class="h5 wow fadeInDown">Choose the option that’s right for you</p>
                    </header>

                    <section class="entry-content cf">
                        <div class="m-all t-1of2 d-1of2 cf">
                            <!-- <div class="type-icon">Array</div> -->
                            <div class="wow fadeIn type-icon"><img src="images/company_icon1.png" alt="" /></div>
                            <div class="wow fadeInLeft type-title"><p>Companies</p></div>
                            <div class="wow fadeInLeft"><p>We strive to get your business and airplanes out into the public so you can get your aircraft rented more often with less down time.</p>
                            </div>
                            <div><a class="btn wow fadeInLeft" href="#company-home">Companies</a></div>
                        </div>

                        <div class="m-all t-1of2 d-1of2 cf">
                            <div class="wow fadeIn type-icon"><img src="images/renter_icon1.png" alt="" /></div>
                            <div class="wow fadeInRight type-title"><p>Renters</p></div>
                            <div class="wow fadeInRight"><p>We show you aircrafts from all the different companies in the area so you don’t have to call each individual company to find an aircraft for rent, and you can schedule the aircraft right from our program.</p>
                            </div>
                            <div><a class="btn wow fadeInRight" href="#renter">Renters</a></div>
                        </div>
                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

        <section class="rent cf" name="renter">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">



                    <header>
                        <p class="h2 wow fadeInUp">Are You Looking to Rent?</p>
                        <p class="h5 wow fadeInUp">Wingz Online offers renters a fast and easy way to rent aircraft</p>
                    </header>

                    <section class="entry-content cf">
                        <div class=" graphic m-all t-2of3 d-2of3 cf">
                            <img class="wow fadeInLeft" data-wow-offset="50" src="images/iphone1.png" alt="" />
                        </div><!--end col-->

                        <div class="list m-all t-1of3 d-1of3 cf">
                            <ul>
                                <li class="wow fadeIn" data-wow-offset="50"><div><span class="icon"><img src="images/schedule1.png" alt="" /></span>Instantly book aircraft online</div></li>
                                <li class="wow fadeIn" data-wow-offset="50"><div><span class="icon"><img src="images/time.png" alt="" /></span>Real-time availability</div></li>
                                <li class="wow fadeIn" data-wow-offset="50"><div><span class="icon"><img src="images/companyinfo.png" alt="" /></span>View info about the companies you rent from</div></li>
                                <li class="wow fadeIn" data-wow-offset="50"><div><span class="icon"><img src="images/aircraftinfo.png" alt="" /></span>View info about the aircraft you want to rent</div></li>
                            </ul>
                        </div><!--end col-->

                        <div class="m-all t-all d-all cf">
                            <a class="btn-green wow fadeInUp" href="{{ url('renter/create') }}">Create a Renter Account</a>
                        </div><!--end col-->

                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

        <section class="company cf" name="company-home">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">



                    <header>
                        <p class="h2 wow fadeInUp">Have a Company?</p>
                        <p class="h5 wow fadeInUp">It's easy to list your aircraft and schedule students and renters</p>
                    </header>

                    <section class="entry-content cf">

                        <div class="m-all t-2of5 d-2of5 cf company-admin-screenshot-container hideOnDesktop">
                            <div class="company-admin-screenshot">
                                <a href="create-user-account"><img src="images/company_schedule.jpg" alt="Company Schedule" /></a>
                            </div>
                        </div>

                        <div class="m-all t-2of5 d-2of5 cf">
                            <ul class="left-list">
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/listaircraft.png" alt="" /></span><span class="item">List your aircraft</span></li>
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/rentersschedule.png" alt="" /></span><span class="item">Let your renters schedule aircraft</span></li>
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/manageschedule.png" alt="" /></span><span class="item">Manage your schedule online</span></li>
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/flightschool.png" alt="" /></span><span class="item">Flight school rentals</span></li>
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/groundaircraft.png" alt="" /></span><span class="item">Ground your aircraft</span></li>
                                <li class="wow fadeInLeft"><span class="icon"><img src="images/flightclub.png" alt="" /></span><span class="item">Flight Club rentals</span></li>
                            </ul>
                        </div><!--end col-->

                        <!-- <div class="graphic m-all t-1of3 d-1of3 cf">
                            <img src="http://www.wingzonline.net/images/company_schedule.jpg" alt="" />
                        </div> --><!--end col-->

                        <!-- <div class="m-all t-1of3 d-1of3 cf">
                                <ul class="right-list">
                                    <li><span class="icon"><img src="http://www.wingzonline.net/images/icon-91.png" alt="" /></span><span class="item">Flight Club rentals</span></li>
                                    <li><span class="icon"><img src="http://www.wingzonline.net/images/icon-81.png" alt="" /></span><span class="item">Manage your schedule online</span></li>
                                    <li><span class="icon"><img src="http://www.wingzonline.net/images/icon-101.png" alt="" /></span><span class="item">Let your renters schedule airplanes</span></li>
                                </ul>
                        </div> --><!--end col-->

                        <!-- <div class="m-all t-all d-all cf">

                            <a class="btn" href="/create-user-account">Create a Company Account</a>

                        </div> --><!--end col-->

                        <div class="m-all t-3of5 d-3of5 cf company-admin-screenshot-container hideOnMobile">
                            <div class="company-admin-screenshot">
                                <a href="create-user-account"><img class="wow fadeInDown" src="images/company_schedule.jpg" alt="Company Schedule" /></a>
                            </div>
                        </div>

                        <a class="btn wow fadeInUp" href="{{ url('companies/create') }}">Create a Company Account</a>


                    </section>


                </div><!--end col-->

            </div><!--end wrap-->



        </section><!--end intro-->

        <section class="join cf">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">



                    <header>
                        <p class="h2 join-title wow fadeInDown">Join Wingz Online</p>
                    </header>

                    <section class="entry-content cf">
                        <a class="btn wow fadeInUp" href="create-user-account">Get Started <img class="right-arrow" src="images/right-arrow.png" /></a>
                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->
    </div><!--end content-->
@endsection



@section('footer')
    @include('frontend.partial._homePageScript')
@endsection
