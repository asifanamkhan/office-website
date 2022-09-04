<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Company Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- CSS Files -->

    @include('layout.front.css')
    @yield('css')

    <!-- End CSS Files -->

</head>

<body>

<!-- ======= Header ======= -->

    @include('layout.front.header')

<!-- End Header -->

<!-- Start main Section-->
<main id="main">

    @yield('content')

</main>

<!-- End main Section-->

<!-- ======= Footer ======= -->

    @include('layout.front.footer')

<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- JS Files -->

    @include('layout.front.script')
    @yield('script')

<!-- End JS Files -->

</body>

</html>