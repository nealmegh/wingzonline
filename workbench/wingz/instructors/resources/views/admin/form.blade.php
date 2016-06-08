@extends('orchestra/foundation::layouts.main')

{{--@section('navbar')--}}
	{{--<div class="col-md-3">--}}
	{{--@include('wingz/instructors::widgets.header')--}}
	{{--</div>--}}
{{--@endsection--}}

@section('content')
{{--@include('orchestra/story::widgets.header')--}}
	<div class="col-md-12">
		{!! $form !!}
	</div>

@stop


@push('orchestra.footer')
@include('wingz/instructors::admin._script')
@endpush