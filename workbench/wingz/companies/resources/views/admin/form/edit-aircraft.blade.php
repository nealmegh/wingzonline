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
				{!! Form::model($aircraft, ['url'=>'admin/companies/aircraft/'.$aircraft->id, 'method'=>'PATCH', 'files'=>true]) !!}
				@include('wingz/companies::admin.form._form-aircarft')
				{!! Form::close() !!}

			</div>
		<!--End content body-->
		</div>
	</div>

@stop


@push('orchestra.header')
<link href='/backend/plugins/dropzone/dropzone.css' rel='stylesheet' />
@endpush

@push('orchestra.footer')
<script src='/backend/plugins/dropzone/dropzone.js'></script>

<script>
	var elem = document.querySelector('.js-switch');
	var init = new Switchery(elem, { size: 'small' });

	// Dropzone class:
	var myDropzone = new Dropzone("#dropzoneFileUpload", { url: "/file/post"});
</script>
@endpush