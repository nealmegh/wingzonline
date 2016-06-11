    {{--<div class="box-body no-padding">--}}
        {{--<a id="close-sidebar" class="fa fa-angle-right close-sidebar"></a>--}}
    {{--</div>--}}
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar2" style="width: 100%"></div>
    </div>

    <hr>
    <div class="box-body no-padding">
        <h3>Upcoming Flights</h3>
        <hr>
        <ul class="flight-schedule">
            @forelse($upcomingEvents as $event)
                <li class="green"><p>{{ $event->instructor->user->first_name }} - </p><span>7:45 AM</span><a class="fa  fa-info-mod" href="#"></a></li>
            @empty
                <li class="empty"><p>No Upcoming Flight</p></li>
            @endforelse

        </ul>
    </div>

    <hr>

    <div class="box-body no-padding">
        <h3>Pending Flights</h3>
        <hr>
        <ul class="flight-schedule">
            @forelse($pendingEvents as $event)
                <li class="green"><p>{{ $event->instructor->user->first_name }} - </p><span>{{ $event->dt_pick_up }}</span><a class="fa  fa-info-mod" href="#"></a></li>
            @empty
                <li class="empty"><p>No Pending Flights</p></li>
            @endforelse
        </ul>
    </div>


@push('orchestra.footer')

@endpush