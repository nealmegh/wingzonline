{{--<input type="text" placeholder="" name="" id="dt_pick_up" class="@if (count($errors) > 0 && $errors->first('dt_pick_up')) errorField @endif dtimepicker" ></input>--}}
{{--<input type="text" placeholder="" class="@if (count($errors) > 0 && $errors->first('dt_return')) errorField @endif  dtimepicker" id="dt_return" name="dt_return"></input>--}}
{{--<input type="text" placeholder="" id="search_keyword" name="" value=""></input>--}}

{!! Form::text('dt_pick_up', Input::get('dt_pick_up'),['class'=>'dtimepicker', 'id'=>'dt_pick_up', 'placeholder'=>'Pick Up:']) !!}
{!! Form::text('dt_return', Input::get('dt_return'),['class'=>'dtimepicker', 'id'=>'dt_return', 'placeholder'=>'Return:']) !!}
<select name="search_keyword" data-placeholder="Company, Airport or ID" value="" class="select2" style='width: 33.33%'>
    <option value="">Company, Airport or ID</option>
    @if(isset($lists))
        @foreach($lists as $key=>$list)
            <option value="{{ $list['id'] }}" typeof="{{ $list['type'] }}">{{ $list['value'] }}</option>
        @endforeach
    @endif
</select>




{{--{!! Form::text('search_keyword', Input::get('search_keyword'),['class'=>'select2', 'style'=>'width: 33.33%;', 'placeholder'=>'Company, Airport or ID']) !!}--}}

{!! Form::hidden('airport_id', null, ['id'=>'airport_id']) !!}
{!! Form::hidden('airport_zip', null, ['id'=>'airport_zip']) !!}
{!! Form::hidden('aircraft_make_id', null, ['id'=>'aircraft_make_id']) !!}
{!! Form::hidden('number_of_seats', null, ['id'=>'number_of_seats']) !!}
{!! Form::hidden('price_range_begin', null, ['id'=>'price_range_begin']) !!}
{!! Form::hidden('price_range_end', null, ['id'=>'price_range_end']) !!}
{!! Form::hidden('company_id', null, ['id'=>'company_id']) !!}

@section('frontend:footer')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@endsection