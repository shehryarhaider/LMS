@extends('vendor.layouts.masterpage')

@section('title', 'Add menus')

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
            <a href="#">Menu</a>
          </li>
          <li class="breadcrumb-item active">Add Website Menu</li>
        </ol>
      </div>
    </div>
    <form action="{{$isEdit ? route('vendor.menu.website.update',[$menu->id]) : route('vendor.menu.website.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Website Menu</h3>
          <div class="portlet-widgets">
            <a href="{{route('vendor.menu')}}">
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
                    <label>Parent Menu
                      <span class="text-danger">*</span>
                    </label>
                    <select data-style="btn-white" parsley-trigger="change" required name="parent_id" class="form-control" tabindex="-98">
                      <option selected value="0">[No Parent]</option>
                      @foreach ($parent as $item)
                          <option value="{{$item->id}}" {{ isset($menu) && $item->id == $menu->parent_id ? 'selected' : null}}>{{ $item->name }}</option>
                          @foreach ($item->children as $child)
                              <option value="{{$child->id}}" {{ isset($menu) && $child->id == $menu->parent_id ? 'selected' : null}}>&emsp;{{ $child->name }}</option>
                              @foreach ($child->children as $children)
                                  <option value="{{$children->id}}" {{ isset($menu) && $children->id == $menu->parent_id ? 'selected' : null}}>&emsp;&emsp;{{ $children->name }}</option>
                              @endforeach
                          @endforeach
                      @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('parent_id')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="name" value="{{old('name') ?? $menu->name ?? null }}">
                    <span class="text-danger">{{$errors->first('name')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Route
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="route" parsley-trigger="change" placeholder="Route..." class="form-control" id="route" value="{{old('route') ?? $menu->route ?? null }}">
                    <span class="text-danger">{{$errors->first('route')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sort
                      <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="sort" parsley-trigger="change" required placeholder="Sort.." class="form-control" id="sort" value="{{old('sort') ?? $menu->sort ?? null }}">
                    <span class="text-danger">{{$errors->first('sort')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Content Route</label>
                    <input type="text" name="content_route" parsley-trigger="change" placeholder="Content Route.." class="form-control" id="content_route" value="{{old('content_route') ?? $menu->content_route ?? null }}">
                    <span class="text-danger">{{$errors->first('content_route')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="checkbox">
                      <input id="isSeo" name="is_seo" type="checkbox"
                        {{ old('is_seo') == 1 ? 'selected' : $isEdit && $menu->is_seo == 1 ? 'checked' : "" }} value="1">
                      <label for="isSeo">
                        <span>Is seo ?</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="checkbox">
                      <input id="isContent" name="is_content" type="checkbox"
                        {{ old('is_content') == 1 ? 'selected' : $isEdit && $menu->is_content == 1 ? 'checked' : "" }} value="1">
                      <label for="isContent">
                        <span>Is content ?</span>
                      </label>
                    </div>
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
