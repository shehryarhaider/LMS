@extends('cms.layouts.masterpage')

@section('title', 'Add Chart of Account')

@section('top-styles')

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
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Chart of Accounts</a>
          </li>
          <li class="breadcrumb-item active">Add Chart Account</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('chart_of_account.update',[$chart_of_account->id]) : route('chart_of_account.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Chart of Account</h3>
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
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="userName" value="{{$chart_of_account->name ?? null }}"
                    data-parsley-remote="{{route('chart_of_account.validater',[$chart_of_account->id ?? 0])}}" data-parsley-remote-message="This name has already been taken.">
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

@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {

    $('form').parsley();
  });
</script>
@endsection
