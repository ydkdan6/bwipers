@extends('frontend.layouts.shop')

@section('title','About '. config('app.name'))

@section('main-content')
 <!-- Start of Page Header -->
 <div class="page-header">
	<div class="container">
		<h1 class="page-title mb-0">About Us</h1>
	</div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-8">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li>About Us</li>
		</ul>
	</div>
</nav>
<!-- End of Breadcrumb -->
<style>
	.xx h1{
		position: absolute;
		top: 75rem;
		padding-left: 2rem;
		font-size: 7rem;
		color: goldenrod;                    
	}

	@media (max-width: 790px){
		.xx h1 {
			position: absolute;
			top: 58rem;
			font-size: 3rem;
		}
	}
</style>
<!-- Start of Page Content -->
<div class="page-content">
	<div class="container">
		<section class="introduce mb-10 pb-10">
			<h2 class="title title-center">
				We’re Devoted xxxxx<br>xxxxxxxx xxxxxx xxxx
			<p class=" mx-auto text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
				labore et dolore magna aliqua. Venenatis tellu metus</p>
			<figure class="br-lg xx">
				<img src="{{asset('frontend/assets/images/wipes.jpg')}}" alt="Banner" 
					width="1240" height="240" style="background-color: #D0C1AE;" />
			</figure>
		</section>

		<section class="customer-service mb-7">
			<div class="row align-items-center">
				<div class="col-md-6 pr-lg-8 mb-8">
					<h2 class="title text-left">We Provide Continuous &amp; Kind Service for Customers</h2>
					<div class="accordion accordion-simple accordion-plus">
						<div class="card border-no">
							<div class="card-header">
								<a href="#collapse3-1" class="collapse">Customer Service</a>
							</div>
							<div class="card-body expanded" id="collapse3-1">
								<p class="mb-0">
									Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
									sed do eius mod tempor incididunt ut labore
									et dolore magna aliqua. Venenatis tell
									us in metus vulputate eu scelerisque felis. Vel pretium vulp.
								</p>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a href="#collapse3-2" class="expand">Online Consultation</a>
							</div>
							<div class="card-body collapsed" id="collapse3-2">
								<p class="mb-0">
									Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
									sed do eius mod tempor incididunt ut labore
									et dolore magna aliqua. Venenatis tell
									us in metus vulputate eu scelerisque felis. Vel pretium vulp.
								</p>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a href="#collapse3-3" class="expand">Sales Management</a>
							</div>
							<div class="card-body collapsed" id="collapse3-3">
								<p class="mb-0">
									Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
									sed do eius mod tempor incididunt ut labore
									et dolore magna aliqua. Venenatis tell
									us in metus vulputate eu scelerisque felis. Vel pretium vulp.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-8">
					<figure class="br-lg">
						<img src="{{asset('frontend/assets/images/trans2.png')}}" alt="Banner"
							width="610" height="500" style="background-color: #CECECC;" />
					</figure>
				</div>
			</div>
		</section>

		<section class="count-section mb-10 pb-5">
			<div class="swiper-container swiper-theme" data-swiper-options="{
				'slidesPerView': 1,
				'breakpoints': {
					'768': {
						'slidesPerView': 2
					},
					'992': {
						'slidesPerView': 3
					}
				}
			}">
				<div class="swiper-wrapper row cols-lg-3 cols-md-2 cols-1">
					<div class="swiper-slide counter-wrap">
						<div class="counter text-center">
							<span class="count-to" data-to="15" style="font-size: 5rem;">0</span>
							<span style="font-size: 3rem;">K+</span>
							<h4 class="title title-center">Products For Sale</h4>
							<p>Diam maecenas ultricies mi eget mauris<br>
								Nibh tellus molestie nunc non</p>
						</div>
					</div>
					<div class="swiper-slide counter-wrap">
						<div class="counter text-center">
							<span>$</span>
							<span class="count-to" data-to="25" style="font-size: 5rem;">0</span>
							<span style="font-size: 3rem;">K+</span>
							<h4 class="title title-center">Products Sold Out</h4>
							<p>Diam maecenas ultricies mi eget mauris<br>
								Nibh tellus molestie nunc non</p>
						</div>
					</div>
					<div class="swiper-slide counter-wrap">
						<div class="counter text-center">
							<span class="count-to" data-to="100" style="font-size: 5rem;">0</span>
							<span style="font-size: 3rem;">K+</span>
							<h4 class="title title-center">Growing Buyers</h4>
							<p>Diam maecenas ultricies mi eget mauris<br>
								Nibh tellus molestie nunc non</p>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</section>
	</div>
</div>
@endsection
