@extends('cms.layouts.masterpage')

@section('title', 'Home')

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
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div>
    </div>

    <div class="portlet m-b-0">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <span class="ti-pencil-alt mr-2"></span>Home Page</h3>
        <div class="portlet-widgets">
          <br />
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-collapse collapse show" style="">
        <div class="portlet-body">

          <input type="hidden" name="_method" value="put">
          
          <!-- Service Header -->
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1" href="#ServiceHeader"></a>
                <h3 class="portlet-title">Our Services</h3>
                <div class="portlet-widgets">
                  <button id="IntroServiceHeader" class="btn btn-white waves-effect btn-rounded">
                    <span class="btn-label">
                      <i class="fa fa-save"></i>
                    </span> Update
                  </button>
                </div>
                <div class="clearfix"></div>
              </div>
              <div id="ServiceHeader" class="panel-collapse collapse">
                <div class="portlet-body">
                  <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Heading
                          <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="heading" parsley-trigger="change" required  placeholder="Heading..." class="ServiceHeading form-control" value="{{$intro_Service->heading ?? null }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Text
                          <span class="text-danger">*</span>
                        </label>
                        <textarea type="text" name="text" parsley-trigger="change" required
                          class="ServieText form-control summernote">{{$intro_Service->text ?? null }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- Service Header -->

          <!-- Add Services-->
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1"
                  href="#IntroServiceListCollapse"></a>
                <h3 class="portlet-title">Add Services</h3>
                <div class="portlet-widgets">
                  <a href="{{route('our_service.create')}}" class="btn btn-white waves-effect btn-rounded">
                    <span class="btn-label">
                      <i class="fa fa-plus"></i>
                    </span> Add
                  </a>
                </div>
                <div class="clearfix"></div>
              </div>

              <div id="IntroServiceListCollapse" class="panel-collapse collapse ">
                <div class="portlet-body">
                  <div class="custom_datatable">
                    <table id="BelowServiceIntroList" class="table table-bordered table-striped" width="100%"
                      cellspacing="0" cellpadding="0">
                      <thead>
                        <tr>
                          <th class="no-sort text-center" width="3%">S.No</th>
                          <th>image</th>
                          <th>heding</th>
                          <th>Text</th>
                          <th class="no-sort text-center" width="11%">Actions</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <!-- Add Services-->

          <!-- Pak Association Header -->
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1" href="#PakAssociationHeader"></a>
                <h3 class="portlet-title">Pak Associations</h3>
                <div class="portlet-widgets">
                  <button id="IntroPakAssociationHeader" class="btn btn-white waves-effect btn-rounded">
                    <span class="btn-label">
                      <i class="fa fa-save"></i>
                    </span> Update
                  </button>
                </div>
                <div class="clearfix"></div>
              </div>
              <div id="PakAssociationHeader" class="panel-collapse collapse">
                <div class="portlet-body">
                  <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Heading
                          <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="heading" parsley-trigger="change" required placeholder="Heading..."
                          class="PakAssociationHeading form-control" value="{{$intro_pak_association->heading ?? null }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Text
                          <span class="text-danger">*</span>
                        </label>
                        <textarea type="text" name="text" parsley-trigger="change" required
                          class="PakAssociationText form-control summernote">{{$intro_pak_association->text ?? null }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- PakAssociation Header -->

          <!-- Pak Association Section -->
              <div class="portlet">
                <div class="portlet-heading bg-dark-theme">
                  <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1" href="#PakAssociationSection"></a>
                  <h3 class="portlet-title">Pak Associations Section</h3>
                  <div class="portlet-widgets">
                    <button id="IntroPakAssociationSection" class="btn btn-white waves-effect btn-rounded">
                      <span class="btn-label">
                        <i class="fa fa-save"></i>
                      </span> Update
                    </button>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div id="PakAssociationSection" class="panel-collapse collapse">
                  <div class="portlet-body">
                    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                            <input type='file' name="image" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload1"><span>Featured Image  </span></label>
                          </div>
                          <div class="avatar-preview">
                            <div id="imagePreview1" style="background-image : url({{getConfig('files_link')}}{{$pak_association_section->icon ?? 'placeholder.jpg'}});">
                            </div>
                          </div>
                        </div>
                        <span class="text-danger">{{$errors->first('image') ?? null}}</span>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Text
                            <span class="text-danger">*</span>
                          </label>
                          <textarea type="text" name="text" parsley-trigger="change" required
                            class="PakAssociationSectionText form-control summernote">{{$pak_association_section->text ?? null }}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- PakAssociation Section -->

            <!--Pad's Education Header -->
            <div class="portlet">
              <div class="portlet-heading bg-dark-theme">
                <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1" href="#PEHeader"></a>
                <h3 class="portlet-title">Pad's Education</h3>
                <div class="portlet-widgets">
                  <button id="IntroPEHeader" class="btn btn-white waves-effect btn-rounded">
                    <span class="btn-label">
                      <i class="fa fa-save"></i>
                    </span> Update
                  </button>
                </div>
                <div class="clearfix"></div>
              </div>
              <div id="PEHeader" class="panel-collapse collapse">
                <div class="portlet-body">
                  <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Heading
                          <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="heading" parsley-trigger="change" required placeholder="Heading..." class="PEHeading form-control" value="{{$intro_pad_education->heading ?? null }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Text
                          <span class="text-danger">*</span>
                        </label>
                        <textarea type="text" name="text" parsley-trigger="change" required class="PEText form-control summernote">{{$intro_pad_education->text ?? null }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!--Pad's Education Header -->

               <!-- Add Pad's Education -->
              <div class="portlet">
                <div class="portlet-heading bg-dark-theme">
                  <a class="link_b toggle" data-toggle="collapse" data-parent="#accordion1"
                    href="#IntroPEListCollapse"></a>
                  <h3 class="portlet-title">Add Pad's Education</h3>
                  <div class="portlet-widgets">
                    <a href="{{route('pad_education.create')}}" class="btn btn-white waves-effect btn-rounded">
                      <span class="btn-label">
                        <i class="fa fa-plus"></i>
                      </span> Add
                    </a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div id="IntroPEListCollapse" class="panel-collapse collapse ">
                  <div class="portlet-body">
                    <div class="custom_datatable">
                      <table id="BelowPEIntroList" class="table table-bordered table-striped" width="100%"
                        cellspacing="0" cellpadding="0">
                        <thead>
                          <tr>
                            <th class="no-sort text-center" width="3%">S.No</th>
                            <th>heading</th>
                            <th>icon class</th>
                            <th>Text</th>
                            <th class="no-sort text-center" width="11%">Actions</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add Pad's Education-->


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
@include('cms.pages.home.includes.our-services')
@include('cms.pages.home.includes.intro-service')
@include('cms.pages.home.includes.intro-pak-association')
@include('cms.pages.home.includes.pak-association')
@include('cms.pages.home.includes.intro-pad-education')
@include('cms.pages.home.includes.pad-education')
@endsection
