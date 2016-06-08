
<header class="header @if (get_meta('header::show')) show @endif" role="banner">
    <div class="wrap cf">
        <p id="logo" class="h1"><a href="{{ url('/') }}" rel="nofollow"><img src="/frontend/images/logo-wingz-admin.png" alt="Wingz Online" /></a>
        </p>
        <ul class="members">
            @if($user = Auth::user())
                @if($user->is('Administrator'))
                <li><a class="btn admin-sign-up" href="{{ handles('admin') }}">Account</a></li>
                @endif

                @if($user->is('Company'))
                <li><a class="btn admin-sign-up" href="{{ handles('orchestra::companies') }}">Account</a></li>
                @endif


                @if($user->is('Instructor'))
                <li><a class="btn admin-sign-up" href="{{ handles('orchestra::instructors') }}">Account</a></li>
                @endif

                @if($user->is('Renter'))
                <li><a class="btn admin-sign-up" href="{{ handles('orchestra::renters') }}">Account</a></li>
                @endif

                <li><a class="grey-text" href="{{ url('admin/logout') }}">Logout</a></li>
            @else
                <li><a class="btn admin-sign-up" href="{{ url('create-user-account') }}">Sign Up</a></li>
                <li><a class="grey-text" href="#modalLogin">Login</a></li>
            @endif
            <li><a class="btn-round grey-text" href="{{ url('questions') }}">?</a></li>
        </ul>
    </div><!--end wrap-->
</header>