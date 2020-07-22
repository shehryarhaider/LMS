@extends('vendor.layouts.masterpage')

@section('title', 'Add permissions')

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
            <a href="#">Permission</a>
          </li>
          <li class="breadcrumb-item active">Add Permission</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('vendor.permission.update',[$permission->id]) : route('vendor.permission.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Permission</h3>
          <div class="portlet-widgets">
            <a href="{{route('vendor.permission')}}">
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
                    <label>Menu
                      <span class="text-danger">*</span>
                    </label>
                    <select data-style="btn-white" parsley-trigger="change" required name="menu_id" class="form-control" tabindex="-98">
                      <option selected="" disabled="" value="Null">Please pick a Menu</option>
                      @foreach ($menu as $item)
                          <option value="{{$item->id}}" {{ isset($permission) && $permission->menus->id == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                          @foreach ($item->children as $child)
                              <option value="{{$child->id}}" {{ isset($permission) && $permission->menus->id == $child->id ? 'selected' : null }}>&emsp;{{ $child->name }}</option>
                              @foreach ($child->children as $children)
                                  <option value="{{$children->id}}" {{ isset($permission) && $permission->menus->id == $children->id ? 'selected' : null }}>&emsp;&emsp;{{ $children->name }}</option>
                              @endforeach
                          @endforeach
                      @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('menu_id')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="name" value="{{$permission->name ?? null }}">
                    <span class="text-danger">{{$errors->first('name')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Route
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="route" parsley-trigger="change" required placeholder="Route..." class="form-control" id="route" value="{{$permission->route ?? null }}">
                    <span class="text-danger">{{$errors->first('route')?? null}}</span>
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
