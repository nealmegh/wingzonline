@include('layout._header')

<body class="home page">

<div id="container" class="animsition">
    @set_meta('header::show', 'show')
    @include('layout.main._header')

    <section>

        <header style="background-image: url('/backend/images/available-aircraft.jpg')">
            <h1 class="page-title">Page Not Found</h1>
        </header>

        <div class="wrap cf">
            <div class="m-all t-all d-all cf">

                <article id="post-not-found" class="hentry cf">

                    <!-- <header class="article-header">
                        <h1>Page Not Found</h1>
                    </header> -->

                    <section class="entry-content text-center">
                        <h2>We apologize but the content you are trying to find was not found.</h2>
                        <p>We apologize but the content you are trying to find was not found. Please press the back button and try again. If the issue continues, please send Wingz Online an email containing the details and we will try to fix it promptly.</p>
                        <p><a class="btn" href="/support">Support</a></p>
                        <h2>Thank you!</h2>
                    </section>

                    <!-- <section class="search">
                            <p><form role="search" method="get" id="searchform" class="searchform" action="http://www.wingzonline.net/">
                <div>
                    <label class="screen-reader-text" for="s">Search for:</label>
                    <input type="text" value="" name="s" id="s" />
                    <input type="submit" id="searchsubmit" value="Search" />
                </div>
            </form></p>
                    </section>

                    <footer class="article-footer">
                            <p>This is the 404.php template.</p>
                    </footer> -->

                </article>

            </div>

        </div>

    </section>
    <footer class="footer" role="contentinfo">

        <div class="wrap cf">

            <div class="wow fadeIn footer-logo"><img src="/frontend/images/logo-wingz-admin.png" alt="Wingz Online"/></div>
            <p class="wow fadeIn tagline">Spend More Time in the Air</p>

            <nav role="navigation">
                <ul id="menu-footer-menu" class="nav footer-nav cf">
                    <li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-16 current_page_item menu-item-59"><a href="/">Home</a></li>
                    <li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="about">About</a></li>
                    <li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-56"><a href="terms-conditions">Terms &#038; Conditions</a></li>
                    <li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="questions">Questions?</a></li>
                </ul>
            </nav>

            <div id="login-modal" class="remodal" data-remodal-id="modalLogin">
                <div class="login-form">

                    <p id="logo" class="h1"><a href="index.php" rel="nofollow"><img src="/frontend/images/logo-wingz.png" alt="Wingz Online" /></a>

                    </p>

                </div>
            </div><!-- end remodal -->

        </div>

    </footer>

</div> <!-- end container, animsition -->

@include('layout._footer')
@yield('footer')

</body>


</html>
