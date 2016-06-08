@extends('app')

@set_meta('html::class', 'page')

@section('content')
    <div id="content" class="available-flights">


        <section>
            <header style="background-image: url('/frontend/images/available-aircraft.jpg')">
                <h1 class="page-title">Available Flights</h1>
            </header>
        </section>

        <section class="animated fadeIn cf">

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">

                    <div class="search-aircraft-container">
                        <div class="search-aircraft-container wow fadeIn">

                            <div class="d-2of3 search-aircraft-div">
                                <div class="search-aircraft-form">
                                    {!! Form::open(['url'=>'aircraft/available', 'method'=>'GET']) !!}
                                        <div class="search-aicraft-input">
                                            <span class="your-search">Your Search :</span>
                                            @include('frontend.partial.search')
                                        </div>
                                    {!! Form::close() !!}

                                    <div id="error_summary" class="search-aircraft-submit-error"></div>
                                </div>
                            </div>
                            <div class="d-1of3 search-aircraft-div">
                                <div class="search-aircraft-advanced-link wow fadeIn">
                                    <a class="advanced-link cf button" style="color:#fff; border:none;float:right;" href="#refine_search">Refine Search</a>
                                </div>
                            </div>

                        </div>
                    </div>



                    @include('frontend.partial.refine-search-modal-form')




                </div><!--end col-->

                <div class="m-all t-all d-all cf available-aircraft-results" id="div_search_results">

                    @foreach($aircrafts as $aircraft)
                    <div class="d-1of3 t-1of3 m-all">
                        <div class="aircarft-wrapper">
                            <img src="{{ asset($aircraft->image) }}" style="height: 225px;">
                            <div class="air-rate"><span>${{ $aircraft->price_per_hour }}</span>/hr</div>

                            <div class="air-text-wrapper">

                                <div class="air-make green">{{ $aircraft->aircraft_make }}</div>
                                <div class="air-model green">{{ $aircraft->aircraft_model }}</div>
                                <div class="air-seats">Seats : {{ $aircraft->number_of_seats }}</div>
                                <div class="air-company">Company :@if($aircraft->company != null) {{ $aircraft->company->name }} @endif</div>
                                <div class="air-airport">Airport :@if($aircraft->company != null)  {{ $aircraft->company->airport->id }} @endif</div>

                                {!! Form::open(['url'=>'aircraft/booking/'.$aircraft->id, 'method'=>'GET']) !!}
                                {!! Form::hidden('dt_pick_up', $time['dt_pick_up']) !!}
                                {!! Form::hidden('dt_return', $time['dt_return']) !!}
                                {!! Form::submit('Choose Aircraft', ['class'=>'btn choose-air-btn']) !!}
                                {!! Form::close() !!}
                                <hr>

                                <a class="more-details green" href="#short-aircraft-desc">More details</a>

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

                <!-- pagination -->
                {{--<div class="d-2of3">--}}
                    {{--<div class="paginate wrapper">--}}
                        {{--<ul>--}}
                            {{--<li><a href="" class="prev"><i class="fa fa-angle-double-left"></i></a></li>--}}
                            {{--<li><a href="" class="prev"><i class="fa fa-angle-left"></i></a></li>--}}
                            {{--<li><a href="">1</a></li>--}}
                            {{--<li><a href="" class="inactive">2</a></li>--}}
                            {{--<li><a href="">3</a></li>--}}
                            {{--<li><a href="" class="active">4</a></li>--}}
                            {{--<li><a href="">5</a></li>--}}
                            {{--<li>...</li>--}}
                            {{--<li><a href="">20</a></li>--}}
                            {{--<li><a href="" class="next"><i class="fa fa-angle-right"></i></a></li>--}}
                            {{--<li><a href="" class="next"><i class="fa fa-angle-double-right"></i></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="d-1of3 search-aircraft-div">--}}
                    {{--<div class="search-aircraft-advanced-link wow fadeIn">--}}
                        {{--<a class="advanced-link cf button" style="color:#fff; border:none;float:right;" href="#div_advanced_search">Refine Search</a>--}}
                    {{--</div>--}}
                {{--</div>--}}


                <!-- end of pagination -->

            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->



@endsection


@section('footer')
    @include('frontend.partial._homePageScript')
@endsection
