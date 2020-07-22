@extends('cms.layouts.masterpage')

@section('title', 'Clients')

@section('top-styles')
<!-- DataTables -->
<link href="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{url('')}}/plugins/jquery.steps/css/jquery.steps.css" />

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
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body custom_wizard_form">

          <form id="wizard-validation-form" method="post" action="{{route('import.clients.upload', $import->id)}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch">
            <div>
              <h3>
                <i class="fa fa-download"></i> Import Data</h3>
              <section>
              </section>

              <h3>Step 2</h3>
              <section>
              </section>

              <h3>Step 3</h3>
              <section>
                <div class="custom_datatable">
                  <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0" cellpadding="0">
                    <thead>
                      <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>number</th>
                      </tr>
                    </thead>
                  </table>
                </div>
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
<!-- Required datatable js -->
<script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
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
    FormWizard.prototype.createValidatorForm = function($form_container) {
      $form_container.validate({
          errorPlacement: function errorPlacement(error, element) {
              element.after(error);
          }
      });
      $form_container.children("div").steps({
          startIndex: 2,
          forceMoveForward: true,
          headerTag: "h3",
          bodyTag: "section",
          transitionEffect: "slideLeft",
          onFinished: function (event, currentIndex) {
              if(true)
              {
                $form_container.submit();
              }
          }
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

    jQuery(document).ready(function() {
    // Date Picker
    $(":file").filestyle({input: false});

    $('#datatable').DataTable({
      data: {!!$json!!},
      //scrollX: true,
      "columns": [
        {"data": "name", "defaultContent": ""},
        {"data": "email", "defaultContent": ""},
        {"data": "number", "defaultContent": ""},
      ],
      "columnDefs":[{
      "targets": 'no-sort',
      "orderable": false,
      }]
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf']
    });

    $(".custom_datatable select").removeClass("form-control-sm");
    $(".custom_datatable #datatable_wrapper .row:nth-child(2) .col-sm-12").niceScroll();

  });
</script>
@endsection
