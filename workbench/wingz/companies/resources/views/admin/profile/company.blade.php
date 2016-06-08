@extends('orchestra/foundation::layouts.main')

@section('content')
	<div class="row profile">

		<div class="col-md-9">
			<div class="content-header">
				<h1>
					Edit Account
				</h1>
			</div>

			<div class="content-body">
				<section class="content">
					{!! Form::open(['url'=>'admin/companies/profile/update', 'method'=>'PATCH']) !!}
					<div class="box-header">
						<p class="pull-left">Company Information</p>
						<button class="btn pull-right background-green" type="submit">Save Profile</button>
					</div>
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">Company Name</label>
								<input type="text" name="name" value="{{ $company->name }}" class="form-control" id="exampleInputEmail1" placeholder="Flight School of LA">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputEmail1">Airport Name</label>
								<input type="text" disabled="disabled" name="airport_name" value="{{ $company->airport->name }}" class="form-control" id="exampleInputEmail1" placeholder="Los Angeles International Airport">
							</div>
							<div class="col-md-6">
								<label for="exampleInputEmail1">Airport ID</label>
								<input type="text" name="airport_id" value="{{ $company->airport_id }}" class="form-control" id="exampleInputEmail1" placeholder="667E45">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">Address</label>
								<input type="text" name="address" value="{{  $company->address }}" class="form-control" id="exampleInputPassword1" placeholder="5468 Flight School Road">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">City</label>
								<input type="text" name="city" value="{{ $company->city }}" class="form-control" id="exampleInputPassword1" placeholder="Los Angeles">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">State</label>
								<input type="text" name="state" value="{{ $company->state }}" class="form-control" id="exampleInputPassword1" placeholder="CA">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">Zip</label>
								<input type="text" name="zip" value="{{ $company->zip }}" class="form-control" id="exampleInputPassword1" placeholder="96734">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputPassword1">Phone</label>
								<input type="text" name="phone" value="{{ $company->phone }}" class="form-control" id="exampleInputPassword1" placeholder="12313132">
							</div>
							<div class="col-md-6">
								<label for="exampleInputPassword1">Email</label>
								<input type="email" name="email" value="{{ $company->email }}" class="form-control" id="exampleInputPassword1" placeholder="hello@example.com">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">Website</label>
								<input type="text" name="website" value="{{ $company->website }}" class="form-control" id="exampleInputEmail1" placeholder="http://flightschool.com">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">About Company</label>
								<textarea name="about" class="form-control" rows="3" placeholder="Enter ...">{{ $company->about }}</textarea>
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</section>

				<hr>

				<section class="content">
					<div class="box-header">
						<p class="pull-left">Business Hours</p> <a class="btn pull-right background-green" data-toggle="modal" data-target="#businessHour">+ Add Hours</a>


					</div>

					<div class="box-body">
						<table id="dataTable" class="table">
							<thead>
								<tr role="row">
									<th>Day(s)</th>
									<th>From</th>
									<th>To</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach($company->businessHour as $businessHour)
								<tr role="row" >
									<td>{{ $businessHour->day }}</td>
									@if($businessHour->closed == true)
										<td>Closed</td>
										<td>Closed</td>
									@else
									<td>{{ $businessHour->office_from }}</td>
									<td>{{ $businessHour->office_to }}</td>
									@endif
									<td><a href="{{ url('admin/companies/business-hour/'.$businessHour->id.'/delete') }}"><i class="fa fa-fw fa-trash-o"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</section>

				{{--<hr/>--}}

				{{--<section class="content">--}}
					{{--<div class="box-header">--}}
						{{--<p class="pull-left">Social Media</p> <a class="btn pull-right background-green"  data-toggle="modal" data-target="#socialMedia">+ Add Account</a>--}}
					{{--</div>--}}
					{{--<div class="box-body">--}}
						{{--<p>--}}
							{{--@foreach($company->socialMedia as $media)--}}
								{{--<a href="{{ $media->social_url }}" class="btn {{ $media->class }} margin">{{ $media->social_name }}</a>--}}
							{{--@endforeach--}}
						{{--</p>--}}
					{{--</div>--}}
				{{--</section>--}}
				<!-- data table -->

			</div>
		<!--End content body-->
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="businessHour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				{!! Form::open(['url'=>'admin/companies/business-hour']) !!}
				{!! Form::hidden('company_id', $company->id) !!}

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Business Hours</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						{!! Form::select('day', ['Monday'=>'Monday', 'Tuesday'=>'Tuesday', 'Wednesday'=>'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 'Saturday'=>'Saturday', 'Sunday'=>'Sunday'], null,['class'=>'form-control', 'placeholder'=>'Day\'s']) !!}
						<div class="input-group bootstrap-timepicker timepicker">
							<label for="from">From</label>
							<input id="timepicker1" name="from" type="text" class="form-control">
						</div>
						<div class="input-group bootstrap-timepicker timepicker">
							<label for="from">To</label>
							<input id="timepicker2" name="to" type="text" class="form-control">
						</div>
						<div class="input-group">
							<label for="from">Closed</label>
							<input  name="closed" value="1" type="checkbox" >
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit"  class="btn btn-primary">Save changes</button>
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="socialMedia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				{!! Form::open(['url'=>'admin/companies/social-media']) !!}
				{!! Form::hidden('company_id', $company->id) !!}

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Social Media</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						{!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Social Media']) !!}
						{!! Form::text('url', null,['class'=>'form-control', 'placeholder'=>'Link']) !!}
						{!! Form::text('class', null,['class'=>'form-control', 'placeholder'=>'Style Class. e.g. btn-*']) !!}

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit"  class="btn btn-primary">Save changes</button>
				</div>
				{!! Form::close() !!}

			</div>
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