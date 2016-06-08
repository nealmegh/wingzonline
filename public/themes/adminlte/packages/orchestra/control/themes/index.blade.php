@extends('orchestra/foundation::layouts.page')

@section('content')
	<div class="col-md-12">
	@include('orchestra/control::widgets._menu')
		<div class="box no-border">

		@if(empty($themes))
			<div class="page-header">
				<h2>We can't find any theme yet!</h2>
			</div>
			<p>Don't worry, you can stil use Orchestra without a theme :)</p>
		@else
			@include('orchestra/control::themes._list')
		@endif
		</div>

	</div>
@stop
