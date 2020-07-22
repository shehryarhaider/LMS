@extends('cms.layouts.masterpage')

@section('title', 'Reports List')

@section('top-styles')

<!-- DataTables -->
<link href="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{url('')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection

<style>
  .content-page {
    margin: 0 !important;
  }

  .content-page>.content {
    margin: 0 !important;
    padding: 0 !important;
  }

  .content-page>.content .container-fluid {
    padding: 0 !important;
  }

  .content-page .footer {
    left: 0 !important;
  }
</style>

@section('header')

@endsection

@section('leftsidebar')

@endsection

@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-menu-alt mr-2"></i> Reports List</h3>
        <div class="portlet-widgets">
          {{-- <button id="print" data-original-title="Print" title="" data-placement="top" data-toggle="tooltip" class="btn btn-white btn-custom-white btn-custom waves-effect btn-rounded"
            type="button">
            &nbsp;
            <i class="fa fa-print"></i>&nbsp;
          </button> --}}

          <span class="divider"></span>
          <span class="divider"></span>
          <div class="btn-group pull-right">
            <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body">

          <div class="row align-items-center mb-3">
            <div class="col-md-3">
              <img src="{{url('')}}/uploads/placeholder.jpg" width="100" alt="" />
            </div>

            <div class="col-md-6 text-center">
              <h3 class="m-0">
                <b>TASK SHEET</b>
              </h3>
              <h3 class="m-0">
                <b>NATURE WISE SUMMARY REPORT</b>
              </h3>
              <h4 class="m-0">
                <b>REPORT DURATION
                  <span class="text-light-theme">FROM</span> : 2000-01-01,
                  <span class="text-light-theme">TO</span> : 2018-06-27</b>
              </h4>
              <h6 class="m-0">
                <b>REPORT DATE : 2018-06-27</b>
              </h6>
            </div>

            <div class="col-md-3 text-right">
              <img src="{{url('')}}/uploads/placeholder.jpg" width="100" alt="" />
            </div>
          </div>

          <div class="custom_datatable">
            <table class="table table-bordered table-striped" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th>Nature of Reports</th>
                  <th>Report Recived</th>
                  <th>Solved</th>
                  <th>Closed</th>
                  <th>Cancelled</th>
                  <th>Under Process</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>Total</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                </tr>
              </tfoot>
            </table>

          </div>
          <!-- custom_datatable -->

        </div>
        <!--portlet-body-->

      </div>

    </div>
    <!-- portlet -->

  </div>
  <!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')

@endsection

@section('bottom-mid-scripts')

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
<script type="text/javascript">
  $(document).ready(function () {
    //$('#datatable').DataTable();

    $('#datatable').DataTable({
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
      }],
      //scrollX:true,
    });

    $('#print').click(function () {
      window.print();
    });

  });

</script>
@endsection
