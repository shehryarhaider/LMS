@extends('cms.layouts.masterpage')

@section('title', 'Add User')

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
          <li class="breadcrumb-item active">Add User</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('users.update', [$user->id]) : route('users.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @if ($isEdit)
      <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title"><span class="ti-user mr-2"></span>Add User</h3>
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
                      id="userName" value="{{$user->name ?? old('name') ?? null}}">
                  </div>
                  <span class="text-danger">{{ $errors->first('name') ?? null }}</span>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Role <span class="text-danger">*</span></label>
                    <select parsley-trigger="change" required="" data-style="btn-white" name="role_id" class="form-control"
                      tabindex="-98">
                      <option selected="" disabled="" value="null">Please Select a Role</option>
                      @foreach ($roles as $item)
                      <option value="{{$item->id}}"
                        {{
                                            old('role_id') && old('role_id') == $item->id ? 'selected' : $isEdit && $user->role_id == $item->id ? 'selected' : null}}>{{
                        $item->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" parsley-trigger="change" required="" placeholder="Email..." class="form-control"
                      value="{{ $user->email ?? old('email') ?? null}}" data-parsley-remote="{{route('users.validater',[$user->id ?? 0])}}"
                      data-parsley-remote-message="This email is already being used.">
                  </div>
                  <span class="text-danger">{{ $errors->first('email') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" placeholder="Password..." class="form-control"
                      {{ $isEdit ? null : 'parsley-trigger="change" required' }}
                      data-parsley-maxlength="22"
                      data-parsley-minlength="6">
                  </div>
                  <span class="text-danger">{{ $errors->first('password') ?? null }}</span>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-control"
                      {{ $isEdit ? null : 'parsley-trigger="change" required' }}
                      data-parsley-maxlength="22"
                      data-parsley-minlength="6">
                  </div>
                  <span class="text-danger">{{ $errors->first('password_confirmation') ?? null }}</span>
                </div>
                @if ($isEdit)
                  <div class="col-md-4">
                    <img src="{{Storage::disk('padeaf')->url($user->avatar ?? null)}}" alt="" style="max-width:150px">
                  </div>
                @endif
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
</div> <!-- content -->
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


  });
</script>
@endsection
