<section class="content">
    <div class="box-header">
        <p class="pull-left">Aircraft Information</p>
        <button class="btn pull-right background-green" type="submit">Save Profile</button>
    </div>
    <div class="box-body">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Make</label>
                {!! Form::text('aircraft_make', null, ['class'=>'form-control', 'placeholder'=>'Made by']) !!}
            </div>
            <div class="col-md-6">
                <label for="exampleInputEmail1">model</label>
                {!! Form::text('aircraft_model', null, ['class'=>'form-control', 'placeholder'=>'Put Model Number']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="exampleInputEmail1">Tail Number</label>
                {!! Form::text('tail_no', null, ['class'=>'form-control', 'placeholder'=>'Put Tail Number']) !!}
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1">Number of Seats</label>
                {!! Form::text('number_of_seats', null, ['class'=>'form-control', 'placeholder'=>'Put Number of Seats']) !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="exampleInputPassword1">Price Per Hour</label>
                {!! Form::text('price_per_hour', null, ['class'=>'form-control', 'placeholder'=>'Put Price Per Hour']) !!}
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="box-header">
        <p>Aircraft Image</p>
    </div>
    <div class="box-body">
        <div class="form-group row">
            <div class="col-md-12">
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>
        </div>

    </div>
    {{--					{!! Form::close() !!}--}}
</section>
<section class="content">
    {{--					{!! Form::open(['url'=>'admin/companies/aircraft']) !!}--}}
    <div class="box-header">
        <p>Visibility</p>
    </div>
    <div class="box-body">
        <div class="form-group row">
            <div class="col-md-6">
                <label>
                    @if(isset($aircraft) && $aircraft->view == 'Visible')
                        <input type="checkbox" name="view" value="Visible" class="js-switch" checked /> Aircraft searchable by Renters? Yes
                    @else
                        <input type="checkbox" name="view" value="Visible" class="js-switch" /> No
                    @endif

                </label>
            </div>
        </div>

    </div>
</section>