@extends('frontend.layouts.shop')
@section('title','FAQ |'. config('app.name'))
@section('main-content')
	
<!-- Start of Page Header -->
<div class="page-header" style="height: 180px;">
	<div class="container">
		<h1 class="page-title mb-0">FAQs</h1>
	</div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav mb-10 pb-1">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li>FAQs</li>
		</ul>
	</div>
</nav>
<!-- End of Breadcrumb -->

<!-- Start of PageContent -->
<div class="page-content faq">
	<div class="container">
		<section class="content-title-section">
			<h3 class="title title-simple justify-content-center bb-no pb-0">Frequent Asked
				Questions
			</h3>
			<p class="description text-center">You can show the faqs with <b>CheriX Online Store</b> easily.</p>
		</section>

		<section class="mb-6">
			<!-- <h4 class="title title-center mb-5">Shipping Information</h4> -->
			<div class="row">
				<div class="col-md-6 mb-8">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse1-1" class="collapse">Is CheriX Baby Wipes registered?</a>
							</div>
							<div id="collapse1-1" class="card-body expanded">
								<p class="mb-0">Absolutely. CheriX Baby Wipes is proudly owned and exclusively distributed in Nigeria by Simcherry Nigeria Limited.

								</p>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a href="#collapse1-2" class="expand">Where are your offices located?</a>
							</div>
							<div id="collapse1-2" class="card-body collapsed">
								<p class="mb-0">Visit our Corporate Head Office at 21, Oluwaleimu Street, off Toyin Street, Ikeja Lagos. For our Abuja location, come to Plot 242 Mohammadu Buhari Way, Central Business District 900103, Abuja, Federal Capital Territory, Nigeria.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-8">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse1-3" class="collapse">Do you have plans for expanding offices to other locations?</a>
							</div>
							<div id="collapse1-3" class="card-body expanded">
								<p class="mb-0">Currently, our offices are in Lagos and Abuja, but stay tuned! We're working diligently on expanding our presence to serve you better.
								</p>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<a href="#collapse1-4" class="expand">Apart from baby wipes, do you have other products?</a>
							</div>
							<div id="collapse1-4" class="card-body collapsed">
								<p class="mb-0">While we currently specialize in baby wipes, exciting news awaits! We're actively researching and developing an array of baby care products, including baby oil, baby cream, diapers, and other feminine care items. Your baby's holistic well-being is our priority.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>

		<section class="mb-10">
			<!-- <h4 class="title title-center mb-5">Payment</h4> -->
			<div class="row">
				<div class="col-md-6 mb-4">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse2-1" class="collapse">How can I stay updated on new product releases?</a>
							</div>
							<div id="collapse2-1" class="card-body expanded">
								<p class="mb-0">To stay in the loop about our upcoming products, promotions, and more, subscribe to our newsletter. Receive timely updates on CheriX developments directly to your inbox.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse2-2" class="collapse">Can I purchase CheriX Baby Wipes online?</a>
							</div>
							<div id="collapse2-2" class="card-body expanded">
								<p class="mb-0">Absolutely! CheriX Baby Wipes are available for purchase on our official website. Enjoy the convenience of doorstep delivery by ordering online.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>

		<section class="mb-10">
			<!-- <h4 class="title title-center mb-5">Orders & Returns</h4> -->
			<div class="row">
				<div class="col-md-6 mb-8">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse3-1" class="collapse">Are CheriX Baby Wipes eco-friendly?</a>
							</div>
							<div id="collapse3-1" class="card-body expanded">
								<p class="mb-0">Yes, our commitment extends beyond care for your baby to care for the environment. CheriX Baby Wipes are crafted with eco-friendly materials, reflecting our dedication to sustainability.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-8">
					<div class="accordion accordion-bg accordion-gutter-md accordion-border">
						<div class="card">
							<div class="card-header">
								<a href="#collapse3-3" class="expand">How can I contact CheriX for further inquiries?</a>
							</div>
							<div id="collapse3-3" class="card-body collapsed">
								<p class="mb-0">For any additional questions or information, reach out to us at cherixhq@gmail.com or give us a call at  +234 704 653 9854. We're here to ensure your experience with CheriX is as delightful as our wipes.
								</p>
							</div>
						</div>

						
					</div>
				</div>
				
			</div>
		</section>
	</div>
</div>
<!-- End of PageContent -->

@endsection