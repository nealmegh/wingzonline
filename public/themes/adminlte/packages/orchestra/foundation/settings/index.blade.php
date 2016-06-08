@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="col-md-12">
    <div class="col-md-9 middle">
        {!! $form !!}
    </div>
    {{--<div class="four columns">--}}
        {{--@placeholder('orchestra.settings')--}}
        {{--@placeholder('orchestra.helps')--}}
    {{--</div>--}}
</div>
@stop

@push('orchestra.footer')
@include('orchestra/foundation::settings._script')
@endpush
