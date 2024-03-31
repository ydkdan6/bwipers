h<header class="dashboard_header">
    <div class="header__container pt20 pb20 pl30 pr30">
        <div class="row justify-between items-center">
        <div class="col-sm-4 col-xl-2">
            <div class="text-center text-lg-start d-flex mb15-520">
            <div class="fz20 me-4">
                <a href="#" class="dashboard_sidebar_toggle_icon text-thm1 vam"><i class="fa-sharp fa-solid fa-bars-staggered"></i></a>
            </div>
        <div class="dashboard_header_logo">
            <img class="img-logo" src="{{asset('distributor/img/main-logo3.png')}}">
        </div>
        </div>
    </div>
    <div class="col-sm-3 col-xl-3 d-none d-md-block">
        <div class="header_search_widget mb15-520">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username">
            <div class="input-group-append">
            <button class="btn" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-5 col-xl-6 offset-xl-1 d-none d-md-block">
        <div class="text-center text-lg-end header_right_widgets">
        <ul class="mb0 d-flex justify-content-center justify-content-sm-end">
            <li class=""><a class="text-center" href="distributor-login.html"><span class="flaticon-exit"></span></a></li>
            <li class=""><a class="text-center" href="distributor-message.html"><span class="flaticon-mail-inbox-app"></span></a></li>
            <li class=" user_setting">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <img src="{{auth()->user()->gravatar}}" alt="user.png" height="50" width="50" style="border-radius: 50%;"> 
                </a>
                <div class="dropdown-menu">
                <div class="user_setting_content">
                    <a class="dropdown-item active" href="{{ route('distributor.home') }}"><i class="flaticon-house mr10"></i>Dashboard</a>
                    <a class="dropdown-item" href="{{ route('distributor.products') }}"><i class="flaticon-cash-on-delivery mr10"></i>Products</a>
                    <a class="dropdown-item" href="{{route('distributor.transactions')}}"><i class="flaticon-checked-box mr10"></i>Transaction History</a>
                    <a class="dropdown-item" href="{{route('distributor.credit-history')}}"><i class="flaticon-growth mr10"></i>Credit History</a>
                    <a class="dropdown-item" href="distributor-message.html"><i class="flaticon-mail-inbox-app mr10"></i>Message</a>
                    <a class="dropdown-item" href="{{ route('distributor.distributor-settings') }}"><i class="flaticon-settings mr10"></i>Settings</a>
                    <a class="dropdown-item" href="#" onclick=" document.getElementById('logout').submit() "><i class="flaticon-exit mr10"></i>Logout</a>
                </div>
                </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </div>
    </div>
</header>