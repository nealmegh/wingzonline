@extends('orchestra/foundation::layouts.main')

@set_meta('header::add-button', true)

@section('content')
{{--	@include('orchestra/foundation::users._search')--}}
	<div class="col-md-12">
		{!! $table !!}
	</div>
</div>
@stop
