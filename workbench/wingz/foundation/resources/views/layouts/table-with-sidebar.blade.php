@extends('orchestra/foundation::layouts.main')

@set_meta('header::no-padding', 'no-padding')

@section('content')
<div id="turn-12" class="col-md-9">
	{!! $table !!}
</div>
@stop


@push('orchestra.footer')


<script>
	$(document).ready(function () {
		var height = $(".hide-sidebar").height();
		$("#turn-12").height(height);
	});

	// Close sidebar
	$("#close-sidebar").on('click', function(){
		$(".hide-sidebar").remove();
		$( "#turn-12" ).removeClass( "col-md-9" ).addClass( "col-md-12" );
	})
//
//	$(function () {
//		var width = $('.datepicker table tr td').width();
//		$('.datepicker table tr td').height(width);
//	});


</script>
{{--@include('wingz/companies::admin._script')--}}
@endpush