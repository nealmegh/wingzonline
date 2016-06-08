{{--<script>--}}
        {{--$('#company').change(function (e) {--}}
            {{--console.log(e);--}}
        {{--});--}}

        {{--$('#airport_name').change(function () {--}}
            {{--var name = $(this).val();--}}
            {{--$('#airport_id').val(name);--}}
        {{--});--}}
{{--</script>--}}


<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>


<script>

    $(function() { // document ready

        $('#calendar').fullCalendar({
            now: '2016-04-30',
            editable: false, // enable draggable events
            aspectRatio: 1.8,
            scrollTime: '00:00', // undo default 6am scrollTime
            header: {
                left: 'today prev,next',
                center: 'title',
                right: 'timelineDay,timelineThreeDays,agendaWeek,month'
            },
            defaultView: 'timelineDay',
            views: {
                timelineThreeDays: {
                    type: 'timeline',
                    duration: { days: 3 }
                }
            },
            resourceLabelText: 'Aircraft',
            resources: [
                { id: 'a', title: 'H9387'},
                { id: 'b', title: 'H9387'},
                { id: 'c', title: 'H9387'},
                { id: 'd', title: 'H9387'},
                { id: 'e', title: 'H9387'},
                { id: 'f', title: 'H9387'},
                { id: 'g', title: 'H9387'},
                { id: 'h', title: 'H9387'},
                { id: 'i', title: 'H9387'},
                { id: 'j', title: 'H9387'}
            ],
            events: [
                { id: '1', resourceId: 'a', start: '2016-04-30T02:00:00', end: '2016-04-30T07:00:00', title: 'event 1', color: 'orange' },
                { id: '2', resourceId: 'b', start: '2016-04-30T05:00:00', end: '2016-04-30T22:00:00', title: 'event 2', color: 'green' },
                { id: '3', resourceId: 'c', start: '2016-04-30', end: '2016-04-30', title: 'event 3' },
                { id: '4', resourceId: 'd', start: '2016-04-30T03:00:00', end: '2016-04-30T08:00:00', title: 'event 4' },
                { id: '5', resourceId: 'e', start: '2016-04-30T00:30:00', end: '2016-04-30T02:30:00', title: 'event 5' },
                { id: '6', resourceId: 'f', start: '2016-04-30T02:00:00', end: '2016-04-30T07:00:00', title: 'event 1' },
                { id: '7', resourceId: 'g', start: '2016-04-30T05:00:00', end: '2016-04-30T22:00:00', title: 'event 2' },
                { id: '8', resourceId: 'h', start: '2016-04-30', end: '2016-04-30', title: 'event 3' },
                { id: '9', resourceId: 'i', start: '2016-04-30T03:00:00', end: '2016-04-30T08:00:00', title: 'event 4' },
                { id: '10', resourceId: 'j', start: '2016-04-30T03:00:00', end: '2016-04-30T08:00:00', title: 'event 4' }
            ]
        });

    });

</script>