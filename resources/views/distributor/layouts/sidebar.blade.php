<div class="dashboard__sidebar">
    <div class="dashboard_sidebar_list">
      <div class="sidebar_list_item">
        <a href="{{ route('distributor.home') }}" class="items-center -is-active"><i class="flaticon-house mr15"></i>Dashboard</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{ route('distributor.products') }}" class="items-center"><i class="flaticon-cash-on-delivery mr15"></i>Products</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{route('distributor.transactions')}}" class="items-center"><i class="flaticon-checked-box mr15"></i>Transaction Order</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{route('distributor.credit-history')}}" class="items-center"><i class="flaticon-growth mr15"></i>Credit History</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="" class="items-center"><i class="flaticon-mail-inbox-app mr15"></i>Message</a>
      </div>
      <div class="sidebar_list_item ">
        <a href="{{ route('distributor.distributor-settings') }}" class="items-center"><i class="flaticon-settings mr15"></i>Settings</a>
      </div>
      <div class="sidebar_list_item ">
        <form action="{{route('logout')}}" method="post" id="logout">@csrf</form>
        <a href="#" onclick=" document.getElementById('logout').submit() " class="items-center"><i class="flaticon-exit mr15"></i>Logout</a>
      </div>
    </div>
  </div>