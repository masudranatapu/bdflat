<?php 
  $title = 'BDFlats | Welcome to BDFlats !';
  $meta_description = 'BDFlats';
?>
<head prefix="og: http://ogp.me/ns#">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />
<link rel="icon" type="image/png"  href="{{ asset('assets/img/favicon/favicon.png') }}">
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
<meta name="theme-color" content="#ffffff">
<title>{{ $title }}</title>
<meta name="description" content="{{ $meta_description }}" />
<meta property="og:title" content="SAMAKAL | GET THE LATEST ONLINE BANGLA NEWS !" />
<meta property="og:description" content="The Daily Samakal Brings The Latest News & Breaking News, Headlines From Bangladesh and Around The World." />
<meta name="twitter:title" content="SAMAKAL | GET THE LATEST ONLINE BANGLA NEWS !" />
<meta name="twitter:description" content="The Daily Samakal Brings The Latest News & Breaking News, Headlines From Bangladesh and Around The World." />
<meta property="og:image" content="https://samakal.com/assets/images/default_news.jpg" />
<meta name="twitter:image" content="https://samakal.com/assets/images/default_news.jpg" />
<meta name="keywords" content="Samakal, somokal, shomokal, samakal bangla, samakal online, daily samakal, daily somokal, daily shomokal, dainik samakal, dainik shomokal, bangla news, bangladesh newspapers, bengali news paper, bd newspaper, bengali news, bangla paper, bangladeshi news paper, online bangla newspaper, current News, online paper, bangla khobor, Bangladesh latest news, সমকাল, সমকাল বাংলা, সমকাল অনলাইন, দৈনিক সমকাল, অনলাইন নিউজ পেপার, আজকের নিউজ পেপার, বাংলাদেশী অনলাইন নিউজ পেপার, সকল অনলাইন পত্রিকা, অনলাইন পত্রিকার তালিকা, দৈনিক সংবাদপত্র, জাতীয় পত্রিকা, সকল অনলাইন পত্রিকা, অনলাইন নিউজ পেপার, সকল পত্রিকা, লাইভ স্কোর" />
<meta name="robots" content="index,follow">
<meta name="Developed By" content="BDFlats" />
<meta name="Developer" content="Md.Maidul Islam, Md. Rony" />
<meta property="fb:pages" content="351757248257846" />
<meta property="fb:app_id" content="276108213069474" />
<meta property="og:image:width" content="700" />
<meta property="og:image:height" content="400" />
<meta property="og:site_name" content="SAMAKAL" />
<meta property="og:url" content="https://samakal.com" />
<meta property="og:type" content="WEBSITE" />
<meta name="twitter:card" value="summary_large_image" />
<meta name="twitter:site" content="@samakaltw" />
<meta name="twitter:creator" content="@samakaltw" />
<meta name="twitter:url" content="https://samakal.com" />
<link rel="canonical" href="https://samakal.com" />


  <!--
    ============ css files ============
  -->
  <!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"-->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" -->
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" -->
  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css?v=0') }}">
  <!-- <link rel="stylesheet" href="{{asset('/assets/css/fastselect.css?v=0') }}"> -->
  <link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/normalize.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/demo.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/main.css?v=0') }}">
  <link rel="stylesheet" href="{{asset('/assets/css/responsive.css?v=0') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <meta name="theme-color" content="#fafafa">
  <input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">
  @stack('custom_css')
</head>
