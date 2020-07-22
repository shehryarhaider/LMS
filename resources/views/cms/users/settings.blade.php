@extends('cms.layouts.masterpage')

@section('title', 'Update Profile')

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
        <div class="btn-group pull-right">
          <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span
              class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
        </div>

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Users</a></li>
          <li class="breadcrumb-item active">Update Profile</li>
        </ol>

      </div>
    </div>

    <form action="{{route('users.settings')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="patch">
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title"><span class="ti-user mr-2"></span>Update Profile</h3>
          <div class="portlet-widgets">
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
                      id="userName" value="{{$user->name}}">
                  </div>
                  <span class="text-danger">{{ $errors->first('name') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Email..." class="form-control"
                      value="{{$user->email}}"
                      data-parsley-remote="{{route('users.validater',[Auth::user()->id])}}" data-parsley-remote-message="This email is already being used."
                      >
                  </div>
                  <span class="text-danger">{{ $errors->first('email') ?? null }}</span>
                </div>

                <div class="col-md-2">
                  <div class="mt30">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="changePasswordCheckbox" name="change_password" {{ old('change_password') == 1 ? 'checked' : null }} value="1">
                      <label class="custom-control-label" for="changePasswordCheckbox">Change Password</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Current Password <span class="text-danger">*</span></label>
                    <input type="password" name="current_password" placeholder="Password..." class="form-control" disabled data-parsley-maxlength="22"
                    data-parsley-minlength="6">
                  </div>
                  <span class="text-danger">{{ $errors->first('current_password') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>New Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" placeholder="Password..." class="form-control" disabled data-parsley-maxlength="22"
                    data-parsley-minlength="6">
                  </div>
                  <span class="text-danger">{{ $errors->first('password') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-control" disabled data-parsley-maxlength="22"
                      data-parsley-minlength="6">
                  </div>
                  <span class="text-danger">{{ $errors->first('password_confirmation') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <img src="{{Storage::disk('padeaf')->url($user->avatar)}}" alt="" style="max-width:150px">
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Avatar <small>only 150x150 images accepted!</small></label>
                    <input type="file" name="avatar" parsley-trigger="change" placeholder="Name..." class="form-control"
                      id="avatar">
                  </div>
                  <span class="text-danger">{{ $errors->first('avatar') ?? null }}</span>
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
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function() {
        // Date Picker
    jQuery('#dob').datepicker({
        format: 'yyyy-mm-dd',
    });

    $('form').parsley();

    $('#changePasswordCheckbox').click(function(){
      if($(this).prop('checked'))
      {
        $('input[name="current_password"]').removeAttr('disabled');
        $('input[name="current_password"]').attr('required',true);
        $('input[name="password"]').removeAttr('disabled');
        $('input[name="password"]').attr('required',true);
        $('input[name="password_confirmation"]').removeAttr('disabled');
        $('input[name="password_confirmation"]').attr('required',true);
      }
      else
      {
        $('input[name="current_password"]').removeAttr('required');
        $('input[name="current_password"]').attr('disabled',true);
        $('input[name="password"]').removeAttr('required');
        $('input[name="password"]').attr('disabled',true);
        $('input[name="password_confirmation"]').removeAttr('required');
        $('input[name="password_confirmation"]').attr('disabled',true);
      }
    });

    if($('#changePasswordCheckbox').prop('checked'))
    {
      $('input[name="current_password"]').removeAttr('disabled');
      $('input[name="current_password"]').attr('required',true);
      $('input[name="password"]').removeAttr('disabled');
      $('input[name="password"]').attr('required',true);
      $('input[name="password_confirmation"]').removeAttr('disabled');
      $('input[name="password_confirmation"]').attr('required',true);
    }
    else
    {
      $('input[name="current_password"]').removeAttr('required');
      $('input[name="current_password"]').attr('disabled',true);
      $('input[name="password"]').removeAttr('required');
      $('input[name="password"]').attr('disabled',true);
      $('input[name="password_confirmation"]').removeAttr('required');
      $('input[name="password_confirmation"]').attr('disabled',true);
    }

  });
</script>
@endsection
