@extends('cms.layouts.masterpage')

@section('title', 'Post')

@section('top-styles')
<!-- summernote -->
<link href="{{url('')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

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
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Post</a>
          </li>
          <li class="breadcrumb-item active">Add Post</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('blog.post.update',[Session::get('site_id'),$post->id]): route('blog.post.store',[Session::get('site_id')])}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet m-b-0">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Post</h3>
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

        <div class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box m-b-0">
              <div class="row m-b-20">
                <div class="col-md-6">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' parsley-trigger="change" {{$isEdit ?? 'required'}} name="featured_image" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload1">
                        <span> Featured Image</span>
                      </label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview1" style="background-image : url({{url('').$post->featured_image ?? 'placeholder.jpg' }}"></div>
                    </div>
                  </div>
                  <span class="text-danger">{{$errors->first('featured_image') ?? null}}</span>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Slug (use only lowercase alphabets and hyphens)</label>
                    <input type="text" id="field-1" name="slug" placeholder="slug" class="form-control" value="{{ old('slug') ?? $post->slug ?? null }}" required data-parsley-pattern="[a-z]+(-[a-z]+)*$" data-parsley-pattern-message="Only Lower alphabets and hyphens are allowed"
                    data-parsley-remote="{{route('blog.post.validater',[$post->id ?? 0])}}" data-parsley-remote-message="This slug is already being used."
                    >
                  </div>
                  <span class="text-danger">{{$errors->first('slug')?? null}}</span>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Category</label>
                    <select name="blog_category_id" id="blog_category_id" class="form-control" required>
                      <option value="" disabled selected>Please Select</option>
                      @foreach ($category as $item)
                        <option value="{{$item->id}}" {{$isEdit && $item->id == $post->blog_category_id ? "selected" : null}}>{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <span class="text-danger">{{$errors->first('blog_category_id') ?? null}}</span>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Name</label>
                    <input type="text" id="field-1" name="heading" placeholder="Name" class="form-control" value="{{ old('heading') ?? $post->heading ?? null }}" required>
                  </div>
                  <span class="text-danger">{{$errors->first('heading') ?? null}}</span>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="field-1">SEO - Tags</label>
                    <input type="text" id="field-1" name="tags"  class="form-control" value="{{ old('tags') ?? $post->tags ?? null }}" data-role="tagsinput" autocomplete="off" required>
                  </div>
                  <span class="text-danger">{{$errors->first('tags') ?? null}}</span>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="field-1" class="control-label">description</label>
                    <textarea name="description" id="" class="form-control" required>{{ old('description') ?? $post->description ?? null }}</textarea>
                  </div>
                  <span class="text-danger">{{$errors->first('description') ?? null}}</span>
                </div>

              </div>

              <div class="separator"></div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="custom-summernote">
                    <label class="control-label">Blog Text</label>
                    <span class="text-danger">{{$errors->first('text')?? null}}</span>
                    <textarea name="text" class="summernote" required>
                      {!! old('text') ?? $post->text ?? null !!}
                    </textarea>
                  </div>
                  <span class="text-danger">{{$errors->first('text') ?? null}}</span>
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
<script src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript" src="{{url('')}}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('form').parsley();

    $('.summernote').summernote({
      height: 350,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: false                 // set focus to editable area after initializing summernote
    });

    $('.inline-editor').summernote({
      airMode: true
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
  function goBack() {
    window.history.back();
  }
</script>
@endsection
