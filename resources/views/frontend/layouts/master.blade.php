<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{@ $settings['site_name'] }}
        @endif
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset(@$settings['site_favicon']) }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/util.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("frontend/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("frontend/assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("frontend/assets/fonts/iconic/css/material-design-iconic-font.min.css")}}">
    <!--===============================================================================================-->
    {{-- <link href="{{asset('auth/assets/css/styles.css')}}" rel="stylesheet"> --}}
    
</head>
<?php
$socials = \App\Models\Social::where('status',1)->take(5)->get();
$footerInfo = App\models\FooterInfo::first();

?>
<body class="animsition">

    <!-- Header -->
    @include('frontend.layouts.header')

    {{-- main-content --}}
    @yield('content')
    {{-- end-main-content --}}

    @include('frontend.layouts.foodter')





    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{asset('auth/assets/js/index.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
@stack('content')

</body>
