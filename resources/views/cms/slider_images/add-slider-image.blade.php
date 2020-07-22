@extends('cms.layouts.masterpage')

@section('title', 'Add Slider Image')

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
          <li class="breadcrumb-item"><a href="#">Slider Image</a></li>
          @if ($isEdit)
          <li class="breadcrumb-item active">Edit Slider Image</li>
          @else
          <li class="breadcrumb-item active">Add Slider Image</li>
          @endif
        </ol>
      </div>
    </div>

    <form action="{{$isEdit ? route('slider_image.update', [$slider_image->id]) : route('slider_image.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @if ($isEdit)
      <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title"><span class="ti-user mr-2"></span>   @if ($isEdit ==true)Edit Slider Image @else Add Slider Image @endif</h3>
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
                      <div class="col-md-12">
                          <div class="avatar-upload">
                              <div class="avatar-edit">
                                <input type='file' name="image" id="imageUpload1" accept=".png, .jpg, .jpeg"  />
                                <label for="imageUpload1"><span>Featured Image <small>Only 201x91 Dimension Accepted</small> </span></label>
                              </div>
                              <div class="avatar-preview">
                                <div id="imagePreview1" style="background-image : url({{getConfig('files_link')}}{{$slider_image->image ?? 'placeholder.jpg'}}">
                                </div>
                              </div>
                            </div>
                            <span class="text-danger">{{$errors->first('image') ?? null}}</span>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Heading
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="heading" parsley-trigger="change"  placeholder="Heading Name..."  class="form-control" id="userName" value="{{$slider_image->heading ?? null }}" required>
                      <span class="text-danger">{{$errors->first('heading')?? null}}</span>
                    </div>

                    <div class="form-group">
                      <label>Text
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="text" parsley-trigger="change"  placeholder="Text..."  class="form-control" id="userName" value="{{$slider_image->text ?? null }}" required>
                      <span class="text-danger">{{$errors->first('text')?? null}}</span>
                    </div>

                    <div class="form-group">
                      <label>Button Text
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="button_text" parsley-trigger="change"  placeholder="Button Text..."  class="form-control" id="userName" value="{{$slider_image->button_text ?? null }}" required>
                      <span class="text-danger">{{$errors->first('button_text')?? null}}</span>
                    </div>

                    <div class="form-group">
                      <label>Link
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="link" parsley-trigger="change"  placeholder="Link Name..."  class="form-control" id="userName" value="{{$slider_image->link ?? null }}" required>
                      <span class="text-danger">{{$errors->first('link')?? null}}</span>
                    </div>
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
</script>
@endsection
