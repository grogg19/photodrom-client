<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <title>@yield('title', 'Photodrome')</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('css/shutter-assets.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/forms.css') }}">

</head>
<body class="dark-skin">

<!-- Container -->
<div id="app">
    <!-- Header
        ================================================== -->
    @include('partials.header')
    <!-- End Header -->

    @if (session('status'))
        @include('flash.success')
    @endif

    <!-- photos-section
        ================================================== -->
    <section class="photos-section masonry">
        @include('partials.admin.admin_menu')
        @yield('content')
    </section>
    <!-- End portfolio section -->

    <!-- footer
        ================================================== -->
    @include('partials.footer')
    <!-- End footer -->

</div>
<!-- End Container -->

<div class="preloader">
    <img alt="" src="{{ asset('images/loader.gif') }}">
</div>

@include('partials.scripts')
</body>
</html>
