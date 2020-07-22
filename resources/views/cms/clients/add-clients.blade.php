@extends('cms.layouts.masterpage')

@section('title', 'Add Client')

@section('top-styles')
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
          <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Clients</a></li>
          <li class="breadcrumb-item active">Add client</li>
        </ol>
      </div>
    </div>

    <form action="{{$isEdit ? route('clients.update', [$client->id]) : route('clients.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
      @csrf
      @if ($isEdit)
      <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title"><span class="ti-user mr-2"></span>Add Client</h3>
          <div class="portlet-widgets">
            <a href="{{route('clients')}}">
              <button type="button" class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect"><i class="fa fa-arrow-left pr-1"></i>
                Go back</button>
            </a>
            <span class="divider"></span>
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label"><i class="fa fa-save"></i></span> Save
            </button>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" parsley-trigger="change" required placeholder="Name..." class="form-control"
                      id="userName" value="{{old('name') ?? $client->name ?? null}}">
                  </div>
                  <span class="text-danger">{{ $errors->first('name') ?? null }}</span>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Email..." class="form-control"
                      value="{{ old('email') ?? $client->email ?? null}}">
                  </div>
                  <span class="text-danger">{{ $errors->first('email') ?? null }}</span>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Number <span class="text-danger">*</span></label>
                    <input type="number" name="number" placeholder="Number..." class="form-control" value="{{ old('number') ?? $client->number ?? null }}">
                  </div>
                  <span class="text-danger">{{ $errors->first('number') ?? null }}</span>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>

    </form>

  </div><!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
    @parent
@endsection

@section('bottom-mid-scripts')
<script src="{{url('')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
@endsection

@section('bottom-bot-scripts')

<script>
  jQuery(document).ready(function() {
        // Date Picker
    jQuery('#dob').datepicker({
        format: 'yyyy-mm-dd',
    });

    $('form').parsley();

  });
</script>
@endsection
