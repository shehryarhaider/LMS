@extends('cms.layouts.masterpage')

@section('title', 'Settings')

@section('top-styles')
<!--summernote-->
<link href="{{url('')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet">
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
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Settings</li>
        </ol>
      </div>
    </div>
    <form  action="{{route('settings.update',[Session::get('site_id')])}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Update Settings</h3>
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
                  <div class="row">
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                            <input type='file' name="site_logo" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload1"><span>Featured Image <small>Only 201x91 Dimension Accepted</small> </span></label>
                          </div>
                          <div class="avatar-preview">
                            <div id="imagePreview1" style="background-image : url({{getConfig('files_link')}}{{$settings->where('key','site_logo')->first()->value ?? 'placeholder.jpg'}}">
                            </div>
                          </div>
                        </div>
                        <span class="text-danger">{{$errors->first('site_logo') ?? null}}</span>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Site Name
                            <span class="text-danger">*</span>
                          </label>
                          <input autocomplete="off" type="text" name="site_name" parsley-trigger="change" required class="form-control" id="userName" value="{{old('site_name') ?? $settings->where('key','site_name')->first()->value ?? null }}">
                          <span class="text-danger">{{$errors->first('site_name') ?? null}}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Site Email
                            <span class="text-danger">*</span>
                          </label>
                          <input autocomplete="off" type="text" name="site_email" parsley-trigger="change" required class="form-control" id="userName" value="{{old('site_email') ?? $settings->where('key','site_email')->first()->value ?? null }}">
                          <span class="text-danger">{{$errors->first('site_email') ?? null}}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No Reply Email
                            <span class="text-danger">*</span>
                          </label>
                          <input autocomplete="off" type="text" name="no_reply_email" parsley-trigger="change" required class="form-control" id="userName" value="{{old('no_reply_email') ?? $settings->where('key','no_reply_email')->first()->value ?? null }}">
                          <span class="text-danger">{{$errors->first('no_reply_email') ?? null}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="website" parsley-trigger="change" required class="form-control" id="userName" value="{{old('website') ?? $settings->where('key','website')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('website') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Timings
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="timmings" parsley-trigger="change" required class="form-control" id="userName" value="{{old('timmings') ?? $settings->where('key','timmings')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('timmings') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Number
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="contact_number" parsley-trigger="change" required class="form-control" id="userName" value="{{old('contact_number') ?? $settings->where('key','contact_number')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('contact_number') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Email
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="contact_email" parsley-trigger="change" required class="form-control" id="userName" value="{{old('contact_email') ?? $settings->where('key','contact_email')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('contact_email') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="address" parsley-trigger="change" required class="form-control" id="userName" value="{{old('address') ?? $settings->where('key','address')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('address') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Google Source
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="google_source" parsley-trigger="change" required class="form-control" id="userName" value="{{old('google_source') ?? $settings->where('key','google_source')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('google_source') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-12">
                  <h4>Social Link</h4>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Facebook
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="social_facebook" parsley-trigger="change" required class="form-control" id="userName" value="{{old('social_facebook') ?? $settings->where('key','social_facebook')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('social_facebook') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Twitter
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="social_twitter" parsley-trigger="change" required class="form-control" id="userName" value="{{old('social_twitter') ?? $settings->where('key','social_twitter')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('social_twitter') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Linkedin
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="social_linkedin" parsley-trigger="change" required class="form-control" id="userName" value="{{old('social_linkedin') ?? $settings->where('key','social_linkedin')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('social_linkedin') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Google Plus
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="social_googleplus" parsley-trigger="change" required class="form-control" id="userName" value="{{old('social_googleplus') ?? $settings->where('key','social_googleplus')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('social_googleplus') ?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Instagram
                      <span class="text-danger">*</span>
                    </label>
                    <input autocomplete="off" type="text" name="social_instagram" parsley-trigger="change" required class="form-control" id="userName" value="{{old('social_instagram') ?? $settings->where('key','social_instagram')->first()->value ?? null }}">
                    <span class="text-danger">{{$errors->first('social_instagram') ?? null}}</span>
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
<script type="text/javascript" src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript" src="{{url('')}}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="{{url('')}}/assets/js/dropzone.min.js"></script>
<script>
  Dropzone.autoDiscover = false;
  jQuery(document).ready(function () {
    $('form').parsley();

    // image previewer

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

    // summer note init
    $('.summernote').summernote({
        height: 350,     // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false     // set focus to editable area after initializing summernote
    });


  });
</script>
@endsection
