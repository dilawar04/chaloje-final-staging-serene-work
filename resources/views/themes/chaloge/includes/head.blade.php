<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" id="csrf_token" content="{{ csrf_token() }}">

    <title>{{ \App\Theme::title() }}</title>
    <meta name="keywords" content="{{ \App\Theme::meta('keywords') }}">
    <meta name="description" content="{{ \App\Theme::meta('description') }}">
    <meta name="robots" content="{{ opt('robots') }}">

    <link rel="shortcut icon" href="{{ asset_url('images/' . opt('favicon'), 1) }}"/>

    <script src='{{ media_url("js/jquery-3.6.0.min.js") }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i">

    @if(env('APP_ENV') == 'local')
    <link rel="stylesheet" type="text/css" href="{{ media_url("slick/slick/slick.css") }}"/>
    <!-- // Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="{{ media_url("slick/slick/slick-theme.css") }}"/>
       <!-- Required Stylesheets -->    
       <link href="{{ media_url("css/bootstrap-datepicker.css") }}" rel="stylesheet" />
       <link href="{{ media_url("css/bootstrap-datepaginator.css") }}" rel="stylesheet" />
       <link href="{{ media_url("css/qunit-1.12.0.css") }}" rel="stylesheet" />
         
        <link rel="stylesheet" href="{{ media_url("css/bootstrap.min.css") }}">
        <!--{{-- <link rel="stylesheet" href="{{ media_url("custom/css/bootstrap.min.css") }}" /> --}}-->
        <link rel="stylesheet" href="{{ media_url("css/animate.min.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/magnific-popup.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/fontawesome-all.min.css") }}">
        <!--{{-- <link rel="stylesheet" href="{{ media_url("css/bootstrap-datepicker.min.css") }}"> --}}-->
        <link rel="stylesheet" href="{{ media_url("css/odometer.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/flaticon.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/jquery-ui.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/slick.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/default.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/style.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/responsive.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/main.1fd2a833.css") }}">
        <link rel="stylesheet" href="{{ media_url("css/custom.css") }}">
   <!--{{-- <!-- Latest compiled and minified CSS -->-->
   <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">-->

   <!-- Optional theme -->
   <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css"> --}}-->

    @else
        <link rel="stylesheet" href="{{ media_url('css/all.css') }}"/>
    @endif

</head>
