<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Gainstrong Manpower Inc." />
        <meta property="og:description" content="Best Place for find jobs" />
        <meta property="og:url" content="https://portal.gainstrongm.xyz" />
        <meta property="og:site_name" content="https://portal.gainstrongm.xyz/" />
        <meta property="fb:app_id" content="966242223397117" />
        <meta property="og:image" content="https://portal.gainstrongm.xyz/images/banner.png" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset ('images/banner.png')}}">
    <title>Gainstrong Manpower Inc.</title>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/home.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/media.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/font-awesome.css')}}"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/responsive_home.css')}}"/>   
    <script type="text/javascript" src="{{asset ('js/front/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/aos.js')}}"></script>
    <script src="../harvesthq.github.io/chosen/chosen.jquery.js"></script>
  </head>
  @include ('partial.navbar')
  <body>
    @yield('content')
  </body>
  @include ('partial.footer')
</html>
