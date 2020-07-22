@extends('vendor.layouts.masterpage')

@section('title', 'Dashboard')

@section('top-styles')
<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ url('') }}/plugins/morris/morris.css">
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

        <h4 class="page-title">Vendor Dashboard</h4>
        <p class="text-muted page-title-alt">Welcome {{Auth::user()->name}} !</p>
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
