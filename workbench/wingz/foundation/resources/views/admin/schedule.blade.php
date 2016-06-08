@extends('orchestra/foundation::layouts.main')

@set_meta('header::no-padding', 'no-padding')

@section('navbar')
	<div class="col-md-3 hide-sidebar right-sidebar">
	@include('wingz/foundation::widgets.schedule-sidebar')
	</div>
@endsection

@section('content')
{{--@include('orchestra/story::widgets.header')--}}
	<div id="turn-12" class="col-md-9">
		<!-- THE CALENDAR -->
		<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
	</div>

@stop


@push('orchestra.footer')


<script>

	$(function() { // document ready

		$('#calendar').fullCalendar({
			resourceAreaWidth: 200,

			editable: false, // enable draggable events
			aspectRatio: 1,
			scrollTime: '00:00', // undo default 6am scrollTime
			header: {
				left: 'title',
				center: 'prev next',
				right: 'today'
			},
			titleFormat: '[Schedule]',

			defaultView: 'timelineDay',
			views: {
				timelineThreeDays: {
					type: 'timeline',
					duration: { days: 3 }
				}
			},

			viewRender: function (view, element) {
				//The title isn't rendered until after this callback, so we need to use a timeout.
				window.setTimeout(function(){
					$("#calendar").find('.date-title').remove();
					$("#calendar").find('.fc-prev-button').after(
					"<h3 class='date-title'>"+view.start.format('dddd MMM DD, YYYY ')+"</h3>"
					);
				},0);
			},
			resourceLabelText: 'Aircraft',
			resources: {!! $resources !!},
			events: {!! $events !!}

		});


		var moment = $('#calendar').fullCalendar('getDate');

		$('#calendar2').datepicker('setDate',  moment.format())

				.on('changeDate', function(e) {
					// `e` here contains the extra attributes
//					console.log();
					$('#calendar').fullCalendar('gotoDate', e.date);
				});

	});



	// Close sidebar
	$("#close-sidebar").on('click', function(){
		$(".hide-sidebar").remove();
		$( "#turn-12" ).removeClass( "col-md-9" ).addClass( "col-md-12" );
	})

	$(document).ready(function () {
		var height = $(".hide-sidebar").height();
		$("#turn-12").css('min-height', height);
	});




</script>
{{--@include('wingz/foundation::admin._script')--}}
@endpush