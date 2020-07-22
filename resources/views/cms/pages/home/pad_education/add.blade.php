@extends('cms.layouts.masterpage')

@section('title', $isEdit ? 'Edit List' : 'Add List')

@section('top-styles')
<!-- summernote -->
<link href="{{url('')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

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
            <a href="{{route('dashboard')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('content')}}">Content Pages</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('padeaf.home')}}">Home</a>
          </li>
          <li class="breadcrumb-item active">{{$isEdit ? 'Edit Image' : 'Add Image'}}</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('pad_education.update',[$pad_education->id]) : route('pad_education.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>{{$isEdit ? 'Edit Image' : 'Add Image'}}</h3>
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
                      <label>Heading
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="heading" parsley-trigger="change" required  class="form-control" value="{{$pad_education->heading ?? null }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Icon Class
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="below_heading" parsley-trigger="change" required  class="form-control" value="{{$pad_education->below_heading ?? null }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Text
                        <span class="text-danger">*</span>
                      </label>
                      <textarea type="text" name="text" parsley-trigger="change" required
                        class="form-control summernote">{{$pad_education->text ?? null }}</textarea>
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
<script src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {
    $('form').parsley();
   
    $('.summernote').summernote({
      height: 350, // set editor height
      minHeight: null, // set minimum height of editor
      maxHeight: null, // set maximum height of editor
      focus: false // set focus to editable area after initializing summernote
    });

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
