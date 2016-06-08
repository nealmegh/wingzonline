@extends('static-layout')

@section('content')
	<div id="content">
		<section>

			<header style="background-image: url('/frontend/images/available-aircraft.jpg')">
				<h1 class="page-title">Create User Account</h1>
			</header>
			{{--<header>--}}
				{{--<h1 class="page-title"></h1>--}}
			{{--</header>--}}

			<div class="wrap cf">
				<div class="m-all t-all d-all cf">

					<section class="entry-content cf">
						@include('orchestra/foundation::components.messages')

						<div id='divCreateAccount'>

							<div>
								<div class="login-form-admin">
									@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
									@endif

									{!! $form !!}
								</div>
							</div><!-- end remodal -->

						</div>


					</section>


				</div><!--end col-->

			</div><!--end wrap-->

		</section><!--end intro-->

	</div><!--end content-->
	</div>

@stop


@section('frontend:footer')
@include('admin._script')
@stop

@push('frontend.footer')
<script type="text/javascript">

	var moment = rome.moment;
	rome(medical_class_date, {
		"inputFormat": "MM/DD/YYYY"
		,time: false
	});

	rome(custom_flight_date, {
		"inputFormat": "MM/DD/YYYY"
		,time: false
	});

	rome(last_flight_review_date, {
		"inputFormat": "MM/DD/YYYY"
		,time: false
	});

	rome(expiration_date, {
		"inputFormat": "MM/DD/YYYY"
		,time: false
	});

	rome(issue_date, {
		"inputFormat": "MM/DD/YYYY"
		,time: false
	});
</script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@endpush