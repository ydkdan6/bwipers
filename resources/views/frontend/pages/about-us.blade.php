@extends('frontend.layouts.shop')

@section('title', 'About ' . config('app.name'))

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
        .xx h1 {
            position: absolute;
            top: 75rem;
            padding-left: 2rem;
            font-size: 7rem;
            color: goldenrod;
        }

        @media (max-width: 790px) {
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

            <section class="customer-service mb-7">
                <div class="row align-items-center">
                    <div class="col-md-6 pr-lg-8 mb-8">
                        <h2 class="title text-left">About Us</h2>
                        <p>
                            Welcome to Simcherry Nigeria Limited, the proud home of CheriX Baby Wipes. With our headquarters
                            nestled in the vibrant city of Abuja, Nigeria, we are a diverse company engaged in
                            various businesses, ranging from food to outdoor catering services and event management, to baby
                            care products.</p>

                        <p>At Simcherry, we are thrilled to introduce our latest offering to the Nigerian market – CheriX
                            Baby Wipes. Crafted with utmost care, these wipes are specifically designed to pamper and
                            protect your baby's delicate skin. Our commitment to excellence is reflected in every aspect of
                            CheriX, from the premium materials used to the thoughtful infusion of moisture.</p>

                        <p>Indulge your senses with the subtle and pleasing soft rose fragrance that accompanies each wipe,
                            providing a sophisticated solution for maintaining a smooth and fresh body feel. We understand
                            the importance of safety, which is why CheriX is composed of non-toxic materials and is
                            completely alcohol-free.</p>

                        <p>What sets CheriX apart is our dedication to catering to your unique needs. We offer various pack
                            sizes to fit into different budgets and lifestyles. Choose from the generous 120pcs per pack for
                            the big planners, the practical 80pcs per pack for the mid planners, or the versatile 96pcs per
                            bag, comprising 12pcs per small pack. These small packs can be conveniently carried, with 8 of
                            them making up a bag for on-the-go companionship.
                        </p>
                        <p> Join us in this journey of care and love with CheriX – because your baby deserves the best, and
                            so do you.</p>


                    </div>
                    <div class="col-md-6 mb-8">
                        <figure class="br-lg">
                            <img src="{{ asset('frontend/assets/images/trans2.png') }}" alt="Banner" width="610"
                                height="500" style="background-color: #CECECC;" />
                        </figure>
                    </div>
                </div>
            </section>

            <section class="count-section mb-10 pb-5" style="display: none;">
                <div class="swiper-container swiper-theme"
                    data-swiper-options="{
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
