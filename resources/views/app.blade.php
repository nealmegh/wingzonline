<!doctype html>

<!--[if lt IE 7]><html lang="en" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="en" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="en" prefix="og: http://ogp.me/ns#" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" prefix="og: http://ogp.me/ns#" class="no-js"><!--<![endif]-->

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wingz Online | Rent Aircraft</title>
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" href="images/apple-icon-touch.png">
    <link rel="icon" href="images/favicon.png">
    <!--[if IE]>
    <link rel="shortcut icon" href="http://www.wingzonline.net/wp-content/themes/wingzonline/favicon.ico">
    <![endif]-->
    <meta name="msapplication-TileImage" content="images/win8-tile-icon.png">

    <link rel='stylesheet' id='theme-my-login-css'  href='css/theme-my-login.css' type='text/css' media='all' />
    <link rel='stylesheet' id='nstSlider-stylesheet-css'  href='css/jquery.nstSlider.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='bones-stylesheet-css'  href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='bones-stylesheet-css'  href='css/custom.css' type='text/css' media='all' />
    <!--[if lt IE 9]>
    <link rel='stylesheet' id='bones-ie-only-css'  href='http://www.wingzonline.net/wp-content/themes/wingzonline/library/css/ie.css' type='text/css' media='all' />
    <![endif]-->
    <link rel='stylesheet' id='fullcalendar-css'  href='css/fullcalendar.css' type='text/css' media='all' />
    <link rel='stylesheet' id='fullcalendar-print-css'  href='css/fullcalendar.print.css' type='text/css' media='print' />
    <link rel='stylesheet' id='timeline-css'  href='css/timeline.css' type='text/css' media='all' />
    <link rel='stylesheet' id='easyui-css'  href='css/easyui.css' type='text/css' media='all' />
    <link rel='stylesheet' id='icon-css'  href='css/icon.css' type='text/css' media='all' />
    <link rel='stylesheet' id='rome-css'  href='css/rome.css' type='text/css' media='all' />
    <link rel='stylesheet' id='remodal-css'  href='css/jquery.remodal.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <script type='text/javascript' src='/js/libs/rome.js'></script>
    <script type='text/javascript' src='/js/libs/jquery.min.js'></script>
    <script type='text/javascript' src='/js/libs/jquery.autocomplete.min.js'></script>
    <script type='text/javascript' src='/js/libs/jquery.validate.min.js'></script>
    <script type='text/javascript' src='/js/libs/moment.min.js'></script>
    <script type='text/javascript' src='/js/libs/fullcalendar.min.js'></script>
    <script type='text/javascript' src='/js/libs/jquery-dateFormat.min.js'></script>

    <script type='text/javascript' src='/js/libs/jquery.nstSlider.min.js'></script>
    <script type='text/javascript' src='/js/libs/wow.min.js'></script>
    <script type='text/javascript' src='/js/libs/animsition.js'></script>
    <script type='text/javascript' src='/js/libs/modernizr.custom.min.js'></script>


</head>

<body class="home page page-id-16 page-template page-template-template-home page-template-page-create-account page-template-template-home-php page-template-page-available-aircraft">

<div id="container" class="animsition">

    <header class="header" role="banner">
        <div class="wrap cf">
            <p id="logo" class="h1"><a href="index.html" rel="nofollow"><img src="images/logo-wingz.png" alt="Wingz Online" /></a>
            </p>
            <ul class="members">
                <li><a class="btn" href="create-user-account.php">Sign Up</a></li>
                <li><a class="login" href="#modalLogin">Login</a></li>
                <li><a class="btn-round" href="questions.php">?</a></li>
            </ul>
        </div><!--end wrap-->
    </header>


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
                                <form method="post" action="http://www.wingzonline.net/available-aircraft/" id="frm_search_aircraft">
                                    <div class="search-aicraft-input">
                                        <input type="text" placeholder="Pick Up:" name="dt_pick_up" id="dt_pick_up" class="dtimepicker"></input>
                                        <input type="text" placeholder="Return:" class="dtimepicker" id="dt_return" name="dt_return"></input>
                                        <input type="text" placeholder="Company, Airport or ID" id="search_keyword" name="search_keyword" value=""></input>
                                        <input type="hidden" name="action" value="search"/>
                                        <input type="hidden" name="airport_id" value="" id="airport_id" />
                                        <input type="hidden" name="airport_zip" value="" id="airport_zip" />
                                        <input type="hidden" name="aircraft_make_id" value="" id="aircraft_make_id" />
                                        <input type="hidden" name="aircraft_model_id" value="" id="aircraft_model_id" />
                                        <input type="hidden" name="number_of_seats" value="" id="number_of_seats" />
                                        <input type="hidden" name="price_range_begin" value="" id="price_range_begin" />
                                        <input type="hidden" name="price_range_end" value="" id="price_range_end" />
                                        <input type="hidden" name="company" id="company"/>
                                    </div>
                                    <div class="search-aircraft-submit">
                                        <button type="submit" class="button" style="color:#fff; border:none;">Find Availability</button>
                                    </div>
                                </form>
                                <div id="error_summary" class="search-aircraft-submit-error"></div>
                            </div>
                            <div class="search-aircraft-advanced-link wow fadeIn">
                                <a class="advanced-link cf" href="#div_advanced_search">Advanced Search</a>
                            </div>

                        </div>

                        <a class="button wow fadeInUp" href="#innovative">How It Works</a>

                        {{--// include 'advanced-search-modal-form.php' --}}
                        @include('advanced-search-modal-form')
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
                            <a class="btn-green wow fadeInUp" href="create-user-account.php">Create a Renter Account</a>
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
                                <a href="create-user-account.php"><img src="images/company_schedule.jpg" alt="Company Schedule" /></a>
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
                                <a href="create-user-account.php"><img class="wow fadeInDown" src="images/company_schedule.jpg" alt="Company Schedule" /></a>
                            </div>
                        </div>

                        <a class="btn wow fadeInUp" href="create-user-account.php">Create a Company Account</a>


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
                        <a class="btn wow fadeInUp" href="create-user-account.php">Get Started <img class="right-arrow" src="images/right-arrow.png" /></a>
                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->
    </div><!--end content-->



    <footer class="footer" role="contentinfo">

        <div class="wrap cf">

            <div class="wow fadeIn footer-logo"><img src="images/logo-wingz.png" alt="Wingz Online"/></div>
            <p class="wow fadeIn tagline">Spend More Time in the Air</p>

            <nav role="navigation">
                <ul id="menu-footer-menu" class="nav footer-nav cf">
                    <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-16 current_page_item menu-item-59"><a href="index.php">Home</a></li>
                    <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="about.php">About</a></li>
                    <li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-56"><a href="terms-conditions.php">Terms &#038; Conditions</a></li>
                    <li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="questions.php">Questions?</a></li>
                </ul>
            </nav>

            <div id="login-modal" class="remodal" data-remodal-id="modalLogin">
                <div class="login-form">

                    <p id="logo" class="h1"><a href="index.php" rel="nofollow"><img src="images/logo-wingz.png" alt="Wingz Online" /></a>

                    </p>
                    <div class="login" id="theme-my-login1">
                        <form name="loginform" id="loginform1" action="http://www.wingzonline.net/login-2/" method="post">
                            <p>

                                <input type="text" name="log" id="user_login1" class="input" placeholder="Username" value="" size="20" /><span class="fa fa-user login-u-icon"></span>
                            </p>
                            <p>

                                <input type="password" name="pwd" id="user_pass1" class="input" placeholder="********" value="" size="20" autocomplete="off" /><span class="fa fa-lock login-u-icon"></span>
                            </p>

                            <input type="hidden" name="_wp_original_http_referer" value="/" />

                            <ul class="tml-action-links">
                                <li class="join-now"><a href="create-user-account.php" rel="nofollow">Join Now!</a></li>
                                <li class="forgot-password"><a href="#" rel="nofollow">Forgot Password</a></li>
                            </ul>
                            <p class="submit">
                                <input type="submit" name="wp-submit" id="wp-submit1" value="Log In" />
                                <input type="hidden" name="redirect_to" value="http://www.wingzonline.net/wp-admin/" />
                                <input type="hidden" name="instance" value="1" />
                                <input type="hidden" name="action" value="login" />
                            </p>
                        </form>

                    </div>



                </div>
            </div><!-- end remodal -->
        </div>

    </footer>

</div> <!-- end container, animsition -->

<script type='text/javascript' src='/js/libs/jquery.remodal.min.js'></script>
<script type='text/javascript' src='/js/custom.js'></script>

</body>


</html>
