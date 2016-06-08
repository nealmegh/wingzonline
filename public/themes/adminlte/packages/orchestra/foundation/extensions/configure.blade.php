@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="row">
    <div class="col-md-8">
        {!! $form !!}
    </div>
    <div class="col-md-4">
        @placeholder('orchestra.extensions')
        @placeholder('orchestra.helps')
    </div>
</div>
@stop
