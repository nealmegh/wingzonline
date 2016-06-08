@extends('orchestra/foundation::layouts.page')

@set_meta('header::add-button', true)

@section('content')


	<div class="col-md-12">
		@include('orchestra/control::widgets._menu')
		{!! $table !!}
	</div>
@stop
