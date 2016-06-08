@extends('app')

@set_meta('html::class', 'page')
<?php
    $dt_pick_up = date_create($time['dt_pick_up']);
    $dt_return = date_create($time['dt_return']);
?>

@section('content')
    <div id="content" class="available-flights">

        <section>
            <header style="background-image: url('/frontend/images/available-aircraft.jpg')">
                <h1 class="page-title">Book Aircraft</h1>
            </header>
        </section>

        <section class="animated fadeIn cf">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf book-aircraft">

                    <div class="centered-block">
                        <div class="d-all t-all m-all">
                            <div class="aircarft-wrapper margintop50 centered-text">
                                <img src="{{ asset($aircraft->image) }}" >

                                <div class="air-rate"><span>${{ $aircraft->price_per_hour }}</span>/hr</div>

                                <div class="air-text-wrapper">
                                    {!! Form::open(['url'=>'aircraft/booking/'.$aircraft->id, 'id'=>'frm_create_account']) !!}

                                    <div class="air-make-title green">Aircraft Make: {{ $aircraft->aircraft_make }}</div>
                                    <div class="air-model-title green neg-margin-top20">Aircraft Model: {{ $aircraft->aircraft_model }}</div>

                                    <div class="advanced-search-pick-up" id="advanced_search_pick_up">
                                        <p class="advanced-search-pick-up-title">Pick Up</p>
                                        <p class="advanced-search-pick-up-month">{{ date_format( $dt_pick_up,"M") }}</p>
                                        <p class="advanced-search-pick-up-day">{{ date_format( $dt_pick_up,"d") }}</p>
                                        <p class="advanced-search-pick-up-time">{{ date_format( $dt_pick_up,"h:i a") }}</p>
                                    </div>

                                    <div class="advanced-search-return" id="advanced_search_return">
                                        <p class="advanced-search-return-title">Return</p>
                                        <p class="advanced-search-return-month">{{ date_format( $dt_return,"M") }}</p>
                                        <p class="advanced-search-return-day">{{ date_format( $dt_return,"d") }}</p>
                                        <p class="advanced-search-return-time">{{ date_format( $dt_return,"h:i a") }}</p>

                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="air-seats margintop20">Seats : {{ $aircraft->number_of_seats }}</div>
                                    <div class="air-company">Company : {{ $aircraft->company->name }}</div>
{{--                                    <div class="air-airport">Airport : {{ $aircraft->airport->name }}</div>--}}
                                    <a class="more-details green">Company details</a>

                                    <hr>
                                    <h3 class="marginbottom20">Flight Instructor</h3>
                                    <input type="checkbox" name="checkbox" id="checkbox_id" value="value">
                                    <label for="checkbox_id">Book an Instructor?</label>
                                    <select id="choose_instructor" name="instructor_id" value="" id="basic-usage-demo">
                                        <option value="">CHOOSE INSTRUCTOR:</option>
                                        @foreach($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->user->first_name.' '.$instructor->user->last_name }}</option>
                                        @endforeach
                                    </select>
                                    <a class="more-details green">Find Instructor</a>
                                    <hr>

                                    {{--<a class="" href="#book-aircraft-login">Book Aircraft</a>--}}


                                    {!! Form::hidden('dt_pick_up', date_format( $dt_pick_up,"Y-m-d H:i:s") ) !!}
                                    {!! Form::hidden('dt_return', date_format( $dt_return,"Y-m-d H:i:s") ) !!}

{{--                                    {!! Form::hidden('instructor_id', '1') !!}--}}
                                    {!! Form::hidden('aircraft_id', $aircraft->id) !!}
                                    {!! Form::hidden('company_id', $aircraft->company->id) !!}


                                    {!! Form::submit('Choose Aircraft', ['class'=>'btn choose-air-btn',  'id'=>'choose_aircraft']) !!}

                                    {!! Form::close() !!}
                                    <a class="more-details green margintop20" href="{{ url('/') }}">Cancel</a>

                                </div>
                            </div>

                            <a class="btn back" href="{{ URL::previous() }}">Back to Search</a>
                        </div>
                    </div>

                </div>


            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->



@endsection

@push('frontend.footer')
<script>
    $( document ).ready(function() {
        $("#frm_create_account").validate({
            ignore: [],
            rules: {
                instructor_id: {
                    required: true,
                }

            },
            messages: {
                instructor_id: "<div class='sign-up-error policy-agreement-error'>Please select instructor</div>"
            }

        });
    });
</script>
@endpush