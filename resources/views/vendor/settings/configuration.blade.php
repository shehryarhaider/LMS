@extends('vendor.layouts.masterpage')

@section('title', 'Site Configuration')

@section('top-styles')
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

<link href="{{url('')}}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{url('')}}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="{{url('')}}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"> @endsection

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
            <a href="#">Settings</a>
          </li>
          <li class="breadcrumb-item active">Site Configuration</li>
        </ol>

      </div>
    </div>

    <form action="{{route('vendor.configuration')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="fa fa-wrench mr-2"></span>Site Configuration</h3>
          <div class="portlet-widgets">
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

            <div class="card-box m-b-0">

              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-light-theme"><b>Site Settings</b></h4>
                </div>

                <div class="col-md-4">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' name="site_logo_desktop" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload1"><span>Site Logo Desktop</span></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview1" style="background-image : url({{url('/uploads/images')}}/{{getConfig('site_logo_desktop')}}">
                      </div>
                    </div>
                  </div>
                  @if ($errors->has('site_logo_desktop'))
                  <span class="text-danger">{{$errors->first('site_logo_desktop')}}</span>
                  @endif
                </div>

                <div class="col-md-4">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' name="site_logo_smartphone" id="imageUpload2" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload2"><span>Site Logo Smartphone</span></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview2" style="background-image : url({{url('/uploads/images')}}/{{getConfig('site_logo_smartphone')}}">
                      </div>
                    </div>
                  </div>
                  @if ($errors->has('site_logo_smartphone'))
                  <span class="text-danger">{{$errors->first('site_logo_smartphone')}}</span>
                  @endif
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Site Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="site_name" parsley-trigger="change" required placeholder="Site Name..." class="form-control" id="userName" value="{{getConfig('site_name')}}">
                  </div>
                  @if ($errors->has('site_name'))
                  <span class="text-danger">{{$errors->first('site_name')}}</span>
                  @endif
                </div>
              </div>

              <div class="seprater_single"></div>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-light-theme"><b>Two Factor Authentication</b></h4>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Enable/Disable:</label>
                    <input type="checkbox" class="two_factor_authentication" name="two_factor_authentication" data-plugin="switchery" data-color="#005CA3" data-size="small" {{getConfig('two_factor_authentication') == 1 ? 'checked' : null}}/>
                  </div>
                </div>
              </div>
              <div class="seprater_single"></div>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-light-theme"><b>Single User Session</b></h4>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Enable/Disable:</label>
                    <input type="checkbox" class="single_user_session" name="single_user_session" data-plugin="switchery" data-color="#005CA3" data-size="small" {{getConfig('single_user_session') == 1 ? 'checked' : null}}/>
                  </div>
                </div>
              </div>

              <div class="seprater_single"></div>

              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-light-theme"><b>Text or Graphic Logo</b></h4>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label">Text/Graphic:</label>
                    <input type="checkbox" class="text_graphic_logo" name="text_graphic_logo" data-plugin="switchery" data-color="#005CA3" data-size="small" {{getConfig('text_graphic_logo') == 1 ? 'checked' : null}}/>
                  </div>
                </div>
              </div>
              <div class="seprater_single"></div>

              <div class="row">
              <div class="col-md-12">
                <h4 class="text-light-theme"><b>SMTP Setup</b></h4>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mail driver :</label>
                  <input type="text" name="mail_driver" placeholder="Site Name" class="form-control" value="{{getConfig('mail_driver')}}">
                </div>
                @if ($errors->has('mail_driver'))
                <span class="text-danger">{{$errors->first('mail_driver')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mail Host :</label>
                  <input type="text" name="mail_host" placeholder="Site Name" class="form-control" value="{{getConfig('mail_host')}}">
                </div>
                @if ($errors->has('mail_host'))
                <span class="text-danger">{{$errors->first('mail_host')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mail Port :</label>
                  <input type="text" name="mail_port" placeholder="Site Name" class="form-control" value="{{getConfig('mail_port')}}">
                </div>
                @if ($errors->has('mail_port'))
                <span class="text-danger">{{$errors->first('mail_port')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mail Username :</label>
                  <input type="text" name="mail_username" placeholder="Site Name" class="form-control" value="{{getConfig('mail_username')}}">
                </div>
                @if ($errors->has('mail_username'))
                <span class="text-danger">{{$errors->first('mail_username')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mail Password :</label>
                  <input type="password" name="mail_password" placeholder="Site Name" class="form-control" value="{{getConfig('mail_password')}}">
                </div>
                @if ($errors->has('mail_password'))
                <span class="text-danger">{{$errors->first('mail_password')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">From Address :</label>
                  <input type="text" name="from_address" placeholder="Site Name" class="form-control" value="{{getConfig('from_address')}}">
                </div>
                @if ($errors->has('from_address'))
                <span class="text-danger">{{$errors->first('from_address')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">From Name :</label>
                  <input type="text" name="from_name" placeholder="Site Name" class="form-control" value="{{getConfig('from_name')}}">
                </div>
                @if ($errors->has('from_name'))
                <span class="text-danger">{{$errors->first('from_name')}}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Encryption :</label>
                  <input type="text" name="mail_encryption" placeholder="Site Name" class="form-control" value="{{getConfig('mail_encryption')}}">
                </div>
                @if ($errors->has('mail_encryption'))
                <span class="text-danger">{{$errors->first('mail_encryption')}}</span>
                @endif
              </div>
              <div class="col-md-12">
                <h4 class="text-light-theme"><b>Image link setup</b></h4>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Files Link :</label>
                  <input type="text" name="files_link" placeholder="Site Name" class="form-control" value="{{getConfig('files_link')}}">
                </div>
                @if ($errors->has('files_link'))
                <span class="text-danger">{{$errors->first('files_link')}}</span>
                @endif
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
<script src="{{url('')}}/plugins/switchery/js/switchery.min.js"></script>

<script src="{{url('')}}/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="{{url('')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('')}}/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {

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

    $("#imageUpload2").change(function () {
      readURL(this, 2);
    });

    // Date Picker
    jQuery('#dob').datepicker({
      format: 'yyyy-mm-dd',
    });

    $('form').parsley();

    $('.two_factor_authentication').change(function(){
			var $this = $(this);
			var status = this.checked;

			if (status) {
				status = 1;
			} else {
				status = 0;
			}

			axios
				.post('{{route("vendor.configuration.status")}}',{
					_token: '{{csrf_token()}}',
					status: status,
				})
				.then(function(responsive){
					console.log(responsive);
				})
				.catch(function(error){
					console.log(error);
				});
		});
  });
</script>
@endsection
