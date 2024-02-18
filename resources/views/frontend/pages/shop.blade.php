@extends('frontend.layouts.shop')

@section('title','Shop | '. config('app.name'))

@section('main-content')
	<!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li><a href="{{route('product-grids')}}">Shop</a></li>
                <li>Our Shop</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10">
        <div class="container">
            <!-- Start of Shop Banner -->

            @if(isset($category))
            <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
            style="background-image: url('{{asset('frontend/assets/images/wipes.jpg')}}'); background-color: #FFC74E;">
            <div class="banner-content">
                {{-- <h4 class="banner-subtitle font-weight-bold">Category:</h4> --}}
                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">{{$category->title}}</h3>
            </div>
        </div>
            @else
            <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
            style="background-image: url('{{asset('frontend/assets/images/wipes.jpg')}}'); background-color: #FFC74E;">
            <div class="banner-content">
                <h4 class="banner-subtitle font-weight-bold">Quality Wipes Collection</h4>
                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Silk and Wet</h3>
                <a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-right">Buy
                    Now<i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
            @endif

            
            <!-- End of Shop Banner -->

            <div class="shop-content toolbox-horizontal">
                <!-- Start of Toolbox -->
                @if (!isset($category))
                <nav class="toolbox sticky-toolbox sticky-content fix-top">
                    <aside class="sidebar sidebar-fixed shop-sidebar">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <div class="sidebar-content toolbox-left">
                            <!-- Start of Collapsible widget -->
                            <div class="toolbox-item select-menu">
                                <a class="select-menu-toggle" href="#">All Categories</a>
                                <ul class="filter-items">
                                    @php
											// $category = new Category();
											$menu=App\Models\Category::getAllParentWithChild();
										@endphp
										@if($menu)
										<li>
											@foreach($menu as $cat_info)
													@if($cat_info->child_cat->count()>0)
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
															<ul>
																@foreach($cat_info->child_cat as $sub_menu)
																	<li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a></li>
																@endforeach
															</ul>
														</li>
													@else
														<li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a></li>
													@endif
											@endforeach
										</li>
										@endif
                                        @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
												<li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
											@endif
                                        @endforeach
                                </ul>
                            </div>
                            <div class="toolbox-item select-menu">
                                <a class="select-menu-toggle" href="#">Price</a>
                                @php
                                    $max=DB::table('products')->max('price');
                                    $min=DB::table('products')->min('price');
                                @endphp
                                {{-- @if(!empty($_GET['price'])){{$_GET['price']}}@endif --}}
                                <ul class="filter-items">
                                    {{-- <li><a href="#">#0.00 - #500.00</a></li>
                                    <li><a href="#">#500.00 - #800.00</a></li>
                                    <li><a href="#">#800.00 - #1000.00</a></li>
                                    <li><a href="#">#1000.00 - #1,500.00</a></li>
                                    <li><a href="#">#1,500.00+</a></li> --}}
                                    <li>
                                        <form action="{{route('shop.filter')}}"class="price-range" method="POST">
                                            @csrf
                                            <input type="number" name="price_range" class="min_price text-center"
                                                placeholder="{{$min}}"><span class="delimiter">-</span><input
                                                type="number" name="max_price" class="max_price text-center"
                                                placeholder="{{$max}}"><a href="#"
                                                class="btn btn-primary btn-rounded">Go</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="toolbox-item select-menu">
                                <a class="select-menu-toggle" href="#">Size</a>
                                <ul class="filter-items item-check">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div>
                            <div class="toolbox-item select-menu">
                                <a class="select-menu-toggle" href="#">Color</a>
                                <ul class="filter-items item-check">
                                    <li><a href="#">White</a></li>
                                    <li><a href="#">Blue</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->
                        </div>
                    </aside>
                </nav>
                @endif
                <!-- End of Toolbox -->
                
                <!-- Start of Selected Items -->
                <div class="selected-items mb-3">
                    <a href="#" class="filter-clean text-primary">Clean All</a>
                </div>
                <!-- End of Selected Items -->

                <!-- Start of Product Wrapper -->
                <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
                    @if(count($products)>0)
                        @foreach($products as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('product-detail',$product->slug)}}">
                                            @php
                                                $photo=explode(',',$product->photo);
                                            @endphp
                                            <img src="{{$photo[0]}}" alt="{{$product->title}}" width="300"
                                                height="338" />
                                                {{-- @if($product->discount)
                                                                <span class="price-dec">{{$product->discount}} % Off</span>
                                                    @endif --}}
                                        </a>
                                        <div class="product-action-horizontal">
                                            {{-- <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                            <a href="{{route('add-to-cart',$product->slug)}}" class="btn-product-iconbtn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Wishlist"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat">
                                            @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
                                            <a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a>
											@endif
                                        @endforeach
                                           
                                        </div>
                                        <h3 class="product-name">
                                            <a href={{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href={{route('product-detail',$product->slug)}}" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                @php
                                                    $after_discount=($product->price-($product->price*$product->discount)/100);
                                                @endphp
                                            <span>₦{{number_format($after_discount,2)}} -</span>
                                            <del class="text-muted" style="paddingleft:4%;">₦{{number_format($product->price,2)}}</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <h4 class="text-muted" style="margin:100px auto;">There are no products.</h4>
                @endif
                </div>
                <!-- End of Product Wrapper -->

                <!-- Start of Pagination -->
                <div class="toolbox toolbox-pagination justify-content-between">
                    @if(!isset($category))
                    {{$products->appends($_GET)->links()}}
                    @endif
                    {{-- <p class="showing-info mb-2 mb-sm-0">
                        Showing<span>1-12 of 60</span>Products
                    </p>
                    <ul class="pagination">
                        <li class="prev disabled">
                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <i class="w-icon-long-arrow-left"></i>Prev
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="next">
                            <a href="#" aria-label="Next">
                                Next<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </li>
                    </ul> --}}
                </div>
                <!-- End of Pagination -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->

@endsection
