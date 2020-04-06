<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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
    <title>{{ config('app.name', 'Gainstrong Manpower Inc.') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset ('images/banner.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/aos.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/media.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/font-awesome.css')}}"/>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/themes/base/jquery.ui.all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/themes/ui-lightness/jquery.ui.all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/sample.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/responsive_home.css')}}"/>   
    <link rel="stylesheet" type="text/css" href="{{asset ('css/front/home.css')}}"/>  
{{-- 
    <script type="text/javascript" src="{{asset ('js/jquery/ui/jquery.ui.core.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery/ui/jquery.ui.widget.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery/ui/jquery.ui.position.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery/ui/jquery.ui.menu.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/jquery/ui/jquery.ui.autocomplete.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset ('js/front/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/front/typing.min.js')}}"></script>
                    <script type="text/javascript" src="/js/front/aos.js"></script> 
    <script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js"></script>

    <script>
      AOS.init({
        duration: 1200, once: true
      });
    </script>

    <script type="text/javascript">
      window.onload = function () {
        initialize();
        setTimeout("hideSessionMessage()", 1000);
      };
      function hideSessionMessage() {
        $('#unsubscribe').fadeOut("slow");
      }
    </script>
    <script>
      $(function () {
        $('#logo_slider').owlCarousel({
          rtl: false,
          loop: false,
          nav: true,
          autoplay: false,
          autoplayTimeout: 1000,
          smartSpeed: 500,
          slideSpeed: 1000,
          autoplayHoverPause: true,
          goToFirstSpeed: 100,
          responsive: {
            0: {items: 2},
            479: {items: 3},
            500: {items: 3},
            766: {items: 4},
            1000: {items: 4},
            1100: {items: 5},
            1280: {items: 5}
          }

        })

      });
    </script>
<script>
$('input[type="text"]').blur(function() {
  $(window).scrollTop(0,0);
});
</script>
  </head>
  <body>
    @yield('content')
  </body>
</html>
