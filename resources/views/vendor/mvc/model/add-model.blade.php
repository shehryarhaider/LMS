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
          <li class="breadcrumb-item">
            <a href="#">Model</a>
          </li>
          <li class="breadcrumb-item active">Add Model</li>
        </ol>

      </div>
    </div>

    <form action="{{route('vendor.mvc.model.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Model</h3>
          <div class="portlet-widgets">
            <a href="{{route('vendor.mvc.model')}}">
              <button type="button" class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect">
                <i class="fa fa-arrow-left pr-1"></i> Go back</button>
            </a>
            <span class="divider"></span>
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label">
                <i class="fa fa-save"></i>
              </span> Save
            </button>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="file" name="model" parsley-trigger="change" required class="form-control" id="userName" value="{{$network->name ?? null }}">
                    <span class="text-danger">{{$errors->first('name')?? null}}</span>
                  </div>
                </div>


              </div>


            </div>

          </div>
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
