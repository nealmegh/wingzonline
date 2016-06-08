@include('layout._header')


<body class="home {{ get_meta('html::class') }}">

<div id="container" class="animsition">

    @include('layout.main._header')

    @yield('content')

    @include(('layout.main._footer'))

</div> <!-- end container, animsition -->

@include('layout._footer')
@yield('footer')
@stack('frontend.footer')

</body>


</html>
