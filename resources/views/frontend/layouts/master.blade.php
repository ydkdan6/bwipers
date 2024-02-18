<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
	@include('frontend.layouts.head')	
  </head>

<body class="home">
    <div class="page-wrapper">
        <!-- Header -->
		@include('frontend.layouts.header')
        <!-- End of Header -->

        <!-- Start of Main -->
        <main class="main">
			@yield('main-content')
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('frontend.layouts.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper -->
	@include('frontend.layouts.tale')
    
</body>
</html>
