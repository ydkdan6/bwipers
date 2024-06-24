<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @notifyCss
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="keywords"
        content="baby wiper, baby store, ecommerce, best, silk, quality, marketplace, modern, multi distributor, multipurpose, organic, responsive, shop, shopping, store" />
    <meta name="description" content="CheriX - Best, Silk & Quality Baby Wipers in Nigeria." />
    <meta name="" content="CherixWiper" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = "{{ asset('frontend/assets/js/webfont.js') }}";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff') }}"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/demo10.min.css') }}">
    <!--Preloader -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" />
</head>

<body class="home">
    <div class="page-wrapper">
        @include('frontend.layouts.header')
        <!-- End of Header -->

        <!-- Start of Main -->
        <main class="main">
            @yield('main-content')
        </main>
        <!-- End of Main -->

        @include('frontend.layouts.footer')
    </div>
    <!-- End of Page-wrapper -->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{ route('home') }}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="{{ url('/shop') }}" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="{{ route('user') }}" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{ route('cart') }}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                @if (Helper::getAllProductFromCart())

                    <div class="products">
                        {{-- <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-detail.html">CheriX Baby Wipes <br>
                                    120Pcs / Pack</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">#625.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-detail.html">
                                <img src="assets/images/image3.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> --}}
                        @foreach (Helper::getAllProductFromCart() as $data)
                            @php
                                $photo = explode(',', $data->product['photo']);
                            @endphp
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="{{ route('product-detail', $data->product['slug']) }}"
                                        class="product-name">{{ $data->product['title'] }}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{ $data->quantity }}</span>
                                        <span class="product-price">₦{{ number_format($data->price, 2) }}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{ route('product-detail', $data->product['slug']) }}">
                                        <img src="{{ $photo[0] }}" alt="{{ $data->product['slug'] }}"
                                            height="84" width="94" />
                                    </a>
                                </figure>
                                <button onclick="window.location.href='{{ route('cart-delete', $data->id) }}'"
                                    class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach

                        {{-- <div class="product product-cart">
                            <div class="product-detail">
                                <h3 class="product-name">
                                    <a href="product-detail.html">CheriX Baby Wipes<br>
                                        80Pcs / Packs</a>
                                </h3>
                                <div class="price-box">
                                    <span class="product-quantity">2</span>
                                    <span class="product-price">#532.99</span>
                                </div>
                            </div>
                            <figure class="product-media">
                                <a href="product-detail.html">
                                    <img src="assets/images/trans2.png" alt="product" width="84" height="94" />
                                </a>
                            </figure>
                            <button class="btn btn-link btn-close" aria-label="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div> --}}

                    <div class="cart-total">
                        <label>Subtotal:</label>
                        <span class="price">₦{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                    </div>

                    <div class="cart-action">
                        <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                    </div>
                @else
                    <style>
                        .center-vertically {
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            height: 100vh;
                            /* Optional: set a height to fill the entire viewport */
                        }

                        .center-vertically p {
                            text-align: center;
                        }
                    </style>

                    <div class="center-vertically">
                        <p>
                            There are no any carts available.<br><br>
                            <a href="{{ route('product-grids') }}"
                                class="btn btn-dark btn-rounded btn-icon-center btn-shopping mr-auto">
                                <i class="w-icon-cart"></i>Go to shop
                            </a>
                        </p>
                    </div>
                @endif
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="{{ route('product.search') }}" class="input-wrapper">
                @csrf
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i
            class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10"
                cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <a href="{{ route('product-grids') }}">Our Shop</a>
                        </li>
                        <li>
                            <a href="{{ route('distributor.onboarding') }}">Become a Distributor</a>
                        </li>
                        <li>
                            <a href="{{ route('about-us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}">FaQ</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="{{ route('user') }}">
                                <i class="w-icon-account"></i>Create account
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login.form') }}">
                                <i class="w-icon-account"></i>Log In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
    <div class="newsletter-popup mfp-hide">
        <div class="newsletter-content">
            <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">10% Off</span>
            </h4>
            <h2 class="ls-25">Sign up to CheriX</h2>
            <p class="text-light ls-10">Subscribe to the CheriX market newsletter to
                receive updates on special offers.</p>
            <form action="{{ route('subscribe') }}" method="post"
                class="input-wrapper input-wrapper-inline input-wrapper-round">
                @csrf
                <input type="email" class="form-control email font-size-md" name="email" id="email2"
                    placeholder="Your email address" required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox d-flex align-items-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup"
                    name="hide-newsletter-popup" required="">
                <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup
                    again.</label>
            </div>
        </div>
    </div>
    <!-- End of Newsletter popup -->
    <!-- Plugin JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/floating-parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/zoom/jquery.zoom.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.min.js') }}"></script>

    <!--Email validator-->
    <script src="{{ asset('frontend/assets/js/email-validator.js') }}"></script>

    <!--Prealoder-->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/65dc815f9131ed19d971b7a0/1hnilioan';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
