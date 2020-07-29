@extends('cms.layouts.masterpage')

@section('title', 'Add List of Accounts')

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
            <a href="{{route('chart_of_account')}}">Chart of Account : {{$chart_of_account->name}}</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('sub_account_type',[$chart_of_account->id])}}">Sub Account Type : {{$sub_account_type->name}}</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('list_of_account',[$chart_of_account->id,$sub_account_type->id])}}">List of Accounts</a>
          </li>
          <li class="breadcrumb-item active">Add List of Account</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('list_of_account.update',[$chart_of_account->id,$sub_account_type->id,$list_of_account->id]) : route('list_of_account.store',[$chart_of_account->id,$sub_account_type->id])}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add List of Account</h3>
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
                    <label>Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="userName" value="{{$list_of_account->name ?? null }}" data-parsley-remote="{{route('list_of_account.validater',[$list_of_account->id ?? 0])}}" data-parsley-remote-message="This name has already been taken.">
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
