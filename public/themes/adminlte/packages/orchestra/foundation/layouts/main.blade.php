<!DOCTYPE html>
<html>
<head>
	@include('orchestra/foundation::layouts._header')
</head>
<body class="hold-transition skin-blue layout-top-nav  @if (get_meta('header::no-padding')) no-padding @endif">
	<div class="wrapper">
		@include('orchestra/foundation::layouts.main._header')
		<div class="content-wrapper">
			{{--<div class="container">--}}
{{--				@include('orchestra/foundation::components.header')--}}
				<section class="content">
						@include('orchestra/foundation::components.messages')
						@yield('content')
						@yield('navbar')
				</section>
			{{--</div>--}}
		</div>
		<div class="clearfix"></div>
		{{--@include('orchestra/foundation::layouts.main._footer')--}}
		@include('orchestra/foundation::layouts._footer')
	</div>
</body>
</html>
