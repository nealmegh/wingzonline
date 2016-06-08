@extends('wingz/foundation::layouts.table-with-sidebar')

@section('navbar')
	<div class="col-md-3 hide-sidebar right-sidebar">
	@include('wingz/renters::widgets.flight-history')
	</div>
@endsection

{{--table comes from table builder--}}