<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>BDFlats | Welcome to BDFlats</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type"  content="">
  <meta property="og:url"   content="">
  <meta property="og:image" content="">
  <!--
     ============ fav icon ============
  -->
  <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
  <!--
    ============ css files ============
  -->
  <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"-->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" -->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" -->
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/normalize.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/demo.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/main.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/responsive.css?v=0') }}">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta name="theme-color" content="#fafafa">
  <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
  @stack('custom_css')
</head>
