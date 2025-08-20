<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Realshed - @yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('frontend') }}/assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stylesheets -->
    <link href="{{ asset('frontend') }}/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/switcher-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        {{-- @include('frontend.layouts.includes.loader') --}}
        <!-- preloader end -->


        <!-- switcher menu -->

        <!-- end switcher menu -->

        @include('frontend.layouts.includes.header')



        @yield('main')

        <!-- main-footer -->
        @include('frontend.layouts.includes.footer')
        <!-- main-footer end -->



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('frontend') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/validation.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.fancybox.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/appear.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/scrollbar.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/isotope.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.paroller.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/product-filter.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/nav-tool.js"></script>
    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('frontend') }}/assets/js/gmaps.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/map-helper.js"></script>
    <!-- main-js -->
    <script src="{{ asset('frontend') }}/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('frontend_script')

</body><!-- End of .page_wrapper -->

</html>
