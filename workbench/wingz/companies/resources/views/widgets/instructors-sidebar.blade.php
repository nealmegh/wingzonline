{{--<div class="box-body no-padding">--}}
    {{--<a id="close-sidebar" class="fa fa-angle-right close-sidebar"></a>--}}
{{--</div>--}}
<div class="box-body no-padding input-picker">
    <div>
        <input type='text' class="form-control date-picker" id='datetimepicker1' placeholder="mm/dd/yyyy" />
        <span class="fa fa-angle-down"></span>
    </div>

    <button type="button" class="btn btn-default">Today</button>
</div>

<hr>
{{--<div class="box-body no-padding">--}}
    {{--<h3>Recently Scheduled Flights</h3>--}}
    {{--<hr>--}}
    {{--<ul class="schedule">--}}
        {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
    {{--</ul>--}}
{{--</div>--}}

@push('orchestra.footer')


<script>
     $('#datetimepicker1').datepicker();
</script>
@endpush