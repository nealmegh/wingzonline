@extends('static-layout')

@section('content')


    <div id="content">
        <section>

            <header style="background-image: url('/frontend/images/available-aircraft.jpg')">
                <h1 class="page-title">Access Restriction</h1>
            </header>

            <div class="wrap cf">

                <div class="m-all t-all d-all cf">

                    <section class="entry-content cf">

                        <div class="m-all t-all d-all cf book-aircraft-result">
                            <div class="m-all t-all d-all cf m-all book-aircraft-container">

                                <div class="text-center">
                                    <p>Only a renter account can schedule aricraft. Please register as a renter.</p>

                                    <a href="{{ url('/') }}" class="btn">Search Aircraft</a>
                                    <a href="{{ url('#modalLogin') }}" class="btn">Login as a Renter.</a>
                                </div>
                            </div>
                        </div>

                    </section>


                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end section-->
    </div><!--end content-->


@endsection