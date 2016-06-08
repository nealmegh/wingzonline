@extends('orchestra/foundation::layouts.main')

@section('navbar')
	<div class="col-md-3">
	@include('wingz/foundation::widgets.header')
	</div>
@endsection

@section('content')
{{--@include('orchestra/story::widgets.header')--}}
	<div class="col-md-9">
		<!-- THE CALENDAR -->
		<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
	</div>

@stop


@push('orchestra.footer')
@include('wingz/foundation::admin._script')
@endpush