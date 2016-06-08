@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}
@set_meta('header::no-padding', 'no-padding')

@section('content')
	<div class="col-md-12 aircraft">
	{!! $table !!}
	</div>
@stop
