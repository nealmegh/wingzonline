    {{--<div class="box-body no-padding">--}}
        {{--<a id="close-sidebar" class="fa fa-angle-right close-sidebar"></a>--}}
    {{--</div>--}}


    <div class="box-body no-padding">
        <h3>Enter Time Off</h3>
        <hr>
        {!! Form::open(['url'=>'admin/instructors/time-off']) !!}

        <div class="form-group">

            <div class="input-group bootstrap-timepicker timepicker">
                <input type="text" name="start_date" class="form-control pull-right datepicker" id="" >
                <input type="text" name="start_time" class="form-control" id="timepicker1">
            </div>
            <!-- /.input group -->
        </div>
        <hr>
        <div class="form-group">
            <div class="input-group bootstrap-timepicker timepicker">
                <input type="text" name="end_date" class="form-control pull-right datepicker" id="" placeholder="End Date">
                <input type="text" name="end_time" class="form-control" id="timepicker2" placeholder="End Time">
            </div>
            <!-- /.input group -->
        </div>
        <!-- checkbox -->
        <div class="form-group">
            <label>
                <input type="checkbox" value="true" name="all_day" class="minimal"> All Day
            </label>
        </div>
        <hr>
        <button type="button" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-default">All Time Off</button>

        {!! Form::close() !!}

    </div>


