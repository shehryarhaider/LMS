@extends('cms.layouts.masterpage')

@section('title', 'Add Business')

@section('top-styles')
<link href="{{url('')}}/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet">
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

        <div class="btn-group pull-right">
          <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
        </div>

        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Edit Seo</li>
        </ol>
      </div>
    </div>
    <form action="{{route('seo.update',[$menu->id])}}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="put">
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Edit {{$menu->name}}</h3>
          <div class="portlet-widgets">
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
                    <label>Tags
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" autocomplete="off" name="seo_tags" parsley-trigger="change" placeholder="Tags..." class="form-control" id="seo_tags" value="{{old('seo_tags') ?? $menu->seo_tags ?? null }}" required data-role="tagsinput">
                    <span class="text-danger">{{$errors->first('seo_tags') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description
                      <span class="text-danger">*</span>
                    </label>
                    <textarea name="seo_description" parsley-trigger="change" class="form-control" id="tags" required>{{old('seo_description') ?? $menu->seo_description ?? null }}</textarea>
                    <span class="text-danger">{{$errors->first('seo_description') ?? null}}</span>
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
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script type="text/javascript" src="{{url('')}}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script>
  jQuery(document).ready(function () {


    $('form').parsley();
  });
</script>
@endsection
