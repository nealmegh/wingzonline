@extends('orchestra/foundation::layouts.main')

@section('content')
	<div class="row profile">

		<div class="col-md-9">
			<div class="content-header">
				<h1>Renter Profile</h1>
			</div>

			<div class="content-body">
				<section class="content">
					<div class="box-header">
						<p class="pull-left">Renter Information</p>
						<button class="btn pull-right background-green" type="submit">Save Profile</button>
					</div>
					<div class="box-body">
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputEmail1">Renter Name</label>
								<input type="text" class="form-control" id="exampleInputEmail1" value="{{ $renter->user->first_name.' '.$renter->user->last_name }}" placeholder="">
							</div>
							<div class="col-md-6">
								<label for="exampleInputEmail1">Renter Email</label>
								<input type="text" class="form-control" id="exampleInputEmail" value="{{ $renter->user->email }}" placeholder="Renter Email">

							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="exampleInputEmail1">Renter Phone</label>
								<input type="text" class="form-control" id="exampleInputEmail1" value="{{ $renter->user->phone }}" placeholder="Los Angeles International Airport">
							</div>
							<div class="col-md-6">
								<label for="exampleInputEmail1">Default Airport</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Los Angel's International Airport">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">About</label>
								<textarea class="form-control" name="about" id="exampleInputEmail1">About...</textarea>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<label for="exampleInputEmail1">Profile Picture</label>
								<textarea class="form-control" name="about" id="exampleInputEmail1">About...</textarea>
							</div>
						</div>

					</div>
				</section>


			</div>
		<!--End content body-->
		</div>
	</div>
@stop


@push('orchestra.footer')


@endpush