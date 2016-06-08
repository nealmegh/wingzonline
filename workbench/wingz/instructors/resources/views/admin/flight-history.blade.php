@extends('wingz/foundation::layouts.table-with-sidebar')

@section('navbar')
	<div class="col-md-3 hide-sidebar right-sidebar">
	@include('wingz/instructors::widgets.flight-history-sidebar')
	</div>
@endsection

{{--table comes from table builder--}}