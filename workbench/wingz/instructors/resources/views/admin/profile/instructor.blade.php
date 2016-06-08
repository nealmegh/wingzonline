@extends('orchestra/foundation::layouts.main')

@section('content')
	<div class="row profile">

		<div class="col-md-9">
			<div class="content-header">
				<h1>
					Edit Account
					{{--<small>Current version 2.3.0</small>--}}
				</h1>
			</div>

			<div class="content-body">
				<section class="content">
					{!! Form::open(['url'=>'admin/companies/profile/update', 'method'=>'PATCH']) !!}
					<div class="box-header">
						<p class="pull-left">instructor Information </p>
						<button class="btn pull-right background-green" type="submit">Save Profile</button>
					</div>
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">Instructor Name</label>
								<input type="text" name="name" value="{{ $instructor->user->first_name.' '.$instructor->user->last_name }}" class="form-control" id="exampleInputEmail1" placeholder="Flight School of LA">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputEmail1">Airport Name</label>
								<input type="text" disabled="disabled" name="airport_name" value="{{ $instructor->company->airport->name }}" class="form-control" id="exampleInputEmail1" placeholder="Los Angeles International Airport">
							</div>
							<div class="col-md-6">
								<label for="exampleInputEmail1">Airport ID</label>
								<input type="text" name="airport_id" value="{{ $instructor->company->airport->id }}" class="form-control" id="exampleInputEmail1" placeholder="667E45">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">Address</label>
								<input type="text" name="address" value="{{  $instructor->user->address }}" class="form-control" id="exampleInputPassword1" placeholder="5468 Flight School Road">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">City</label>
								<input type="text" name="city" value="{{ $instructor->user->city }}" class="form-control" id="exampleInputPassword1" placeholder="Los Angeles">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">State</label>
								<input type="text" name="state" value="{{ $instructor->user->state }}" class="form-control" id="exampleInputPassword1" placeholder="CA">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">Zip</label>
								<input type="text" name="zip" value="{{ $instructor->user->zip }}" class="form-control" id="exampleInputPassword1" placeholder="96734">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">Phone</label>
								<input type="text" name="phone" value="{{ $instructor->user->phone }}" class="form-control" id="exampleInputPassword1" placeholder="12313132">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" name="email" value="{{ $instructor->user->email }}" class="form-control" id="exampleInputPassword1" placeholder="hello@example.com">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">Website</label>
								<input type="text" name="website" value="{{ $instructor->user->website }}" class="form-control" id="exampleInputEmail1" placeholder="http://flightschool.com">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">About instructor</label>
								<textarea name="about" class="form-control" rows="3" placeholder="Enter ...">{{ $instructor->about }}</textarea>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</section>

				{{--<hr>--}}

				{{--<section class="content">--}}
					{{--<div class="box-header">--}}
						{{--<p class="pull-left">Business Hours</p> <a class="btn pull-right background-green" data-toggle="modal" data-target="#businessHour">+ Add Hours</a>--}}


					{{--</div>--}}

					{{--<div class="box-body">--}}
						{{--//--}}
					{{--</div>--}}

				{{--</section>--}}



			</div>
			<!--End content body-->
		</div>
	</div>

@stop


@push('orchestra.footer')


<script>
	//	$(document).ready(function () {
	//		var height = $(".hide-sidebar").height();
	//		$("#turn-12").attr('min-height',height);
	//	});

	// Close sidebar
	$("#close-sidebar").on('click', function(){
		$(".hide-sidebar").remove();
		$( "#turn-12" ).removeClass( "col-md-9" ).addClass( "col-md-12" );
	})

	//The Calender
	$('#timepicker1').timepicker();
	$('#timepicker2').timepicker();



</script>
{{--@include('wingz/instructors::admin._script')--}}
@endpush