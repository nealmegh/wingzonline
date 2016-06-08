@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}

@set_meta('header::add-button', $create)
@set_meta('header::no-padding', 'no-padding')

@section('content')
@include('wingz/companies::widgets.header')

<div class="row">
	<div class="col-md-12 white rounded box">

	</div>
</div>

@stop
