@extends('cms.layouts.masterpage')

@section('title', 'Report')

@section('top-styles')
<link href="{{url('')}}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> @endsection

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
            <a href="#">Reports</a>
          </li>
          <li class="breadcrumb-item active">Report</li>
        </ol>

      </div>
    </div>
    <form action="{{route('reports')}}" method="post">
      @csrf
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-bar-chart mr-2"></span>Report</h3>
          <div class="portlet-widgets">
            {{--
            <a href="{{url('')}}/roles/roles">
              <button type="button" class="btn btn-white btn-custom btn-rounded waves-effect">
                <i class="fa fa-arrow-left pr-1"></i> Go back</button>
            </a>
            <span class="divider"></span>
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label">
                <i class="fa fa-save"></i>
              </span> Save
            </button> --}}
            <br />
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box m-b-0">

              <div class="row">
                <div class="col-md-8 mx-auto">

                  <div class="form-group">
                    <div class="input-group theme-input-group select-max-h-200">
                      <div class="input-group-prepend width-160px">
                        <div class="input-group-text">Nature of Reports</div>
                      </div>
                      {{--
                        <select data-style="btn-white" parsley-trigger="change" required name="nature" class="  form-control"
                        tabindex="-98"> --}}
                        <select data-style="btn-white" parsley-trigger="change" required name="nature" class="form-control" data-parsley-errors-container="#NatureOfReportErrorContainer" >
                          <option selected="" disabled="" value="Null">Please pick a Nature</option>
                          <option value="1">Report1</option>
                          <option value="3">Report2</option>
                          <option value="4">Report3</option>
                          <option value="5">Report4</option>
                        </select>
                      </div>
                    </div>
                    <span class="text-danger" id="NatureOfReportErrorContainer"></span>

                  <div class="form-group">
                    <div class="input-group theme-input-group select-max-h-200">
                      <div class="input-group-prepend width-160px">
                        <div class="input-group-text">Date</div>
                      </div>
                      <input parsley-trigger="change" required type="text" class="form-control" name="date" id="date" autocomplete="off">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="md md-event-note"></i>
                        </span>
                      </div>

                    </div>
                    <!-- input-group -->
                  </div>

                  <div class="text-right">
                    <button class="btn btn-light-theme waves-effect waves-light" type="submit">
                      <i class="fa fa-search pr-1"></i> Search</button>
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
<script src="{{url('')}}/plugins/moment/moment.js"></script>
<script src="{{url('')}}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {
    // Date Picker
    $('#date').daterangepicker({
      startDate: '2000-01-01',
      endDate: moment(),
      minDate: '2000-01-01',
      maxDate: '2100-12-01',
      dateLimit: false,
      showDropdowns: true,
      showWeekNumbers: true,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      opens: 'left',
      drops: 'down',
      buttonClasses: ['btn', 'btn-sm'],
      applyClass: 'btn-default',
      cancelClass: 'btn-white',
      separator: ' to ',
      locale: {
        format: 'YYYY-MM-DD',
        applyLabel: 'Submit',
        cancelLabel: 'Cancel',
        fromLabel: 'From',
        toLabel: 'To',
        customRangeLabel: 'Custom',
        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        firstDay: 1
      }
    }, function (start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    $('form').parsley();
  });
</script>
@endsection
