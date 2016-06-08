
<ul class="nav navbar-nav">
    @if(Auth::is(['Administrator']))

    @foreach ($menu as $item)
        @if (1 > count($item->childs))
            <li id="{{ $item->id }}">
                <a href="{!! $item->link !!}">
                    {!! $item->title !!}
                </a>
            </li>
        @else
            <li id="{{ $item->id }}" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {!! $item->title !!} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @unless ($item->link == '#' && ! empty($item->link))
                        <li>
                            <a href="{!! $item->link !!}">
                                {!! $item->title !!}
                            </a>
                        </li>
                        <li class="divider"></li>
                    @endunless
                    @foreach ($item->childs as $child)
                        <?php $grands = $child->childs; ?>
                        <li class="{!! (! empty($grands) ? "dropdown-submenu" : "normal") !!}">
                            <a href="{!! $child->link !!}">
                                {!! $child->title !!}
                            </a>
                            @if (! empty($child->childs))
                                <ul class="dropdown-menu">
                                    @foreach ($child->childs as $grand)
                                        <li>
                                            <a href="{!! $grand->link !!}">
                                                {!! $grand->title !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach

    @endif


    @if(Auth::is(['Company']))
    <li><a href="{{ handles('orchestra::companies') }}" class="{{ Request::is( 'admin/companies' ) ? 'active' : null }}">Schedule</a></li>
    <li><a href="{{ handles('orchestra::companies/flight-history') }}" class="{{ Request::is( 'admin/companies/flight-history' ) ? 'active' : null }}">Flight History</a></li>
    <li><a href="{{ handles('orchestra::companies/aircraft') }}" class="{{ Request::is( 'admin/companies/aircraft' ) ? 'active' : null }}">Aircraft</a></li>
    <li><a href="{{ handles('orchestra::companies/instructors') }}" class="{{ Request::is( 'admin/companies/instructors' ) ? 'active' : null }}">Instructors</a></li>
    @endif

        @if(Auth::is(['Instructor']))
            <li><a href="{{ handles('orchestra::instructors') }}" class="{{ Request::is( 'admin/instructors' ) ? 'active' : null }}">Schedule</a></li>
            <li><a href="{{ handles('orchestra::instructors/flight-history') }}" class="{{ Request::is( 'admin/instructors/flight-history' ) ? 'active' : null }}">Flight History</a></li>
            <li><a href="{{ handles('orchestra::instructors/time-off') }}" class="{{ Request::is( 'admin/instructors/time-off' ) ? 'active' : null }}">Time Off</a></li>
        @endif

        @if(Auth::is(['Renter']))
            <li><a href="{{ handles('orchestra::renters') }}" class="{{ Request::is( 'admin/renters' ) ? 'active' : null }}">Schedule</a></li>
            <li><a href="{{ handles('orchestra::renters/flight-history') }}" class="{{ Request::is( 'admin/renters/flight-history' ) ? 'active' : null }}">Flight History</a></li>
        @endif
</ul>


