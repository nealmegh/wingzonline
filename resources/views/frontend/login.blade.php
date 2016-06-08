@extends('static-layout')

@section('content')


    <div id="content">
        <section>


            <header>
                <h1 class="page-title"></h1>
            </header>

            <div class="wrap cf">
                <div class="m-all t-all d-all cf">

                    <section class="entry-content cf">

                        <div id='divCreateAccount'>


                            <div>
                                <div class="login-form-admin">

                                    <p id="logo" class="h1"><a href="index.php" rel="nofollow"><img src="images/logo-wingz-admin.png" alt="Wingz Online" /></a>

                                    </p>
                                    <div class="login" id="theme-my-login1">
                                        <form action="{{ handles('orchestra::login') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            {{--<form name="loginform" id="loginform1" action="http://www.wingzonline.net/login-2/" method="post">--}}
                                            {{--<p>--}}
                                            {{--<input type="text" name="log" id="user_login1" class="input" placeholder="Username" value="" size="20" />--}}
                                            {{--<span class="fa fa-user login-u-icon"></span>--}}
                                            {{--</p>--}}
                                            {{--<p>--}}
                                            {{--<input type="password" name="pwd" id="user_pass1" class="input" placeholder="********" value="" size="20" autocomplete="off" />--}}
                                            {{--<span class="fa fa-lock login-u-icon"></span>--}}
                                            {{--</p>--}}

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


                    </section>




                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->



@endsection