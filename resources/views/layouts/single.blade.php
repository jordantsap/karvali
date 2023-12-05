<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Karvali Community - City Guide for visitors and travelers</title>

<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129494448-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129494448-1');
</script> --}}


    @yield('home-css')
    @yield('extra-css')
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!--FA ICONS-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!---link href="{ { asset('css/app.css') }}" rel="stylesheet"--->
    <!----link href="{ { asset('css/normalize.css') } }" rel="stylesheet"---->

    {{-- <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script> --}}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
@yield('extra-css')
</head>

<body>

{{-- @include('partials.social') --}}

@include('partials.header')

@include('partials.alerts')

  @section('content')
  @show

@include('partials.bottom')

@include('partials.footer')

</body>
</html>
