@extends('frontend.layouts.shop')
@section('title','Contact '. config('app.name'))
@section('main-content')
	<!-- Start of Page Header -->
	<div class="page-header">
		<div class="container">
			<h1 class="page-title mb-0">Contact Us</h1>
		</div>
	</div>
	<!-- End of Page Header -->

	<!-- Start of Breadcrumb -->
	<nav class="breadcrumb-nav mb-10 pb-1">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="/">Home</a></li>
				<li>Contact Us</li>
			</ul>
		</div>
	</nav>
	<!-- End of Breadcrumb -->

	<!-- Start of PageContent -->
	<div class="page-content contact-us">
		<div class="container">
			<section class="content-title-section mb-10">
				<h3 class="title title-center mb-3">Contact
					Information
				</h3>
				<p class="text-center">Kindly contact us, we operate 24/7 to assist you with any queries concerning Cherix Online store.</p>
			</section>
			<!-- End of Contact Title Section -->

			<section class="contact-information-section mb-10">
				<div class=" swiper-container swiper-theme " data-swiper-options="{
					'spaceBetween': 20,
					'slidesPerView': 1,
					'breakpoints': {
						'480': {
							'slidesPerView': 2
						},
						'768': {
							'slidesPerView': 3
						},
						'992': {
							'slidesPerView': 4
						}
					}
				}">
					<div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
						<div class="swiper-slide icon-box text-center icon-box-primary">
							<span class="icon-box-icon icon-email">
								<i class="w-icon-envelop-closed"></i>
							</span>
							<div class="icon-box-content">
								<h4 class="icon-box-title">E-mail Address</h4>
								<p>simcherry@gmail.com</p>
							</div>
						</div>
						<div class="swiper-slide icon-box text-center icon-box-primary">
							<span class="icon-box-icon icon-headphone">
								<i class="w-icon-headphone"></i>
							</span>
							<div class="icon-box-content">
								<h4 class="icon-box-title">Phone Number</h4>
						<a href="tel:+2349054995005" class="phone-number font-weight-bolder ls-50">+234 905 499 5005</a>
						<p></p>
							</div>
						</div>
						<div class="swiper-slide icon-box text-center icon-box-primary">
							<span class="icon-box-icon icon-map-marker">
								<i class="w-icon-map-marker"></i>
							</span>
							<div class="icon-box-content">
								<h4 class="icon-box-title">Address</h4>
								<p>Abuja, Nigeria, 90010</p>
							</div>
						</div>
						<div class="swiper-slide icon-box text-center icon-box-primary">
							<span class="icon-box-icon icon-fax">
								<i class="w-icon-fax"></i>
							</span>
							<div class="icon-box-content">
								<h4 class="icon-box-title">Fax</h4>
								<p>x-xxx-xxx-xxxx</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End of Contact Information section -->

			<hr class="divider mb-10 pb-1">

			<section class="contact-section">
				<div class="row gutter-lg pb-3">
					<div class="col-lg-6 mb-8">
						<h4 class="title mb-3">People usually ask these</h4>
						<div class="accordion accordion-bg accordion-gutter-md accordion-border">
							<div class="card">
								<div class="card-header">
									<a href="#collapse1" class="collapse">How can I cancel my order?</a>
								</div>
								<div id="collapse1" class="card-body expanded">
									<p class="mb-0">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
										idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
										isque felis. Vel pretium.
									</p>
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<a href="#collapse2" class="expand">Why is my registration delayed?</a>
								</div>
								<div id="collapse2" class="card-body collapsed">
									<p class="mb-0">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
										idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
										isque felis. Vel pretium.
									</p>
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<a href="#collapse3" class="expand">What do I need to buy products?</a>
								</div>
								<div id="collapse3" class="card-body collapsed">
									<p class="mb-0">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
										idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
										isque felis. Vel pretium.
									</p>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<a href="#collapse5" class="expand">How can I get money back?</a>
								</div>
								<div id="collapse5" class="card-body collapsed">
									<p class="mb-0">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
										temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
										metus vulp utate eu sceler isque felis. Vel pretium.
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-8">
						@php
										$settings=DB::table('settings')->get();
									@endphp
						<h4 class="title mb-3">Send Us a Message</h4>
						<h3>Write us a message @auth @else<span style="font-size:12px;" class="text-danger">[You need to login first]</span>@endauth</h3>
						{{-- <form class="form contact-us-form" action="mailto:simcherry@gmail.com" method="post"> --}}
							<form class="form contact-us-form"  method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
								@csrf
							<div class="form-group">
								<label for="username">Your Name</label>
								<input type="text" id="username" name="name"
									class="form-control">
							</div>
							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject"
									class="form-control">
							</div>
							<div class="form-group">
								<label for="email_1">Your Email</label>
								<input type="email" id="email_1" name="email_1"
									class="form-control">
							</div>
							<div class="form-group">
								<label for="phone">Your Phone Number</label>
								<input type="number" id="phone" name="phone"
									class="form-control">
							</div>
							<div class="form-group">
								<label for="message">Your Message</label>
								<textarea id="message" name="message" cols="30" rows="5"
									class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
						</form>
					</div>
				</div>
			</section>
			<!-- End of Contact Section -->
		</div>

		<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
		<div class="google-map contact-google-map" id="googlemaps"></div>
		<!-- End Map Section -->
	</div>
	<!-- End of PageContent -->


@endsection
@push('scripts')
<script src="{{ asset('frontend/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/contact.js') }}"></script>
@endpush