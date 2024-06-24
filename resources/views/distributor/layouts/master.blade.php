<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="keywords"
        content="baby wiper, baby store, ecommerce, best, silk, quality, marketplace, modern, multi distributor, multipurpose, organic, responsive, shop, shopping, store" />
    <meta name="description" content="CheriX - Best, Silk & Quality Baby Wipers in Nigeria." />
    @notifyCss
    <meta name="" content="CherixWiper" />
    <link rel="stylesheet" href="{{ asset('distributor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/ace-responsive-menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('distributor/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&amp;family=Poppins:wght@700&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('distributor/css/responsive.css') }}" />
    <title>CheriX -Best & Quality Baby Wipes</title>
    <link href="images/main-logo3.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />

    <style>
        @media only screen and (max-width: 800px) {
            header {
                position: fixed;
            }

            .img-logo {
                height: 3rem;
            }
        }
    </style>
    @yield('styles')
</head>

<body data-spy="scroll">
  
  <div class="wrapper">
      {{-- @include('notify::components.notify') --}}

        @include('distributor.layouts.header')

        <div class="dashboard_content_wrapper">
            <div class="dashboard dashboard_wrapper pr30 pr0-md">

                @include('distributor.layouts.sidebar')

                @yield('content')

                {{-- <x:notify-messages />  --}}

            </div>
        </div>
        <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- Wrapper End -->
    
    <script src="{{ asset('distributor/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('distributor/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('distributor/js/popper.min.js') }}"></script>
    <script src="{{ asset('distributor/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('distributor/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('distributor/js/chart.min.js') }}"></script>
    <script src="{{ asset('distributor/js/chart-custome.js') }}"></script>
    <script src="{{ asset('distributor/js/jquery.mmenu.all.js') }}"></script>
    <script src="{{ asset('distributor/js/ace-responsive-menu.js') }}"></script>
    <script src="{{ asset('distributor/js/parallax.js') }}"></script>
    <script src="{{ asset('distributor/js/jquery-scrolltofixed-min.js') }}"></script>
    <script src="{{ asset('distributor/js/wow.min.js') }}"></script>
    <script src="{{ asset('distributor/js/slider.js') }}"></script>
    <script src="{{ asset('distributor/js/range-slider.html') }}"></script>
    <script src="{{ asset('distributor/js/dashboard-script.js') }}"></script>
    <!-- Custom script for all pages -->
    <script src="{{ asset('distributor/js/script.js') }}"></script>
    @yield('scripts')
    <x-notify::notify />
    @notifyJs
</body>

</html>
