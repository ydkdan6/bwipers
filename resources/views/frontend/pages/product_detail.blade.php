@extends('frontend.layouts.shop')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="{{ $product_detail->summary }}">
    <meta property="og:url" content="{{ route('product-detail', $product_detail->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $product_detail->title }}">
    <meta property="og:image" content="{{ $product_detail->photo }}">
    <meta property="og:description" content="{{ $product_detail->description }}">
@endsection
@section('title', $product_detail->title . ' - ' . config('app.name'))
@section('main-content')

    <!-- Breadcrumbs -->
    <x-breadcrumb :breadcrumbs="$breadcrumbs" />
    <!-- End Breadcrumbs -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            @php
                $photo = explode(',', $product_detail->photo);
                // dd($photo);
            @endphp
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-4 mb-md-8">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner"
                                    data-swiper-options="{
										'navigation': {
											'nextEl': '.swiper-button-next',
											'prevEl': '.swiper-button-prev'
										}
									}">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ $product_detail->photo }}"
                                                    data-zoom-image="assets/images/products/variable/1-800x900.jpg"
                                                    alt="Wipes" width="800" height="900">
                                            </figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ $product_detail->photo }}"
                                                    data-zoom-image="assets/images/products/variable/2-800x900.jpg"
                                                    alt="Electronics Black Wrist Watch" width="488" height="549">
                                            </figure>
                                        </div>
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                    <a href="#" class="product-gallery-btn product-image-full"><i
                                            class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container"
                                    data-swiper-options="{
										'navigation': {
											'nextEl': '.swiper-button-next',
											'prevEl': '.swiper-button-prev'
										}
									}">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                        <div class="product-thumb swiper-slide">
                                            <img src="{{ $product_detail->photo }}" alt="Product Thumb" width="800"
                                                height="900">
                                        </div>
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-6 mb-md-8">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{ $product_detail->title }}</h1>
                                <div class="product-bm-wrapper">
                                    {{-- <figure class="brand">
											<img src="assets/images/main-logo3.png" alt="Brand"
												width="105" height="48" />
										</figure> --}}
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category"><a
                                                    href="{{ route('product-cat', $product_detail->cat_info['slug']) }}">{{ $product_detail->cat_info['title'] }}</a></span>
                                            @if ($product_detail->sub_cat_info)
                                                Sub Category:
                                                <span class="product-category"><a
                                                        href="{{ route('product-sub-cat', [$product_detail->cat_info['slug'], $product_detail->sub_cat_info['slug']]) }}">{{ $product_detail->sub_cat_info['title'] }}</a></span>
                                            @endif
                                            Stock:
                                            <span class="product-category">
                                                @if ($product_detail->stock > 0)
                                                    <span class="badge badge-success">{{ $product_detail->stock }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $product_detail->stock }}</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price">
                                    @php
                                        $after_discount =
                                            $product_detail->price -
                                            ($product_detail->price * $product_detail->discount) / 100;
                                    @endphp
                                    <ins class="new-price">₦{{ number_format($after_discount, 2) }} -
                                        <del>₦{{ number_format($product_detail->price, 2) }}</del></ins>
                                </div>

                                <div class="ratings-container">
                                    @php
                                        $rate = ceil($product_detail->getReview->avg('rate'));
                                    @endphp
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#product-tab-reviews"
                                        class="rating-reviews">({{ $product_detail['getReview']->count() }} Reviews)</a>
                                </div>

                                <div class="product-short-desc">
                                    <ul class="list-type-check list-style-none">
                                        {!! $product_detail->summary !!}
                                    </ul>
                                </div>

                                <hr class="product-divider">

                                {{-- <div class="product-form product-variation-form product-color-swatch">
										<label>Color:</label>
										<div class="d-flex align-items-center product-variations">
											<a href="#" class="color" style="background-color: #ccc;"></a>
										</div>
									</div> --}}
                                @if ($product_detail->size)
                                    @php
                                        $sizes = explode(',', $product_detail->size);
                                    @endphp
                                    <div class="product-form product-variation-form product-size-swatch">
                                        <label class="mb-1">Size:</label>
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            @foreach ($sizes as $size)
                                                <a href="#" class="size">{{ $size }}</a>
                                            @endforeach
                                        </div>
                                        <a href="#" class="product-variation-clean">Clean All</a>
                                    </div>
                                @endif

                                <div class="product-variation-price">
                                    <span></span>
                                </div>
                                <form action="{{ route('single-add-to-cart') }}" method="POST">
                                    @csrf
                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="quantity">
                                                {{-- <h6>Quantity :</h6> --}}
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="slug"
                                                        value="{{ $product_detail->slug }}">
                                                    <input type="text" name="quant[1]" class="input-number-"
                                                        data-min="1" data-max="1000" value="1" id="quantity">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>

                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#"
                                            class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-specification" class="nav-link">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-reviews" class="nav-link">Customer Reviews
                                    ({{ count($product_detail['getReview']) }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-5">
                                        {!! $product_detail->description !!}
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="banner banner-video product-video br-xs">
                                            <figure class="banner-media">
                                                <a href="#">
                                                    <img src="{{ $product_detail->photo }}" alt="banner"
                                                        width="610" height="300" style="background-color: #bebebe;">
                                                </a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-tab-specification">
                                <ul class="list-none">
                                    <li>
                                        <label>Category</label>
                                        <p><a
                                                href="{{ route('product-cat', $product_detail->cat_info['slug']) }}">{{ $product_detail->cat_info['title'] }}</a>
                                        </p>
                                    </li>
                                    <li>
                                        <label>Color</label>
                                        <p>-</p>
                                    </li>
                                    @if ($product_detail->size)
                                        @php
                                            $sizes = explode(',', $product_detail->size);
                                        @endphp
                                        <li>
                                            <label>Size</label>
                                            <p>
                                                @foreach ($sizes as $size)
                                                    {{ $size }},
                                                @endforeach
                                            </p>
                                        </li>

                                    @endif
                                    <li>
                                        <label>Guarantee Time</label>
                                        <p>-</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="product-tab-reviews">
                                <div class="row mb-4">
                                    <div class="col-xl-4 col-lg-5 mb-4">
                                        <div class="ratings-wrapper">
											<div class="avg-rating-container">
												<h4 class="avg-mark font-weight-bolder ls-50">
													{{ number_format($product_detail->averageRating(), 1) }}</h4>
												<div class="avg-rating">
													<p class="text-dark mb-1">Average Rating</p>
													<div class="ratings-container">
														<div class="ratings-full">
															<span class="ratings" style="width: {{ $product_detail->averageRatingPercent() }}%;"></span>
															<span class="tooltiptext tooltip-top">{{ $product_detail->averageRating() }}</span>
														</div>
														<a href="#" class="rating-reviews">({{ $product_detail->totalReviews() }} Reviews)</a>
													</div>
												</div>
											</div>
											<div class="ratings-value d-flex align-items-center text-dark ls-25">
												{{-- <span class="text-dark font-weight-bold">{{ $product_detail->recommendationPercentage() }}%</span> Recommended --}}
												{{-- <span class="count">({{ $product_detail->recommendationCount() }} of {{ $product_detail->totalReviews() }})</span> --}}
											</div>
											<div class="ratings-list">
												@foreach ($product_detail->ratingPercentages() as $rating => $percentage)
												<div class="ratings-container">
													<div class="ratings-full">
														<span class="ratings" style="width: {{ $percentage }}%;"></span>
														<span class="tooltiptext tooltip-top">{{ $rating }} Stars</span>
													</div>
													<div class="progress-bar progress-bar-sm ">
														<span></span>
													</div>
													<div class="progress-value">
														<mark>{{ $percentage }}%</mark>
													</div>
												</div>
												@endforeach
											</div>
										</div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 mb-4">
                                        <div class="review-form-wrapper">


                                            @auth
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                    Review</h3>
                                                <p class="mb-3">Your email address will not be published. Required
                                                    fields are marked *</p>

                                                <form class="form" method="post"
                                                    action="{{ route('review.store', $product_detail->slug) }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="rating-form">
                                                            <label for="rating">Your Rating Of This Product :</label>
                                                            <span class="rating-stars">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>
                                                            <input type="hidden" name="rate" id="rating">
                                                            @error('rate')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label>Write a review</label>
                                                                <textarea name="review" cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control"
                                                                    id="review"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group button5">
                                                                <button type="submit" class="btn">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @else
                                                <p class="text-center p-5">
                                                    You need to <a href="{{ route('login.form') }}"
                                                        style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue"
                                                        href="{{ route('register.form') }}">Register</a>

                                                </p>
                                                <!--/ End Form -->
                                            @endauth
										</div>
                                    </div>
                                </div>

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a href="#show-all" class="nav-link active">Show All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#helpful-positive" class="nav-link">Most Helpful
                                                Positive</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#helpful-negative" class="nav-link">Most Helpful
                                                Negative</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        @foreach ($product_detail['getReview'] as $data)
                                            @php
                                                $ratePer = 0;
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($data->rate >= $i) {
                                                        $ratePer++;
                                                    } else {
                                                        $ratePer--;
                                                    }
                                                }
                                            @endphp

                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a>{{ $data->user_info['name'] }}</a>
                                                                    <span class="comment-date">January 23, 2024 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <ul class="rating">
                                                                            {{-- @for ($i = 1; $i <= 5; $i++)
																				@if ($data->rate >= $i)
																					<li><i class="fa fa-star"></i></li>
																				@else 
																					<li><i class="fa fa-star-o"></i></li>
																				@endif
																			@endfor --}}
                                                                        </ul>
                                                                        <div class="rate-count">
                                                                            (<span>{{ $data->rate }}</span>)
                                                                        </div>
                                                                        <span class="ratings"
                                                                            style="width: {{ $ratePer }}0%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>{{ $data->review }}.</p>
                                                                <div class="comment-action">
                                                                    {{-- <a href="#"
																		class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
																		<i class="far fa-thumbs-up"></i>Helpful (1)
																	</a>
																	<a href="#"
																		class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
																		<i class="far fa-thumbs-down"></i>Unhelpful
																		(0)
																	</a> --}}
                                                                </div>
                                                            </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                        <p>For all orders over #500</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-bag"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Secure Payment</h4>
                                        <p>We ensure secure payment of different methods</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-money"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Money Back Guarantee</h4>
                                        <p>Any back within 30 days</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="{{ asset('frontend/assets/images/vendor/element/banner/3.jpg') }}"*/
                                            alt="Banner" width="266" height="220"
                                            style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            50<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">Off</sub>
                                        </div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            Ultimate Sale</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->
                        </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
@endsection
@push('styles')
    <style>
        .rating-stars {
            display: inline-block;
        }

        .rating-stars a {
            font-size: 2rem;
            color: #ddd;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.2s;
        }

        .rating-stars a:hover,
        .rating-stars a.active {
            color: #ffc107;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.rating-stars a');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function(event) {
                    event.preventDefault();

                    stars.forEach(s => s.classList.remove('active'));
                    this.classList.add('active');

                    const ratingValue = this.textContent;
                    ratingInput.value = ratingValue;

                    console.log(`Selected rating: ${ratingValue}`);
                });
            });
        });
    </script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
@endpush
