@extends('cms.layouts.masterpage')

@section('title', 'Add Gallery')

@section('top-styles')
<link href="{{ url('') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
            <a href="#">Gallery</a>
          </li>
          <li class="breadcrumb-item active">Add Gallery</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('gallery.update',[$gallery->id]) : route('gallery.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Gallery</h3>
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
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' name="image" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload1"><span>Featured Image  </span></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview1" style="background-image : url({{getConfig('files_link')}}{{$gallery->image ?? 'placeholder.jpg'}}">
                      </div>
                    </div>
                  </div>
                  <span class="text-danger">{{$errors->first('image') ?? null}}</span>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event Category
                      <span class="text-danger">*</span>
                    </label>
                      <select name="event_category" class="form-control select2" id="userName" required>
                        <option value="" disabled selected> Please Select</option>
                        @foreach ($event_category as $category)
                          <option value="{{$category->id}}" @if($isEdit==true){{$gallery->mf_event_category_id == $category->id ? 'selected' : null}} @endif>
                            {{$category->name}}
                          </option>
                        @endforeach
                      </select>
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
<script src="{{ url('') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {

    $('form').parsley();
    $('.select2').select2();

    function readURL(input, number) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imagePreview' + number).css('background-image', 'url(' + e.target.result + ')');
          $('#imagePreview' + number).hide();
          $('#imagePreview' + number).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#imageUpload1").change(function () {
      readURL(this, 1);
    });

  });
</script>
@endsection
