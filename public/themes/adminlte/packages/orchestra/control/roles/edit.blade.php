@extends('orchestra/foundation::layouts.page')

@section('content')

    <div class="col-md-12">
        @include('orchestra/control::widgets._menu')

            <div class="col-md-9 middle">
                {!! $form !!}
            </div>
    </div>
@stop
