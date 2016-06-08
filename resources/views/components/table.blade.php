<!-- data table -->

        <div class="clearfix">
            <div style="width: 70%; float: left;">
                <form class="search-form" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search search"></i></span>
                        <input type="text" name="q" class="form-control" id="navbar-search-input" placeholder="Search">
                    </div>
                </form>
            </div>
            <div style="width: 30%; float: left; padding: 10px; text-align: right;">

                <div class="btn-group table-btn">
                    {{--<button type="button" class="btn btn-default"></button>--}}
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Export
                        <span class="fa fa-angle-down"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>

                <div class="btn-group table-btn">
                    {{--<button type="button" class="btn btn-default"></button>--}}
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Filter
                        <span class="fa fa-angle-down"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
                <div class="btn-group table-btn">
                    {{--<button type="button" class="btn btn-default"></button>--}}
                    <a href="#"><i class="fa fa-th-large"></i></a>
                    <a href="#" class="active"><i class="fa fa-th-list"></i> </a>

                </div>
            </div>


            {{--<button type="submit" class="btn btn-primary margin-left15">Status</button>--}}
            {{--<button type="submit" class="btn btn-primary margin-left15">Export</button>--}}
            {{--<button type="submit" class="btn btn-primary margin-left15">Delete</button>--}}
        </div>
        <table {!! HTML::attributable($grid->attributes(), ['class' => 'table table-bordered table-striped']) !!}>
            <thead>
            <tr>
                {{--<th>--}}
                    {{--<label>--}}
                        {{--<input type="checkbox" class="minimal" checked>--}}
                    {{--</label>--}}
                {{--</th>--}}
                {{--<th>Edit</th>--}}
                @foreach($grid->columns() as $column)
                    <th{!! HTML::attributes($column->headers ?: []) !!}>
                        {!! $column->label !!}
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($grid->data() as $row)
                <tr{!! HTML::attributes(call_user_func($grid->header(), $row) ?: []) !!}>
                    {{--<td>--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="minimal" >--}}
                        {{--</label>--}}
                    {{--</td>--}}
                    {{--<td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>--}}

                    @foreach($grid->columns() as $column)
                        <td{!! HTML::attributes(call_user_func($column->attributes, $row)) !!}>
                            {!! $column->getValue($row) !!}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            @if(! count($grid->data()) && $empty)
                <tr class="norecords">
                    <td colspan="{!! count($grid->columns()) !!}">{!! $empty !!}</td>
                </tr>
            @endif


            </tbody>

        </table>
        {!! $pagination or '' !!}




<!-- data table -->

{{--<div class="box">--}}
    {{--<div class="box-header">--}}
        {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
    {{--</div>--}}
    {{--<!-- /.box-header -->--}}
    {{--<div class="box-body">--}}
        {{--<table id="example1" class="table table-bordered table-striped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
                {{--<th>Rendering engine</th>--}}
                {{--<th>Browser</th>--}}
                {{--<th>Platform(s)</th>--}}
                {{--<th>Engine version</th>--}}
                {{--<th>CSS grade</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>Internet--}}
                    {{--Explorer 4.0--}}
                {{--</td>--}}
                {{--<td>Win 95+</td>--}}
                {{--<td> 4</td>--}}
                {{--<td>X</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>Internet--}}
                    {{--Explorer 5.0--}}
                {{--</td>--}}
                {{--<td>Win 95+</td>--}}
                {{--<td>5</td>--}}
                {{--<td>C</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>Internet--}}
                    {{--Explorer 5.5--}}
                {{--</td>--}}
                {{--<td>Win 95+</td>--}}
                {{--<td>5.5</td>--}}
                {{--<td>A</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>Internet--}}
                    {{--Explorer 6--}}
                {{--</td>--}}
                {{--<td>Win 98+</td>--}}
                {{--<td>6</td>--}}
                {{--<td>A</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>Internet Explorer 7</td>--}}
                {{--<td>Win XP SP2+</td>--}}
                {{--<td>7</td>--}}
                {{--<td>A</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Trident</td>--}}
                {{--<td>AOL browser (AOL desktop)</td>--}}
                {{--<td>Win XP</td>--}}
                {{--<td>6</td>--}}
                {{--<td>A</td>--}}
            {{--</tr>--}}


            {{--<tr>--}}
                {{--<td>Other browsers</td>--}}
                {{--<td>All others</td>--}}
                {{--<td>-</td>--}}
                {{--<td>-</td>--}}
                {{--<td>U</td>--}}
            {{--</tr>--}}
            {{--</tbody>--}}
            {{--<tfoot>--}}
            {{--<tr>--}}
                {{--<th>Rendering engine</th>--}}
                {{--<th>Browser</th>--}}
                {{--<th>Platform(s)</th>--}}
                {{--<th>Engine version</th>--}}
                {{--<th>CSS grade</th>--}}
            {{--</tr>--}}
            {{--</tfoot>--}}
        {{--</table>--}}
    {{--</div>--}}
    {{--<!-- /.box-body -->--}}
{{--</div>--}}
{{--<!-- /.box -->--}}
