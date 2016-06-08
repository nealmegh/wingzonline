@extends('wingz/foundation::layouts.table-with-sidebar')

@section('navbar')
	<div class="col-md-3 hide-sidebar right-sidebar">
	@include('wingz/instructors::widgets.time-off')
	</div>
@endsection

{{--table comes from table builder--}}


@push('orchestra.footer')
<script>
	$('.datepicker').datepicker('setDate', '0');
	//Timepicker
	//The Calender
	$('#timepicker1').timepicker();
	$('#timepicker2').timepicker();

</script>
@endpush