@extends('orchestra/foundation::layouts.main')

#{{ use Orchestra\Support\Str }}

@set_meta('header::add-button', '/')
@set_meta('header::no-padding', 'no-padding')


@section('navbar')
    <div class="col-md-3 hide-sidebar right-sidebar">
        @include('wingz/instructors::widgets.header')
    </div>
@endsection

@section('content')
    {{--@include('orchestra/story::widgets.header')--}}
    <div id="turn-12" class="col-md-9">
        {!! $table !!}
    </div>

@stop


@push('orchestra.footer')


<script>



    //The Calender
    $("#calendar2").datepicker();

    // Close sidebar
    $("#close-sidebar").on('click', function(){
        $(".hide-sidebar").remove();
        $( "#turn-12" ).removeClass( "col-md-9" ).addClass( "col-md-12" );
    })

    $(document).ready(function () {
        var height = $(".hide-sidebar").height();
        $("#turn-12").height(height);
    });


</script>
{{--@include('wingz/instructors::admin._script')--}}
@endpush