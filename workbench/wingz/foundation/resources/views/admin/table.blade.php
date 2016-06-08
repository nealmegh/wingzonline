@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}
@set_meta('header::no-padding', 'no-padding')

@set_meta('header::add-button', '/')

{{--@section('navbar')--}}
	{{--<div class="col-md-3">--}}
		{{--@include('wingz/foundation::widgets.header')--}}
	{{--</div>--}}
{{--@endsection--}}

@section('content')
	<div class="col-md-12 aircraft">
	{!! $table !!}
	</div>
@stop
