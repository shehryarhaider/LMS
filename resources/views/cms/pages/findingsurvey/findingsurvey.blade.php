@extends('cms.layouts.masterpage')

@section('title', 'FindingSurvey')

@section('top-styles')
<!-- Plugins css-->
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

<!-- summernote -->
<link href="{{url('')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
<!-- DataTables -->
<link href="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{url('')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
          <button class="btn btn-dark-theme waves-effect waves-light" type="button"
            onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go
            back</button>
        </div>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('content')}}">
              Content Pages
            </a>
          </li>
          <li class="breadcrumb-item active">FindingSurvey</li>
        </ol>
      </div>
    </div>

    <div class="portlet m-b-0">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <span class="ti-pencil-alt mr-2"></span>FindingSurvey Page</h3>
        <div class="portlet-widgets">
          <br />
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-collapse collapse show" style="">
        <div class="portlet-body">

          <input type="hidden" name="_method" value="put">

          <!-- FindingSurvey Header -->
          <div class="portlet">
            <div class="portlet-heading bg-dark-theme">
              <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1" href="#FindingSurveyHeader"></a>
              <h3 class="portlet-title">FindingSurvey Header</h3>
              <div class="portlet-widgets">
                <button id="IntroFindingSurveyHeader" class="btn btn-white waves-effect btn-rounded">
                  <span class="btn-label">
                    <i class="fa fa-save"></i>
                  </span> Update
                </button>
              </div>
              <div class="clearfix"></div>
            </div>

            <div id="FindingSurveyHeader" class="panel-collapse collapse">
              <div class="portlet-body">
                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Heading
                        <span class="text-danger">*</span>
                      </label>
                      <input type="text" name="heading" parsley-trigger="change" required placeholder="Heading..."
                        class="FindingSurveyHeading form-control" value="{{$intro_findingsurvey_header->heading ?? null }}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Text
                        <span class="text-danger">*</span>
                      </label>
                      <textarea type="text" name="below_heading" parsley-trigger="change" required class="FindingSurveyBelowHeading form-control summernote">{{$intro_findingsurvey_header->text ?? null }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- FindingSurvey Header -->

          
          <!-- Below Intro List -->
          <div class="portlet">
            <div class="portlet-heading bg-dark-theme">
              <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1"
                href="#IntroFindingSurveyListCollapse"></a>
              <h3 class="portlet-title">Image Section List</h3>
              <div class="portlet-widgets">
                <a href="{{route('findingsurvey_image_section.create')}}" class="btn btn-white waves-effect btn-rounded">
                  <span class="btn-label">
                    <i class="fa fa-plus"></i>
                  </span> Add
                </a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div id="IntroFindingSurveyListCollapse" class="panel-collapse collapse ">
              <div class="portlet-body">
                <div class="custom_datatable">
                  <table id="BelowFindingSurveyIntroList" class="table table-bordered table-striped" width="100%" cellspacing="0"
                    cellpadding="0">
                    <thead>
                      <tr>
                        <th class="no-sort text-center" width="3%">S.No</th>
                        <th>image</th>
                        <th>Heading</th>
                        <th>Text</th>
                        <th class="no-sort text-center" width="11%">Actions</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Below Intro List -->
  </div>
</div>
</div>


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

<!-- Required datatable js -->
<script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{url('')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="{{url('')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{url('')}}/plugins/datatables/responsive.bootstrap4.min.js"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
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
@include('cms.pages.findingsurvey.includes.findingsurvey-image-list')
@include('cms.pages.findingsurvey.includes.intro-findingsurvey-header')
@endsection
