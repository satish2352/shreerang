<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Dashboard V.1 | jeweler - Material Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{ asset('css/owl.transitions.css')}}">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
  <!-- meanmenu icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css')}}">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/main.css')}}">
  <!-- morrisjs CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/morrisjs/morris.css')}}">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
  <!-- metisMenu CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/metisMenu/metisMenu-vertical.css')}}">
  <!-- calendar CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/calendar/fullcalendar.print.min.css')}}">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('style.css')}}">
  <!-- responsive CSS =========================================== -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
  <!-- modernizr JS
		============================================ -->
  <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">


</head>

<body>
  @include('organizations.layouts.sidebar')
  @yield('content')
</body>

@extends('organizations.layouts.footer')