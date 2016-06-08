    <div class="box-body no-padding">
        {{--<a id="close-sidebar" class="fa fa-angle-right close-sidebar"></a>--}}
    </div>
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar2" style="width: 100%"></div>
    </div>

    <hr>
    <div class="box-body no-padding">
        <h3>My Upcoming Flights</h3>
        <hr>
        <ul class="flight-schedule">
            @forelse($upcomingEvents as $event)
            <li class="green"><p>{{ $event->instructor->user->first_name.' '.$event->instructor->user->last_name }} - </p><span>{{ date('h:i a', strtotime($event->dt_pick_up)) }}</span><a class="fa  fa-info-mod" href="#"></a></li>
            @empty
                <li><p>No Upcoming Flight Found</p></li>
            @endforelse

        </ul>
    </div>
    {{--<hr>--}}
    {{--<div class="box-body no-padding">--}}
        {{--<h3>My Pending Flights</h3>--}}
        {{--<hr>--}}
        {{--<ul class="flight-schedule">--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}


@push('orchestra.footer')
    {{--<script>--}}
        {{--$(function () {--}}
            {{--var width = $('.datepicker table tr td').width();--}}
            {{--$('.datepicker table tr td').height(width);--}}
        {{--});--}}
    {{--</script>--}}
@endpush