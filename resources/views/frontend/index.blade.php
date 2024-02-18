@extends('frontend.layouts.master')
@section('title','CheriX - Best, Silk & Quality Baby Wipers in Nigeria')
@section('main-content')
<section class="intro-wrapper">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide pg-show nav-xxl-show nav-hide"
        data-swiper-options="{
        'slidesPerView': 1,
        'breakpoints': {
            '1500': {
                'nav': true,
                'dots': false
            }
        },
        'autoplay': {
            'delay': 8000,
            'disableOnInteraction': false
        }}">
        <div class="swiper-wrapper row gutter-no cols-1">
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1" style="background-image: url('{{asset('frontend/assets/images/demos/demo10/slides/slide-1.jpg')}}');
                background-color: #F7F8FA;">
                <div class="container">
                    <div class="banner-content y-50 d-inline-block">
                        <div class="slide-animate" data-animation-options="{
                            'name': 'flipInY', 'duration': '1s'
                        }">
                            <h5 class="banner-subtitle text-uppercase font-weight-bold ls-10">Quality and Silk Baby Wipes</h5>
                            <h3 class="banner-title text-capitalize font-weight-normal ls-25">
                                <strong>CheriX Wipes</strong><br>Collection
                            </h3>
                            <p class="ls-25">Get Free Shipping on all orders over (Baby & Adult) </p>
                            <a href="{{route('product-grids')}}"
                                class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                                Order Now<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
                style="background-image: url('{{asset('frontend/assets/images/img-1.jpg')}}'); background-color: #434448;">
                <div class="container">
                    <figure class="floating-item slide-animate" data-animation-options="{
                        'name': 'fadeInDownShorter', 'duration': '1s'
                    }" data-options="{'relativeInput':false,'clipRelativeInput':false,'invertX':true,'invertY':true}"
                        data-child-depth="0.2">
                        <img src="{{asset('frontend/assets/images/trans2.png')}}" alt="Ski" width="660" height="439" />
                    </figure>
                    <div class="banner-content d-inline-block text-left y-50">
                        <div class="slide-animate">
                            <h5 class="banner-subtitle text-primary text-capitalize font-weight-bold">Special
                                Offer</h5>
                            <h3 class="banner-title text-uppercase text-white mb-0">Big Sale</h3>
                            <div class="banner-price-info text-white font-weight-normal text-uppercase ls-50">
                                Up To <strong class="text-secondary" style="color: black;">75% Off</strong>
                            </div>
                            <a href="{{route('product-grids')}}"
                                class="btn btn-white btn-outline btn-rounded btn-icon-right">
                                Order Now<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
                style="background-image: url({{asset('frontend/assets/images/demos/demo10/slides/slide-3.jpg')}}); background-color: #f0f0f0;">
                <div class="container text-right">
                    <div class="banner-content d-inline-block y-50">
                        <div class="slide-animate" data-animation-options="{
                            'name': 'fadeInLeftShorter', 'duration': '1s'
                        }">
                            <h5 class="banner-subtitle text-primary text-uppercase ls-10">Amazing & Quality
                                Wipes</h5>
                            <h3 class="banner-title text-capitalize">Baby Care Better With Our Wipes.</h3>
                            <a href="{{route('product-grids')}}"
                                class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                                Order Now<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
</section>


<div class="container">
    <div class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10 appear-animate"
        data-swiper-options="{
        'loop': true,
        'slidesPerView': 1,
        'autoplay': {
            'delay': 4000,
            'disableOnInteraction': false
        },
        'breakpoints': {
            '576': {
                'slidesPerView': 2
            },
            '768': {
                'slidesPerView': 3
            },
            '992': {
                'slidesPerView': 3
            },
            '1200': {
                'slidesPerView': 4
            }
        }
    }">
        <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
            <div class="swiper-slide icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-truck"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title ls-normal">Free Shipping & Returns</h4>
                    <p class="text-default">For all orders over $99</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-payment">
                    <i class="w-icon-bag"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title ls-normal">Secure Payment</h4>
                    <p class="text-default">We ensure secure payment</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side text-dark icon-box-money">
                <span class="icon-box-icon icon-money">
                    <i class="w-icon-money"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title ls-normal">Money Back Guarantee</h4>
                    <p class="text-default">Any back within 30 days</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side text-dark icon-box-chat">
                <span class="icon-box-icon icon-chat">
                    <i class="w-icon-chat"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title ls-normal">Customer Support</h4>
                    <p class="text-default">Call or email us 24/7</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Iocn Box Wrapper -->

    <div class="swiper-container swiper-theme category-banner-3cols pt-2 pb-2 mb-10 appear-animate"
        data-swiper-options="{
        'spaceBetween': 20,
        'slidesPerView': 1,
        'breakpoints': {
            '576': {
                'slidesPerView': 2
            },
            '992': {
                'slidesPerView': 3
            }
        }
    }">
        <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
            <div class="swiper-slide banner banner-fixed category-banner">
                <figure class="br-sm">
                    <img src="{{asset('frontend/assets/images/image8.jpg')}}" alt="Category Banner" width="400"
                        height="100" style="background-color: #4F4B48;" />
                </figure>
                <div class="banner-content">
                    <h3 class="banner-title text-white text-capitalize">
                        <span style="color: black;">New Quality</span><br><span class="text-normal" style="color: black;">Baby Wipes</span>
                    </h3>
                    <a href="{{route('product-grids')}}"
                        class="btn btn-white btn-link btn-underline btn-icon-right">
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- End of Category Banner -->
            <div class="swiper-slide banner banner-fixed category-banner">
                <figure class="br-sm">
                    <img src="{{asset('frontend/assets/images/fwipes.jpg')}}" alt="Category Banner" width="400"
                        height="200" style="background-color: #A3A3A3;" />
                </figure>
                <div class="banner-content">
                    <h3 class="banner-title text-white text-capitalize ls-25">
                        CheriX Adult Wipes<br><span class="ls-normal">For Adult Wipes</span>
                    </h3>
                    <a href="{{route('product-grids')}}"
                        class="btn btn-white btn-link btn-underline btn-icon-right">
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- End of Category Banner -->
            <div class="swiper-slide banner banner-fixed category-banner">
                <figure class="br-sm">
                    <img src="{{asset('frontend/assets/images/img-2.jpg')}}" alt="Category Banner" width="400"
                        height="200" style="background-color: #151A1E;" />
                </figure>
                <div class="banner-content">
                    <h3 class="banner-title text-white text-capitalize">
                       <span style="color: black;">Explore</span><br><span style="color: #151A1E;">More of our products</span>
                    </h3>
                    <a href="{{route('product-grids')}}"
                        class="btn btn-white btn-link btn-underline btn-icon-right">
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- End of Category Banner -->
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- End of Category Banner 3Cols -->

    <div class="row deals-wrapper appear-animate mb-8">
        <div class="col-lg-9 mb-4">
            <div class="single-product h-100 br-sm">
                <h4 class="title-sm title-underline font-weight-bolder ls-normal">
                    CheriX Product (Swipe Left to view Adult product)
                </h4>
                <div class="swiper">
                    <div class="swiper-container swiper-theme nav-top swiper-nav-lg" data-swiper-options = "{
                        'spaceBetween': 20,
                        'slidesPerView': 1
                    }">
                        <div class="swiper-wrapper row cols-1 gutter-no">
                            <div class="swiper-slide">
                                <div class="product product-single row align-items-center">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                            <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                                                <div class="swiper-wrapper row cols-1 gutter-no">
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/trans.png')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image2.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                            <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                                'breakpoints': {
                                                    '992': {
                                                        'direction': 'vertical',
                                                        'slidesPerView': 'auto'
                                                    }
                                                }
                                            }">
                                                <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/trans.png')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-details scrollable">
                                            <h2 class="product-title mb-1"><a href="product-detail.html">Cherix Baby Wipes - 120 Pcs/pack</a></h2>
    
                                            <hr class="product-divider">
    
                                            <div class="product-price"><ins class="new-price ls-50">#550.00 -
                                                    #1180.00</ins></div>
    
                                            <div class="product-countdown-container flex-wrap">
                                                <label class="mr-2 text-default">Offer Ends In:</label>
                                                <div class="product-countdown countdown-compact"
                                                    data-until="2022, 12, 31" data-compact="true">
                                                    629 days, 11: 59: 52</div>
                                            </div>
    
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                                            </div>
    
                                            <div class="product-form product-variation-form product-size-swatch mb-3">
                                                <label class="mb-1">Size:</label>
                                                <div class="flex-wrap d-flex align-items-center product-variations">
                                                    <a href="#" class="size">120 Pcs/Pack</a>
                                                    <a href="#" class="size">96 Pcs/Pack</a>
                                                    <a href="#" class="size">80 Pcs/Park</a>
                                                </div>
                                                <a href="#" class="product-variation-clean">Clean All</a>
                                            </div>
    
                                            <div class="product-variation-price">
                                                <span></span>
                                            </div>
    
                                            <div class="product-form pt-4">
                                                <div class="product-qty-form mb-2 mr-2">
                                                    <div class="input-group">
                                                        <input class="quantity form-control" type="number" min="1"
                                                            max="10000000">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-cart">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                            </div>
    
                                            <div class="social-links-wrapper mt-1">
                                                <div class="social-links">
                                                    <div class="social-icons social-no-color border-thin">
                                                        <a href="#"
                                                            class="social-icon social-facebook w-icon-facebook"></a>
                                                        <a href="#"
                                                            class="social-icon social-twitter w-icon-twitter"></a>
                                                        <a href="#"
                                                            class="social-icon social-pinterest fab fa-instagram"></a>
                                                        <a href="#"
                                                            class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    </div>
                                                </div>
                                                <span class="divider d-xs-show"></span>
                                                <div class="product-link-wrapper d-flex">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="swiper-slide">
                                <div class="product product-single row align-items-center">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                            <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                                                <div class="swiper-wrapper row cols-1 gutter-no">
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/trans.png')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image2.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                data-zoom-image="{{asset('frontend/assets/images/image3.jpg')}}"
                                                                alt="Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                            <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                                'breakpoints': {
                                                    '992': {
                                                        'direction': 'vertical',
                                                        'slidesPerView': 'auto'
                                                    }
                                                }
                                            }">
                                                <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/trans.png')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product thumb" width="60" height="68" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product-details scrollable">
                                            <h2 class="product-title mb-1"><a href="product-detail.html">Cherix Adult Wipes - 120 Pcs/pack</a></h2>
    
                                            <hr class="product-divider">
    
                                            <div class="product-price"><ins class="new-price ls-50">#550.00 -
                                                    #1180.00</ins></div>
    
                                            <div class="product-countdown-container flex-wrap">
                                                <label class="mr-2 text-default">Offer Ends In:</label>
                                                <div class="product-countdown countdown-compact"
                                                    data-until="2022, 12, 31" data-compact="true">
                                                    629 days, 11: 59: 52</div>
                                            </div>
    
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                                            </div>
    
                                            <div class="product-form product-variation-form product-size-swatch mb-3">
                                                <label class="mb-1">Size:</label>
                                                <div class="flex-wrap d-flex align-items-center product-variations">
                                                    <a href="#" class="size">120 Pcs/Pack</a>
                                                    <a href="#" class="size">96 Pcs/Pack</a>
                                                    <a href="#" class="size">80 Pcs/Park</a>
                                                </div>
                                                <a href="#" class="product-variation-clean">Clean All</a>
                                            </div>
    
                                            <div class="product-variation-price">
                                                <span></span>
                                            </div>
    
                                            <div class="product-form pt-4">
                                                <div class="product-qty-form mb-2 mr-2">
                                                    <div class="input-group">
                                                        <input class="quantity form-control" type="number" min="1"
                                                            max="10000000">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-cart">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                            </div>
    
                                            <div class="social-links-wrapper mt-1">
                                                <div class="social-links">
                                                    <div class="social-icons social-no-color border-thin">
                                                        <a href="#"
                                                            class="social-icon social-facebook w-icon-facebook"></a>
                                                        <a href="#"
                                                            class="social-icon social-twitter w-icon-twitter"></a>
                                                        <a href="#"
                                                            class="social-icon social-pinterest fab fa-instagram"></a>
                                                        <a href="#"
                                                            class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    </div>
                                                </div>
                                                <span class="divider d-xs-show"></span>
                                                <div class="product-link-wrapper d-flex">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="widget widget-products widget-products-bordered h-100">
                <div class="widget-body br-sm h-100">
                    <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Top Pick from our Products</h4>
                    <div class="swiper">
                        <div class="swiper-container swiper-theme nav-top" data-swiper-options="{
                            'slidesPerView': 1,
                            'spaceBetween': 20,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 1
                                }
                            }
                        }">
                            <div class="swiper-wrapper row cols-lg-1 cols-md-3">
                                <div class="swiper-slide product-widget-wrap">
                                    <div class="product product-widget bb-no">
                                        <figure class="product-media">
                                            <a href="product-detail.html">
                                                <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product"
                                                    width="105" height="118" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-detail.html">120Pcs / Pack</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">#550.60</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product product-widget bb-no">
                                        <figure class="product-media">
                                            <a href="product-detail.html">
                                                <img src="{{asset('frontend/assets/images/trans.png')}}" alt="Product"
                                                    width="105" height="118" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-detail.html">80Pcs / Pack</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">$565.68</ins><del
                                                    class="old-price">$800.45</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="product-detail.html">
                                                <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product"
                                                    width="105" height="118" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="product-detail.html">96Pcs / Pack</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">#620.20</ins><del
                                                    class="old-price">#750.62</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<!-- End of Deals Wrapper -->

{{-- </div>
<div class="swiper-pagination"></div>
</div> --}}
 <!-- End of Swiper Container -->

 <div class="row category-banner-2cols cols-md-2 appear-animate">
    <div class="col-md-6 mb-4">
        <div class="banner banner-fixed br-sm">
            <figure>
                <img src="{{asset('frontend/assets/images/f1.jpg')}}" alt="Category Banner" width="610"
                    height="150" style="background-color: #263032;" />
            </figure>
            <div class="banner-content y-50">
                <h5 class="banner-subtitle text-white text-uppercase font-weight-bold">New Collection
                </h5>
                <h3 class="banner-title text-white text-capitalize ls-25">CheriX Baby Wipes</h3>
                <div class="banner-price-info text-white">
                    Starting at <strong class="text-secondary">#599.00</strong>
                </div>
            </div>
        </div>
        <!-- End of Category Banner -->
    </div>
    <div class="col-md-6 mb-4">
        <div class="banner banner-fixed br-sm">
            <figure>
                <img src="{{asset('frontend/assets/images/bFriday.jpg')}}" alt="Category Banner" width="610"
                    height="150" style="background-color: #F3F3F1;" />
            </figure>
            <div class="banner-content x-50 w-100 y-50 pl-3 pr-3 text-center">
                <h5 class="banner-subtitle text-capitalize font-weight-bold"><span style="color: #F3F3F1;">Coming Soon</span></h5>
                <div class="banner-price-info text-uppercase font-weight-bold">
                    <span style="color: #F3F3F1;">Discount</span> &nbsp;<strong class="text-primary"><span style="color: #F3F3F1;">50%</span> Off</strong>
                </div>
            </div>
        </div>
        <!-- End of Category Banner -->
    </div>
</div>
<!-- End of Category Banner 2Cols -->

<div class="row grid cols-xl-5 cols-lg-4 cols-sm-3 cols-2 appear-animate" id="products-1">
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 1 -->

<div class="filter-with-title appear-animate">
    <h2 class="title" style="padding-left: 4rem;">CheriX Baby Wipers</h2>
    <ul class="nav-filters filter-boxed" data-target="#products-2">
        <li><a href="#" class="nav-filter active" data-filter=".1-1">120Pcs / Pack</a></li>
        <li><a href="#" class="nav-filter" data-filter=".1-2">96Pcs / Pack</a></li>
        <li><a href="#" class="nav-filter" data-filter=".1-3">80Pcs / Pack</a></li>
        <li><a href="#" class="nav-filter" data-filter="*">View All</a></li>
    </ul>
</div>
<div class="row grid cols-xl-5 cols-lg-4 cols-sm-3 cols-2 appear-animate" id="products-2">
    <div class="grid-item 1-1">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="product-detail.html">
                    <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-detail.html">CheriX Baby Wiper -120Pcs</a></h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-detail.html" class="rating-reviews">(8 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">#894.68</ins><del class="old-price">#958.62</del>
                    </div>
                    <div class="product-action">
                        <a href="#"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item 1-2">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="product-detail.html">
                    <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-detail.html">CheriX Baby Wiper -96Pcs</a></h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-detail.html" class="rating-reviews">(4 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">#692.69</ins>
                    </div>
                    <div class="product-action">
                        <a href="#"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item 1-3">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="product-detail.html">
                    <img src="{{asset('frontend/assets/images/trans.png')}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-detail.html">CheriX Baby Wipes -80Pcs</a>
                </h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-detail.html" class="rating-reviews">(3 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">#680.00</ins>
                    </div>
                    <div class="product-action">
                        <a href="#"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item 1-2">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="product-detail.html">
                    <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-detail.html">CheriX Baby Wipes -96Pcs</a>
                </h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-detail.html" class="rating-reviews">(3 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">#580.26</ins><del class="old-price">#691.69</del>
                    </div>
                    <div class="product-action">
                        <a href="#"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item 1-1">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="product-detail.html">
                    <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="product-detail.html">CheriX Baby Wipes -120Pcs</a></h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="product-detail.html" class="rating-reviews">(5 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        <ins class="new-price">#549.76</ins>
                    </div>
                    <div class="product-action">
                        <a href="#"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- End of Grid Item -->
    
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 2 -->

<div class="row grid grid-float mb-10 appear-animate">
    <div class="grid-item col-md-6 height-x2">
        <div class="banner banner-fixed banner-lg br-sm">
            <figure>
                <img src="{{asset('frontend/assets/images/demos/demo10/banner/2-1.jpg')}}" alt="Banner" width="610"
                    height="420" style="background-color: #828994" />
            </figure>
            <div class="banner-content y-50">
                <h5 class="banner-subtitle text-white text-uppercase ls-25">
                    Sale Up To <strong>40% Off</strong>
                </h5>
                <h3 class="banner-title text-white text-capitalize ls-25">
                   Adult Wipes<br>Category                                </h3>
                <a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-right">
                    Order Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item col-sm-6 height-x1">
        <div class="banner banner-fixed banner-md br-sm">
            <figure>
                <img src="{{asset('frontend/assets/images/image7.jpg')}}" alt="Banner" width="610"
                    height="200" style="background-color: #d8dee9" />
            </figure>
            <div class="banner-content y-50">
                <h5 class="banner-subtitle text-uppercase font-weight-bold" style="color: #ca6d00;">Mega Sale</h5>
                <h3 class="banner-title ls-25 text-capitalize ls-25 lh-1 mb-4">
                    <span class="text-uppercase text-primary">30% Off</span><br><span style="color: #f0f0f0;">CheriX Baby Wipes</span>
                </h3>
                <a href="{{route('product-grids')}}"
                    class="btn btn-dark btn-link btn-underline btn-icon-right" style="color: #f0f0f0;">
                    Shop Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Grid Item -->
    <div class="grid-item col-sm-6 height-x1">
        <div class="banner banner-fixed banner-md br-sm">
            <figure>
                <img src="{{asset('frontend/assets/images/waterDrops.jpg')}}" alt="Banner" width="610"
                    height="200" style="background-color: #424347" />
            </figure>
            <div class="banner-content y-50">
                <h5 class="banner-subtitle text-uppercase text-secondary font-weight-bold">Best Seller
                </h5>
                <h3 class="banner-title text-white text-capitalize ls-25 lh-1">Ever Silk and Wet<br>Wipes
                </h3>
                <a href="{{route('product-grids')}}"
                    class="btn btn-white btn-link btn-underline btn-icon-right">
                    Shop Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Grid Itme -->
</div>
<!-- End of Grid Float -->
<div class="row grid cols-xl-5 cols-lg-4 cols-sm-3 cols-2 appear-animate" id="products-3">
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 2 -->
</div>

@endsection