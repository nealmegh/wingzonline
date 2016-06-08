@extends('orchestra/foundation::layouts.main')

@set_meta('header::no-padding', 'no-padding')


@section('navbar')
	<div class="col-md-3 hide-sidebar right-sidebar">
	@include('wingz/foundation::widgets.flight-history-sidebar')
	</div>
@endsection

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

	//The Calender

	var date = new Date();
	$('#calendar2').datepicker('setDate', '2016-05-16');


</script>
{{--@include('wingz/foundation::admin._script')--}}
@endpush