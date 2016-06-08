    {{--<div class="box-body no-padding">--}}
        {{--<a id="close-sidebar" class="fa fa-angle-right close-sidebar"></a>--}}
    {{--</div>--}}
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar2" style="width: 100%"></div>
    </div>

    {{--<hr>--}}
    {{--<div class="box-body no-padding">--}}
        {{--<h3>Recently Scheduled Flights</h3>--}}
        {{--<hr>--}}
        {{--<ul>--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="yellow"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
            {{--<li class="green"><p>John Smith - </p><span>7:45 AM</span><a class="fa fa-info-mod" href="#"></a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}

    @push('orchestra.footer')


    <script>
        $(document).ready(function () {
            var height = $("#turn-12").height();
            $(".hide-sidebar").height(height);
        });

        $('#calendar2').datepicker('setDate', '0');

    </script>
    <script>
        $(function () {
            var width = $('.datepicker table tr td').width();
            $('.datepicker table tr td').height(width);
        });
    </script>
    @endpush