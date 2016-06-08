@extends('static-layout')

<?php
	set_meta('html::body', ['class' => 'login-page']);
	set_meta('html::class', 'page page-id-90 page-template page-template-page-login page-template-page-login-php');
?>

@section('content')
{{--<div class="login-box">--}}
	{{--<div class="login-logo">--}}
		{{--<a href="{{ handles('orchestra::/') }}">{{ memorize('site.name') }}</a>--}}
	{{--</div>--}}
	{{--<div class="login-box-body">--}}
		{{--<p class="login-box-msg">{{ trans('orchestra/foundation::title.login') }}</p>--}}
		{{--<form action="{{ handles('orchestra::login') }}" method="POST">--}}
			{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
			{{--<div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">--}}
				{{--<input type="text" name="username" value="{{ Input::old('username') }}" required="true" tabindex="1" class="form-control" placeholder="Username">--}}
				{{--{!! $errors->first('username', '<p class="help-block">:message</p>') !!}--}}
			{{--</div>--}}
			{{--<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">--}}
				{{--<input type="password" name="password" class="form-control" required="true" tabindex="2" class="form-control" placeholder="{{ trans('orchestra/foundation::label.users.password') }}">--}}
				{{--{!! $errors->first('password', '<p class="help-block">:message</p>') !!}--}}
			{{--</div>--}}
			{{--<div class="row">--}}
				{{--<div class="col-xs-8">--}}
					{{--<div class="checkbox">--}}
						{{--<label>--}}
							{{--<input type="checkbox" name="remember" value="yes" tabindex="3"> {{ trans('orchestra/foundation::title.remember-me') }}--}}
						{{--</label>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="col-xs-4">--}}
					{{--<button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('orchestra/foundation::title.login') }}</button>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</form>--}}

		{{--<a href="{{ handles('orchestra::forgot') }}">{{ trans('orchestra/foundation::title.forgot-password') }}</a>--}}
		{{--<br>--}}
		{{--@if (memorize('site.registrable', false))--}}
		{{--<a href="{{ handles('orchestra::register') }}" class="text-center">Register a new membership</a>--}}
		{{--@endif--}}
	{{--</div>--}}
{{--</div>--}}


<div id="content">
	<section>

		<div class="wrap cf">

			<div class="m-all t-all d-all cf">


				<section class="entry-content cf">
					<h2 style="color: #fff;  font-size: 30px;text-align: center;">Please login to access your account</h2>
					<p style="text-align: center;"></p><div class="login" id="theme-my-login">
						<p class="message">Please log in to continue.<br>
						</p>
{{--						<p class="login-box-msg">{{ trans('orchestra/foundation::title.login') }}</p>--}}
						<form  name="loginform" id="loginform" action="{{ handles('orchestra::login') }}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<p class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
								<label for="user_login">Username</label>
								<input type="text" name="username" value="{{ Input::old('username') }}" required="true" tabindex="1" class="input" placeholder="Username">
								{!! $errors->first('username', '<p class="help-block">:message</p>') !!}
							</p>
							<p class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password">Password</label>
								<input type="password" name="password" class="input" required="true" tabindex="2" placeholder="{{ trans('orchestra/foundation::label.users.password') }}">
								{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
							</p>

							{{--<input type="hidden" name="_wp_original_http_referer" value="">--}}

							<p class="forgetmenot">
								<input type="checkbox" name="remember" value="yes" tabindex="3"> {{ trans('orchestra/foundation::title.remember-me') }}
								<label for="rememberme">Remember Me</label>
							</p>
							<p class="submit">
								<input type="submit" value="Log In">
							</p>
						</form>
						<ul class="tml-action-links">
							<li><a href="/create-user-account/" rel="nofollow">Register</a></li>
							<li><a href="{{ handles('orchestra::forgot') }}">{{ trans('orchestra/foundation::title.forgot-password') }}</a> </li>
						</ul>
					</div>

					<p></p>
				</section>


			</div><!--end col-->

		</div><!--end wrap-->

	</section><!--end section-->
</div>
@stop
