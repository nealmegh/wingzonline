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
                <div class="login" id="theme-my-login1">
                    <form action="{{ handles('login') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                            <input type="text" name="username" value="{{ Input::old('username') }}" required="true" tabindex="1" class="form-control" placeholder="Username">
                            {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" name="password" class="form-control" required="true" tabindex="2" class="form-control" placeholder="{{ trans('orchestra/foundation::label.users.password') }}">
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>


                        <ul class="tml-action-links">
                            <li class="join-now"><a href="{{ url('create-user-account') }}" rel="nofollow">Join Now!</a></li>
                            <li class="forgot-password"><a href="{{ handles('orchestra::forgot') }}" rel="nofollow">Forgot Password</a></li>
                        </ul>
                        <p class="submit">
                            <input type="submit" value="Log In" />
                        </p>
                    </form>

                </div>

            </div>
        </div><!-- end remodal -->

    </div>

</footer>