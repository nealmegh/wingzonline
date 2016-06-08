<?php $user = Auth::user(); ?>
<header class="main-header">
	<nav class="navbar navbar-static-top">
		{{--<div class="container">--}}
			<div class="navbar-header">
					@if($user->is('Company')) <a href="{{ handles('orchestra::companies') }}" class="navbar-brand"> @endif
					@if($user->is('Instructor')) <a href="{{ handles('orchestra::instructors') }}" class="navbar-brand"> @endif
					@if($user->is('Renter')) <a href="{{ handles('orchestra::renters') }}" class="navbar-brand"> @endif
					@if($user->is('Administrator')) <a href="{{ handles('orchestra::/') }}" class="navbar-brand"> @endif
						<img src="/backend/images/logo-white.png">
					</a>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
				@include('orchestra/foundation::layouts.main._navigation')
			</div><!-- /.navbar-collapse -->
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">

				<ul class="nav navbar-nav">
					<li>
						@if (get_meta('header::add-button'))
							<a href="/" class="btn btn-primary create-new dropdown-toggle"  data-toggle="dropdown">{{ 'Create New' }} <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu topbar" role="menu">
								<li><a href="{!! app('url')->current() !!}/create">{{ get_meta('header::add-button', 'Add New') }}</a></li>
							</ul>
						@endif
					</li>
					<!-- Messages: style can be found in dropdown.less-->


					{{--<!-- Notifications Menu -->--}}
					{{--<li class="dropdown notifications-menu">--}}
						{{--<!-- Menu toggle button -->--}}
						{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
							{{--<i class="fa fa-bell-o"></i>--}}
							{{--<span class="label label-warning">10</span>--}}
						{{--</a>--}}
						{{--<ul class="dropdown-menu">--}}
							{{--<li class="header">You have 10 notifications</li>--}}
							{{--<li>--}}
								{{--<!-- Inner Menu: contains the notifications -->--}}
								{{--<ul class="menu">--}}
									{{--<li><!-- start notification -->--}}
										{{--<a href="#">--}}
											{{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
										{{--</a>--}}
									{{--</li><!-- end notification -->--}}
								{{--</ul>--}}
							{{--</li>--}}
							{{--<li class="footer"><a href="#">View all</a></li>--}}
						{{--</ul>--}}
					{{--</li>--}}




					@if (! is_null($user))
					<!-- User Account Menu -->
					<li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							{{--@if (App::bound('orchestra.avatar'))--}}
									{{--<!-- The user image in the navbar-->--}}
							{{--<img src="{{ App::make('orchestra.avatar')->user($user) }}" class="user-image" alt="User Image">--}}
							{{--<!-- hidden-xs hides the username on small devices so only the image appears. -->--}}
							{{--@endif--}}
							<i class="fa fa-fw fa-ellipsis-v"></i>

							{{--<span class="hidden-xs">{{ $user->first_name.' '.$user->last_name }}</span>--}}
						</a>
						<ul class="dropdown-menu topbar" role="menu">
							<li><a href="{{ handles('orchestra::users/profile') }}"><i class="fa fa-fw fa-list-alt"></i> Account Info</a></li>
							@if($user->is('Company'))
							<li><a href="{{ handles('orchestra::companies/profile') }}"><i class="fa fa-fw fa-paper-plane-o"></i> Company Profile</a></li>
							@endif

							@if($user->is('Instructor'))
							<li><a href="{{ handles('orchestra::instructors/profile') }}"><i class="fa fa-fw fa-paper-plane-o"></i> Instructor Profile</a></li>
							@endif

							@if($user->is('Renter'))
							<li><a href="{{ handles('orchestra::renters/profile') }}"><i class="fa fa-fw fa-paper-plane-o"></i> Renter Profile</a></li>
							@endif

							@if($user->is('Administrator'))
							<li><a href="{{ handles('orchestra::settings') }}"><i class="fa fa-fw fa-gear"></i> Settings</a></li>
							@endif
							<li class="divider"></li>
							<li><a href="{{ handles('orchestra::logout') }}"><i class="fa fa-fw fa-arrow-circle-o-right"></i> Logout</a></li>

						</ul>
					</li>
					@endif

				</ul>
			</div><!-- /.navbar-custom-menu -->
		{{--</div><!-- /.container-fluid -->--}}
	</nav>
</header>



