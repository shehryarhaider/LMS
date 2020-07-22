@extends('cms.layouts.masterpage')

@section('title', 'Dashboard')

@section('top-styles')
<!--Morris Chart CSS -->

<link rel="stylesheet" href="{{ url('') }}/plugins/morris/morris.css">
<style>
  p.text-muted.mb-0 {
    font-size: 20px;
    font-weight: bolder;
  }
</style>
@endsection

@section('header')
  @parent
@endsection

@section('leftsidebar')
  @parent
@endsection

@section('content')
<!-- Start content -->
<div class="content">

  <div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">

        <h4 class="page-title">Dashboard</h4>
        <p class="text-muted page-title-alt">Welcome {{Auth::user()->name}} !</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-lg-4 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
          <div class="bg-icon bg-icon-info pull-left">
            <i class="fa fa-user"></i>
          </div>
          <div class="text-right">
            <h3 class="text-dark">
              <b class="counter">{{$users}}</b>
            </h3>
            <p class="text-muted mb-0">Total Users</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
          <div class="bg-icon bg-icon-info pull-left">
            <i class="fa fa-users"></i>
          </div>
          <div class="text-right">
            <h3 class="text-dark">
              <b class="counter">{{$users}}</b>
            </h3>
            <p class="text-muted mb-0">New Customer</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
          <div class="bg-icon bg-icon-info pull-left">
            <i class="fa fa-bus"></i>
          </div>
          <div class="text-right">
            <h3 class="text-dark">
              <b class="counter">{{$users}}</b>
            </h3>
            <p class="text-muted mb-0">Vendor / Supplier</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
          <div class="bg-icon bg-icon-info pull-left">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <div class="text-right">
            <h3 class="text-dark">
              <b class="counter">{{$users}}</b>
            </h3>
            <p class="text-muted mb-0">Add New Item</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
          <div class="bg-icon bg-icon-info pull-left">
            <i class="fa fa-credit-card-alt"></i>
          </div>
          <div class="text-right">
            <h3 class="text-dark">
              <b class="counter">{{$users}}</b>
            </h3>
            <p class="text-muted mb-0">Purchase Bill</p>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>

  </div>
  <!-- container -->

</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')
<script src="{{ url('') }}/plugins/peity/jquery.peity.min.js"></script>

<!-- jQuery  -->
<script src="{{ url('') }}/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ url('') }}/plugins/counterup/jquery.counterup.min.js"></script>

<script src="{{ url('') }}/plugins/morris/morris.min.js"></script>
<script src="{{ url('') }}/plugins/raphael/raphael-min.js"></script>

<script src="{{ url('') }}/plugins/jquery-knob/jquery.knob.js"></script>

<script src="{{ url('') }}/assets/pages/jquery.dashboard.js"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
  jQuery(document).ready(function ($) {
    $('.counter').counterUp({
      delay: 100,
      time: 1200
    });

    $(".knob").knob();

  });
</script>
@endsection
