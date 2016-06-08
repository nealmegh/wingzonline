<!-- data table -->

        @include('orchestra/foundation::components._search')
        <table {!! HTML::attributable($grid->attributes(), ['id'=>'dataTable', 'class' => 'table table-bordered table-striped']) !!}>
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




