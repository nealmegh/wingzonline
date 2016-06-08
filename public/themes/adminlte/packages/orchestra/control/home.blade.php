@extends('orchestra/foundation::layouts.main')

@section('content')

	<div class="col-md-12 ">
		@include('orchestra/control::widgets._menu')
			<div class="box-header">
				<h1>Control Panel</h1>
			</div>
			<div class="box-body">
				<p>Welcome to Orchestra Control Panel.</p>
			</div>
	</div>
@stop
