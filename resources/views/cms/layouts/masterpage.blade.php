<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A Content Management System designed by horizontech.biz">
  <meta name="author" content="Designed &amp; Developed by horizontech.biz">

  <link rel="shortcut icon" href="{{ url('') }}/assets/images/favicon.ico">
  <title>{{getConfig('site_name')}} - @yield('title')</title>

  @yield('top-styles')

  <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ url('') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

  <link href="{{ url('') }}/assets/css/custom.css" rel="stylesheet" type="text/css" />

  <script src="{{ url('') }}/assets/js/modernizr.min.js"></script>


</head>


<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">

    @section('header')
      @include('cms.layouts.header')
    @show

    @section('leftsidebar')
      @include('cms.layouts.leftsidebar')
    @show



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">

      @yield('content')


      <footer class="footer text-right">
        &copy; 2016 - {{Date('Y')}} <a href="https://horizontech.biz" target="_blank">Horizon Technologies</a>. All rights reserved.
      </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    @section('rightsidebar')
      @include('cms.layouts.rightsidebar')
    @show

  </div>
  <!-- END wrapper -->



  <script>
    var resizefunc = [];
  </script>
  <!-- axios -->
  <script src="{{url('')}}/assets/js/sweetalert2.min.js"></script>
  <script src="{{url('')}}/assets/js/axios.min.js"></script>
  <!-- jQuery  -->
  <script src="{{ url('') }}/assets/js/jquery.min.js"></script>
  <script src="{{ url('') }}/assets/js/popper.min.js"></script>
  <!-- Popper for Bootstrap -->
  <script src="{{ url('') }}/assets/js/bootstrap.min.js"></script>
  <script src="{{ url('') }}/assets/js/detect.js"></script>
  <script src="{{ url('') }}/assets/js/fastclick.js"></script>
  <script src="{{ url('') }}/assets/js/jquery.slimscroll.js"></script>
  <script src="{{ url('') }}/assets/js/jquery.blockUI.js"></script>
  <script src="{{ url('') }}/assets/js/waves.js"></script>
  <script src="{{ url('') }}/assets/js/wow.min.js"></script>
  <script src="{{ url('') }}/assets/js/jquery.nicescroll.js"></script>
  <script src="{{ url('') }}/assets/js/jquery.scrollTo.min.js"></script> @yield('bottom-mid-scripts')

  <script src="{{ url('') }}/assets/js/jquery.core.js"></script>
  <script src="{{ url('') }}/assets/js/jquery.app.js"></script> @yield('bottom-bot-scripts')

</body>

</html>
