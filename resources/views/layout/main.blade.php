<!doctype html>
<html lang="en" class="no-js">
<head>
    <title>@yield('title', 'Photodrome')</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/shutter-assets.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body class="dark-skin">

<!-- Container -->
<div id="container">
    <!-- Header
        ================================================== -->
    @include('partials.header')
    <!-- End Header -->

    <!-- photos-section
        ================================================== -->
    <section class="photos-section masonry">
        @include('partials.top_menu')
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
    <img alt="" src="images/loader.gif">
</div>

<script src="js/shutter-plugins.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>
