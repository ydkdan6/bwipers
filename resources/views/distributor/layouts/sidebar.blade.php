<div class="dashboard__sidebar">
  <div class="dashboard_sidebar_list">
      <div class="sidebar_list_item">
          <a href="{{ route('distributor.home') }}" class="items-center {{ request()->routeIs('distributor.home') ? '-is-active' : '' }}">
              <i class="flaticon-house mr15"></i>Dashboard
          </a>
      </div>
      <div class="sidebar_list_item">
          <a href="{{ route('distributor.products') }}" class="items-center {{ request()->routeIs('distributor.products') ? '-is-active' : '' }}">
              <i class="flaticon-cash-on-delivery mr15"></i>Products
          </a>
      </div>
      <div class="sidebar_list_item">
          <a href="{{ route('distributor.transactions') }}" class="items-center {{ request()->routeIs('distributor.transactions') ? '-is-active' : '' }}">
              <i class="flaticon-checked-box mr15"></i>Transaction Order
          </a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{ route('distributor.referral.earnings') }}" class="items-center {{ request()->routeIs('distributor.referral.earnings') ? '-is-active' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="black" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
          <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
        </svg></i> &nbsp; &nbsp;&nbsp;<i class=""></i>Referral Earning</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{ route('distributor.referrals') }}" class="items-center {{ request()->routeIs('distributor.referrals') ? '-is-active' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="black" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
          <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
        </svg></i> &nbsp; &nbsp;&nbsp;<i class=""></i>Referrals</a>
      </div>
      <div class="sidebar_list_item">
          <a href="{{ route('distributor.credit-history') }}" class="items-center {{ request()->routeIs('distributor.credit-history') ? '-is-active' : '' }}">
              <i class="flaticon-growth mr15"></i>Credit History
          </a>
      </div>
      <div class="sidebar_list_item">
          <a href="#" class="items-center"><i class="flaticon-mail-inbox-app mr15"></i>Message</a>
      </div>
      <div class="sidebar_list_item">
          <a href="{{ route('distributor.distributor-settings') }}" class="items-center {{ request()->routeIs('distributor.distributor-settings') ? '-is-active' : '' }}">
              <i class="flaticon-settings mr15"></i>Settings
          </a>
      </div>
      <div class="sidebar_list_item">
          <form action="{{ route('logout') }}" method="post" id="logout">@csrf</form>
          <a href="#" onclick="document.getElementById('logout').submit()" class="items-center"><i class="flaticon-exit mr15"></i>Logout</a>
      </div>
  </div>
</div>
