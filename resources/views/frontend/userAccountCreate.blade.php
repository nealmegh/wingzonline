@extends('app')

{{--@include('frontend.partial.state')--}}
@set_meta('html::class', 'page')

@section('content')

    <div id="content">
        <section>

            <header style="background-image: url('/frontend/images/available-aircraft.jpg')">
                <h1 class="page-title">Create User Account</h1>
            </header>

            <div class="wrap cf">
                <div class="m-all t-all d-all cf">
                    <section class="entry-content cf">
                        <div id='divCreateAccount' style="text-align: center;">

                        <a class="btn wow fadeInUp" href="{{ url('company/create') }}"  style="margin: 10px;">Create a Company Account</a>
                            <br/>
                        <a class="btn wow fadeInUp" href="{{ url('renter/create') }}"  style="margin: 10px;">Create a Renter Account</a>
                            <br/>
                        <a class="btn wow fadeInUp" href="{{ url('instructor/create') }}"  style="margin: 10px;">Create a Instructor Account</a>

</div>
                    </section>

                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->


@endsection