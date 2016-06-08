@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}

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
					{!! Form::model($user, ['url'=>'admin/users/profile/update', 'method'=>'PATCH']) !!}

					<div class="box-header">
						<p class="pull-left">Personal Information</p>
						<button class="btn pull-right background-green" type="submit">Save Profile</button>
					</div>
					<div class="box-body">
									<div class="form-group row">
										<div class="col-md-6">
										<label for="exampleInputEmail1">Username</label>
										{!! Form::text('username', null, ['class'=>'form-control','disabled'=>'disabled', 'placeholder'=>'Username']) !!}
										</div>
										<div class="col-md-6">
											<label for="exampleInputEmail1">Email</label>
											{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'email@example.com']) !!}
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
										<label for="exampleInputPassword1">First Name</label>
										{!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
										</div>
										<div class="col-md-6">
											<label for="exampleInputPassword1">Last Name</label>
											{!! Form::text('last_name', null, ['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
										<label for="exampleInputPassword1">Phone</label>
										{!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Phone Number']) !!}
										</div>
										<div class="col-md-6">
											<label for="exampleInputPassword1">Position</label>
											{!! Form::text('position', null, ['class'=>'form-control', 'placeholder'=>'Flight Manager']) !!}
										</div>

									</div>

									{{--<div class="form-group row">--}}
										{{--<div class="col-md-12">--}}
											{{--<button type="submit" class="btn background-green">Update Profile</button>--}}
										{{--</div>--}}
									{{--</div>--}}
								<!-- /.box-body -->
					</div>
					{!! Form::close() !!}

				</section>


				<section class="content">
					<div class="box-header">
						<p>Change Password</p>
					</div>
					<div class="box-body">
						{!! Form::open(['url'=>'admin/users/profile/password-change', 'method'=>'PATCH']) !!}
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Old Password</label>
									<input type="password" name="old_password" class="form-control bottom-border" name="password" placeholder="&#9679; &#9679; &#9679; &#9679; &#9679; &#9679; &#9679; &#9679;">
								</div>
								<!-- /.box-body -->
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputEmail1">New Password</label>
									<input type="password" name="new_password" class="form-control bottom-border" name="password_confirm" placeholder="&#9679; &#9679; &#9679; &#9679; &#9679; &#9679; &#9679; &#9679;">
								</div>
								<!-- /.box-body -->
							</div>
							<div class="col-md-12">

								<button type="submit" class="btn background-green">Update Password</button>
							</div>
						{!! Form::close() !!}
					</div>
				</section>


				<section class="content">
					<div class="box-header">
						<p>Delete Account</p>
					</div>
					<div class="box-body">
						<div class="col-md-12">
							<br/>
							{!! Form::open(['url'=>'admin/wingz/profile/'.$user->id, 'method'=>'delete']) !!}
							<button type="submit" class="btn background-green">Delete Account</button>
							{!! Form::close() !!}
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
@stop


@push('orchestra.footer')


<script>
//	$(document).ready(function () {
//		var height = $(".hide-sidebar").height();
//		$("#turn-12").height(height);
//	});

	// Close sidebar
	$("#close-sidebar").on('click', function(){
		$(".hide-sidebar").remove();
		$( "#turn-12" ).removeClass( "col-md-9" ).addClass( "col-md-12" );
	})

	//The Calender
	$("#calendar2").datepicker();


</script>
{{--@include('wingz/foundation::admin._script')--}}
@endpush