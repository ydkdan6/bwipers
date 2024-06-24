@yield('meta')
<!-- Title Tag  -->
<title>@yield('title', config('app.name'))</title>
@notifyCss
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">

<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: { families: ['Poppins:400,500,600,700,800'] }
    };
    (function (d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = "{{asset('frontend/assets/js/webfont.js')}}";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
    crossorigin="anonymous">
<link rel="preload" href="{{asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
<link rel="preload" href="{{asset('frontend/assets/fonts/wolmart87d5.woff?png09e')}}" as="font" type="font/woff" crossorigin="anonymous">

<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/fontawesome-free/css/all.min.css')}}">

<!-- Plugins CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/animate/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css')}}">

<!-- Default CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/demo10.min.css')}}">
<!--Preloader -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}" />
@stack('styles')













{{-- <!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png')}}">
<!-- Web Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
    position: relative;
    }

    .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
    }

    
</style>
@stack('styles') --}}
