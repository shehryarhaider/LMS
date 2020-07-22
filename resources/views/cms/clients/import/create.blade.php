@extends('cms.layouts.masterpage')

@section('title', 'Clients')

@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{url('')}}/plugins/jquery.steps/css/jquery.steps.css" />

#datatable_filter{
  display: none !important;
}
</style>

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

     <!-- Page-Title -->
     <div class="row">
      <div class="col-sm-12">
      <div class="btn-group pull-right">
        <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
      </div>
        <!-- <h4 class="page-title">Portlets</h4> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Import</a>
          </li>
          <li class="breadcrumb-item active">Import</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-user mr-2"></i> Import</h3>
        <div class="portlet-widgets">
          <span class="divider"></span>
          <a href="{{url('/download/sample.csv')}}" target="_blank">
            <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
              <i class="fa fa-download"></i> Download Sample File</button>
          </a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body custom_wizard_form">

          <form id="wizard-validation-form" method="post" action="{{route('import.clients.store')}}" enctype="multipart/form-data">
            @csrf
            <div>
              <h3>
                <i class="fa fa-download"></i> Import Data</h3>
              <section>
                <div class="form-group clearfix">
                  <label class="control-label">File Name *</label>
                  <input type="text" name="file_name" class="form-control required" data-iconname="fa fa-cloud-upload">
                  <span class="text-danger">{{$errors->first('file_name') ?? null}}</span>
                </div>

                <div class="form-group clearfix">
                  <label class="control-label">Select Csv File *</label>
                  <input type="file" name="file" class="filestyle required" data-iconname="fa fa-cloud-upload">
                  <span class="text-danger">{{$errors->first('file') ?? null}}</span>
                </div>
              </section>

              <h3>Step 2</h3>
              <section>
              </section>

              <h3>Step 3</h3>
              <section>
              </section>

            </div>
          </form>

        </div>
      </div>

    </div>
    <!-- end row -->


  </div>
  <!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')

<script src="{{url('')}}/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<!--Form Wizard-->
<script src="{{url('')}}/plugins/jquery.steps/js/jquery.steps.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{url('')}}/plugins/jquery-validation/js/jquery.validate.min.js"></script>
 @endsection

@section('bottom-bot-scripts')
<script>

  !function ($) {
    "use strict";

    var FormWizard = function () { };

    //creates form with validation
    FormWizard.prototype.createValidatorForm = function ($form_container) {
      $form_container.validate({
        errorPlacement: function errorPlacement(error, element) {
          element.after(error);
        }
      });
      $form_container.children("div").steps({
        forceMoveForward: true,
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
          $form_container.validate().settings.ignore = ":disabled,:hidden";
          if ($form_container.valid()) {
            $form_container.submit();
          }

        },
      });

      return $form_container;
    },
      FormWizard.prototype.init = function () {
        //form with validation
        this.createValidatorForm($("#wizard-validation-form"));
      },
      //init
      $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
  }(window.jQuery),

  //initializing
  function ($) {
    "use strict";
    $.FormWizard.init()
  }(window.jQuery);
</script>
@endsection
