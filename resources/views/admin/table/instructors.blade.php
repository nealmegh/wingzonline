@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}

@set_meta('header::add-button', '/')

@section('navbar')
<div class="col-md-3">
@include('wingz/foundation::widgets.instructors')
</div>
@endsection

@section('content')
    <div class="col-md-9">
        {!! $table !!}
    </div>
@stop
