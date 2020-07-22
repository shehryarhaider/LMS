@extends('vendor.layouts.masterpage')

@section('title', 'Add Networks')

@section('top-styles')
<link href="{{url('')}}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="{{url('')}}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

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

    <div class="row">
      <div class="col-sm-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item active">Web Routing</li>
        </ol>

      </div>
    </div>

    <form action="{{route('vendor.route')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Update Routing File</h3>
          <div class="portlet-widgets">
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label">
                <i class="fa fa-save"></i>
              </span> update
            </button>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          @if (isset($updated))
          <div class="portlet-body">

            <div class="alert alert-success text-center">
                Route file has been updated
            </div>

          </div>
          @else
          <div class="portlet-body">

            <div class="alert alert-danger text-center">
                <strong>Warning !</strong> this is a crucial file for the web app. <br> Updating it with a incorrect file will break the web app and render it useless.
            </div>

            <div class="card-box">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>File
                      <span class="text-danger">*</span>
                    </label>
                    <input type="file" name="route" parsley-trigger="change" required class="form-control" id="userName" value="{{$network->name ?? null }}">
                    <span class="text-danger">{{$errors->first('name')?? null}}</span>
                  </div>
                </div>


              </div>


            </div>

          </div>
          @endif
        </div>

      </div>

    </form>

  </div>
  <!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')
<script src="{{url('')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('')}}/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {
    // Date Picker
    jQuery('#dob').datepicker({
      format: 'yyyy-mm-dd',
    });

    $('form').parsley();
  });
</script>
@endsection
