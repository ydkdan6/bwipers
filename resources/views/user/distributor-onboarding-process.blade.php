@extends('frontend.layouts.shop')

@section('main-content')
    <div class="wrapper ovh">
        <div id="page" class="stylehome1 mx-auto">
            <div class="mobile-menu">
                <div class="header stylehome1 home5_style">
                    <div class="menu_and_widgets">

                        <div class="posr">
                            <div class="mobile_menu_close_btn">
                                <span class="flaticon-close"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="body_content_wrapper position-relative">
                <!-- Our SigIn -->
                <section class="our-log-reg bgc-f5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-xl-5 col-xxl-4 m-auto">
                                <div class="log_reg_form mt70-992">
                                    <h2 class="title">How to become a Distributor @Cherix Baby Wipes</h2>
                                    <h6>This Distributor Agreement ("Agreement") is entered into between Cherix Baby Wipes
                                        ("Company") and
                                        <br>
                                        <h6>Already a Distributor. Ignore the information below and <a
                                                href="{{ route('distributor.home') }}"
                                                style="color: gold; text-decoration: underline;">Click Here</a></h6>
                                    </h6>
                                    <h4>Registering as a first time distributor, Follow This Steps Below</h4>
                                    <ol type="1">
                                        <li>* Fill in the Distributor Agreement Letter</li>
                                        <li>* After Filling the form and filling it, Kindly Submit.</li>
                                        <li>* Click on the button after the form 👇</a></li>
                                    </ol>
                                    <iframe
                                        src="https://docs.google.com/forms/d/e/1FAIpQLSfvZI6Sp61lJYTW-fyHG8dSq1yXIUZntSUqAd3yNDc5KHAc9Q/viewform?embedded=true"
                                        width="640" height="2034" frameborder="0" marginheight="0"
                                        marginwidth="0">Loading…</iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
            </div>
        @endsection

        @section('styles')
            <style>
                @media only screen and (max-width: 800px) {
                    header {
                        position: fixed;
                    }
                }
            </style>
        @endsection
