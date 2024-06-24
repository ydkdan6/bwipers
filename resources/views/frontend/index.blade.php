@extends('frontend.layouts.master')
@section('title','CheriX - Best, Silk & Quality Baby Wipers in Nigeria')
@section('main-content')
@php
//    dd( Hash::make('1234'));
    // dd(App\User::all());
@endphp
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

    {{--  --}}
    <!-- End of Category Banner 3Cols -->
    <div class="row deals-wrapper appear-animate mb-8">
        @if($featured)
        <div class="col-lg-9 mb-4">
            <div class="single-product h-100 br-sm">
                <h4 class="title-sm title-underline font-weight-bolder ls-normal">
                    CheriX Product (Swipe Left to view Adult product)
                </h4>
                <div class="swiper">
                    <div class="swiper-container swiper-theme nav-top swiper-nav-lg" data-swiper-options = "{
                        'spaceBetween': 20,
                        'slidesPerView': 1 }">
                        <div class="swiper-wrapper row cols-1 gutter-no">

                           
                @foreach($featured->take(2) as $data)
                @php
                    $photo=explode(',',$data->photo);
                @endphp
                <div class="swiper-slide">
                    <div class="product product-single row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        
                                        @foreach ($photo as $item)
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{$item}}"
                                                    data-zoom-image="{{$item}}"
                                                    alt="Product Image" width="800" height="900">
                                            </figure>
                                        </div>
                                        @endforeach
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
                                    {{-- <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                        <div class="product-thumb swiper-slide">
                                            <img src="{{asset('frontend/assets/images/image3.jpg')}}" alt="Product thumb" width="60" height="68" />
                                        </div>
                                        <div class="product-thumb swiper-slide">
                                            <img src="{{asset('frontend/assets/images/trans.png')}}" alt="Product thumb" width="60" height="68" />
                                        </div>
                                        <div class="product-thumb swiper-slide">
                                            <img src="{{asset('frontend/assets/images/image2.jpg')}}" alt="Product thumb" width="60" height="68" />
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details scrollable">
                                <h2 class="product-title mb-1"><a href="{{ route('product-detail', $data['slug']) }}">{{$data->title}}</a></h2>

                                <hr class="product-divider">

                                <div class="product-price">
                                @php 
                                    $after_discount=($data->price-(($data->price*$data->discount)/100));
                                @endphp
                                <ins class="new-price">N{{number_format($after_discount,2)}} - <del>₦{{number_format($data->price,2)}}</del></ins>
                                </div>

                                {{-- <div class="product-price"><ins class="new-price ls-50">₦{{$data->title}}</ins></div> --}}

                                {{-- <div class="product-countdown-container flex-wrap">
                                    <label class="mr-2 text-default">Offer Ends In:</label>
                                    <div class="product-countdown countdown-compact"
                                        data-until="2022, 12, 31" data-compact="true">
                                        629 days, 11: 59: 52</div>
                                </div> --}}

                                @php
                                    $rate=ceil($data->getReview->avg('rate'));
                                    // dd($rate);
                                @endphp

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                                </div>

                                @if($data->size)
									@php 
										$sizes=explode(',',$data->size);
									@endphp

                                <div class="product-form product-variation-form product-size-swatch mb-3">
                                    <label class="mb-1">Size:</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                        @foreach($sizes as $size)
											<a href="#" class="size">{{$size}}</a>
											@endforeach
                                    </div>
                                    {{-- <a href="#" class="product-variation-clean">Clean All</a> --}}
                                </div>
                                @endif

                                <div class="product-variation-price">
                                    <span></span>
                                </div>
                                <form action="{{route('single-add-to-cart')}}" method="POST">
                                    @csrf 
                                    <input type="hidden" name="slug" value="{{$data->slug}}">
                                <div class="product-form pt-4">
                                    <div class="product-qty-form mb-2 mr-2">
                                        <div class="input-group">
                                            {{-- <input class="quantity form-control" type="number" min="1"
                                                max="10000000"> --}}
                                                <input type="text" name="quant[1]" class="input-number" min="1" max="10000000" data-min="1" data-max="10000000" value="1" id="quantity">
                                            <button type="button" class="quantity-plus w-icon-plus"></button>
                                            <button type="button" class="quantity-minus w-icon-minus"></button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-cart">
                                        <i class="w-icon-cart"></i>
                                        <span>Add to Cart</span>
                                    </button>
                                </div>
                                </form>

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
                                        <a href="{{route('add-to-wishlist',$data->slug)}}" 
                                            class="btn-product-icon btn-wishlist w-icon-heart"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                    {{-- <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner">
                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <p>{{$data->cat_info['title']}}</p>
                                <h3>{{$data->title}} <br>Up to<span> {{$data->discount}}%</span></h3>
                                <a href="{{route('product-detail',$data->slug)}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  --> --}}
                @endforeach
           

                           

                            {{-- <div class="swiper-slide">
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
                            </div>  --}}
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
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

                                    @foreach($product_lists->take(3) as $product)
                                    @if($product->condition=='hot')
                                    @php
                                        $photo=explode(',',$product->photo);
                                    @endphp
                                    <div class="product product-widget bb-no">
                                        <figure class="product-media">
                                            <a href="{{ route('product-detail', $product['slug']) }}">
                                                <img src="{{$photo[0]}}" alt="{{$photo[0]}}"
                                                    width="105" height="118" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <ins class="new-price">₦{{number_format($data->price,2)}}</ins>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    {{-- <div class="product product-widget bb-no">
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
                                    </div> --}}
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

<!-- End of Category Banner 2Cols -->

<div class="row grid cols-xl-5 cols-lg-4 cols-sm-3 cols-2 appear-animate" id="products-1">
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 1 -->
@php
    $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
@endphp
                    {{-- @foreach($product_lists as $product) --}}

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
    @foreach($product_lists->take(5) as $key => $product) 
    @php
        $photo=explode(',',$product->photo);
    @endphp
    <div class="grid-item 1-1">
        <div class="product product-simple text-center">
            <figure class="product-media">
                <a href="{{route('product-detail',$product->slug)}}">
                    <img src="{{$photo[0]}}" alt="Product" width="232"
                        height="260" />
                </a>
                <div class="product-action-vertical">
                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-product-icon btn-wishlist w-icon-heart"
                        title="Add to wishlist"></a>
                </div>
                <div class="product-action">
                    <a href="{{route('product-detail',$product->slug)}}" class="btn-product btn-quickview" title="Quick View">Quick
                        View</a>
                </div>
            </figure>
            <div class="product-details">
                <h4 class="product-name"><a href="{{route('product-detail',$product->slug)}}">{{  $product->title }}</a></h4>
                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 100%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="{{route('product-detail',$product->slug)}}" class="rating-reviews">(8 reviews)</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price">
                        @php 
                            $after_discount=($product->price-(($product->price*$product->discount)/100));
                        @endphp
                        <ins class="new-price">N{{number_format($after_discount,2)}} - <del>₦{{number_format($product->price,2)}}</del></ins>
                        {{-- <ins class="new-price">#894.68</ins><del class="old-price">#958.62</del> --}}
                    </div>
                    <form action="{{route('single-add-to-cart')}}" method="POST" class="d-none" id="addToCart_">
                        @csrf 
                        <input type="hidden" name="slug" value="{{$product->slug}}">
                        <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1" value="1" id="quantity">
                    </form>
                    <div class="product-action">
                        <a href="#" onclick="document.getElementById('addToCart_').submit();"
                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline">Add
                            To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    <!-- End of Grid Item -->
    
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 2 -->

<!-- End of Grid Float -->
<div class="row grid cols-xl-5 cols-lg-4 cols-sm-3 cols-2 appear-animate" id="products-3">
    <div class="grid-space col-xl-5col col-1"></div>
</div>
<!-- End of Products 2 -->
</div>

@endsection