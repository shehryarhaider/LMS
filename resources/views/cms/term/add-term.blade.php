@extends('cms.layouts.masterpage')

@section('title', 'Add Term')

@section('top-styles')

<link href="{{ url('') }}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
<link href="{{ url('') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="{{ url('') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

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
            <a href="{{route('term')}}">Term</a>
          </li>
          <li class="breadcrumb-item active">
              @if($isEdit==true)
              Edit
              @else
              Add
              @endif
             Term</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('term.update',[$term->id]) : route('term.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>
            @if($isEdit==true)
            Edit
            @else
            Add
            @endif
             Term</h3>
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
                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Start Year <span class="text-danger">*</span></label>
                        <div>
                          <div class="input-group">
                            <input required type="text" maxlength="4" name="start_year" class="form-control txtboxToFilter" id="startyear" aria-describedby="emailHelp" placeholder="Start Year" value="{{$term->start_year ?? old('start_year') ?? null}}" data-parsley-errors-container="#error-start-year">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="md md-event-note"></i></span>
                            </div>
                          </div><!-- input-group -->
                        </div>
                        <div id="error-start-year"></div>
                      </div>
                      <span class="text-danger">{{ $errors->first('start_year') ?? null }}</span>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>End Year <span class="text-danger">*</span></label>
                        <div>
                          <div class="input-group">
                            <input @if($isEdit == false) disabled @endif required type="text" maxlength="4" name="end_year" class="form-control txtboxToFilter" id="endyear" aria-describedby="emailHelp" placeholder="End Year" value="{{$term->end_year ?? old('end_year') ?? null}}" data-parsley-errors-container="#error-end-year">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="md md-event-note"></i></span>
                            </div>
                          </div><!-- input-group -->
                        </div>
                        <div id="error-end-year"></div>
                      </div>
                      <span class="text-danger">{{ $errors->first('end_year') ?? null }}</span>
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
<script src="{{ url('') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>

 <script src="{{url('')}}/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

 <script src="{{url('')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


 <script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>


<script>
  jQuery(document).ready(function () {

    $('form').parsley();

    $('.select2').select2();

    var date = new Date();
    date.setDate(date.getDate());

    $("#startyear").datepicker({
      // todayBtn:  1,
      autoclose: true,
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      orientation: "auto",
      startDate: date,
      todayHighlight: true,
    }).on('changeDate', function (selected) {

      var minDate = new Date(selected.date.valueOf());

      minDate.setFullYear(minDate.getFullYear() + 1);


      $('#endyear').datepicker({
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        startDate: minDate,
      });

    });


    $("#startyear").click(function(){
      $("#startyear").trigger('focus').datepicker();
    });

    $("#startyear").change(function(){
      $("#endyear").removeAttr('disabled');
    });


  });
</script>
@endsection
