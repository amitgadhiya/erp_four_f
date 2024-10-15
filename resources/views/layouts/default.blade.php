<!DOCTYPE html>

<html lang="en">
<head>
@include('includes.head')
</head>
<body>

  <div class="container-scroller">

    @include('includes.header')

    <div class="container-fluid page-body-wrapper">



        @include('includes.aside')



      <!-- partial -->

      <div class="main-panel">

        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title p-2 text-center mb-0">
                  @yield('title')
                </div>
                <div class="card-body p-2 col-lg-12">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
                  

                @yield('content')
                </div>
              </div>
                </div>
          </div>
            

        </div>

        <!-- content-wrapper ends -->

        @include('includes.footer')

        <!-- partial -->

      </div>

      <!-- main-panel ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>

  @include('includes.script')
  @yield('script')
  <script>
    $(".alert-block").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-block").slideUp(500);
});
  </script>
</body>



</html>

