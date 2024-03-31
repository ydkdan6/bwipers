<header class="header has-center">
    <div class="header-top">
        <div class="container">
            {{-- <div class="preloader">
                <img src="{{asset('frontend/assets/images/trans2.png')}}" alt="Your Logo" height="55" width="154">
            </div> --}}
            <div class="header-left">
                <p class="welcome-msg">Welcome to CheriX Baby Wipes Online Store!</p>
            </div>
            <div class="header-right">
                <!-- End of DropDown Menu -->

                <div class="dropdown">
                    <a href="#language"><img src="{{asset('frontend/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14"
                            height="8" class="dropdown-image" /> ENG</a>
                    <div class="dropdown-box">
                        <a href="#ENG">
                            <img src="{{asset('frontend/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14" height="8"
                                class="dropdown-image" />
                            ENG
                        </a>
                    </div>
                </div>
                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
                <a href="{{route('contact')}}" class="d-lg-show">Contact Us</a>
                @auth
                <span class="delimiter d-lg-show">/</span> 
                <a href="{{route('user')}}" class="ml-0 d-lg-show login register">Dashboard</a>
                @else
                <a href="{{route('login.form')}}" class="d-lg-show login sign-in"><i
                    class="w-icon-account"></i>Sign In</a>
            <span class="delimiter d-lg-show">/</span>
            <a href="{{route('login.form')}}" class="ml-0 d-lg-show login register">Register</a>
                @endauth
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <form method="POST" action="{{route('product.search')}}" class="header-search hs-rounded d-none d-md-flex ml-4 ml-lg-0 input-wrapper">
                    @csrf
                    <input type="search" class="form-control" name="search" id="search"
                        placeholder="Search..." required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <!-- End of Header Left -->

            <div class="header-center">
                <a href="{{route('home')}}" class="logo ml-lg-0">
                    <img src="{{asset('frontend/assets/images/main-logo3.png')}}" alt="logo" width="145" height="45" />
                </a>
            </div>
            <!-- End of Header Center -->

            <div class="header-right">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="tel:+2349054995005" class="text-capitalize">Call</a>:</h4>
                        <a href="tel:+2349054995005" class="phone-number font-weight-bolder ls-50">+234 905 499 5005</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-none d-md-flex" href="{{route('wishlist')}}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="#" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">{{Helper::cartCount()}}</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        @if(Helper::getAllProductFromCart())
                        <div class="products">

                            @foreach(Helper::getAllProductFromCart() as $data)
                            @php
                                $photo=explode(',',$data->product['photo']);
                            @endphp
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="{{route('product-detail',$data->product['slug'])}}" class="product-name">{{$data->product['title']}}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{$data->quantity}}</span>
                                        <span class="product-price">₦{{number_format($data->price,2)}}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{route('product-detail',$data->product['slug'])}}">
                                        <img src="{{$photo[0]}}" alt="{{$data->product['slug']}}" height="84"
                                            width="94" />
                                    </a>
                                </figure>
                                <button onclick="window.location.href='{{route('cart-delete',$data->id)}}'" class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                            
                        </div>

                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">₦{{number_format(Helper::totalCartPrice(),2)}}</span>
                        </div>

                        <div class="cart-action">
                            <a href="{{route('cart')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    
                    @else
                    <style>
                        .center-vertically {
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            height: 100vh; /* Optional: set a height to fill the entire viewport */
                        }
                    
                        .center-vertically p {
                            text-align: center;
                        }
                    </style>
                    
                    <div class="center-vertically">
                        <p>
                            There are no any carts available.<br><br>
                            <a href="{{ route('product-grids') }}" class="btn btn-dark btn-rounded btn-icon-center btn-shopping mr-auto">
                                <i class="w-icon-cart"></i>Go to shop
                            </a>
                        </p>
                    </div>
                    
                    @endif
                </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
            <!-- End of Header Right -->
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown" data-visible="true">
                        <a href="#" class="category-toggle text-white" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box text-default">
                            <ul class="menu vertical-menu category-menu">
                                @foreach(Helper::getAllCategory() as $cat)
                               <li>
                                <a href="{{route('product-cat', $cat->slug)}}">
                                    <i class="w-icon-gift"></i>{{$cat->title}}
                                </a>
                               </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav ml-4">
                        <ul class="menu active-underline">
                            <li class="active">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('product-grids')}}">Our Shop</a>

                                <!-- Start of Megamenu -->
                            </li>
                            <li>
                                <a href="{{route('distributor.onboarding')}}">Become a Distributor</a>
                            </li>
                            <li>
                                <a href="{{route('about-us')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{route('faq')}}">FAQ</a>
                               
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact Us</a>
                               
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
