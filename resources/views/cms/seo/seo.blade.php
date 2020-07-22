@extends('cms.layouts.masterpage')

@section('title', 'Business')

@section('top-styles')
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

    <!-- Page-Title -->
    <div class="row">
      <div class="col-sm-12">
        <!-- <h4 class="page-title">Portlets</h4> -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Search Engine Optimization</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-sharethis mr-2"></i> Search Engine Optimization</h3>
        <div class="portlet-widgets">
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body">
          <div class="custom_datatable">
            <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th class="no-sort text-center" width="5%">S.No</th>
                  <th>Menu</th>
                  <th class="no-sort text-center" width="10%">Actions</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- end row -->


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

    var table = $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route("seo.datatable") }}',
      "columns": [
        { "data": "", "defaultContent": "" },
        { "data": "name", "defaultContent": "" },
        { "data": "id", "defaultContent": "" },
      ],
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
      },
      {
        "targets": 0,
        "render": function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      {
        "targets": -1,
        "render": function (data, type, row, meta) {
          var edit = '{{route("seo.edit",[":id"])}}';
          edit = edit.replace(':id', data);
          var checked = row.status == 1 ? 'checked' : null;
          return `
          <a href="` + edit + `" class="text-info p-1" data-original-title="Edit"                  title="" data-placement="top" data-toggle="tooltip">
              <i class="fa fa-pencil"></i>
          </a>
          `;
        },
      },
      ],
      "drawCallback": function (settings) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.status'));
        if (elems) {
          elems.forEach(function (html) {
            var switchery = new Switchery(html, {
              color: '#005CA3'
              , secondaryColor: '#dfdfdf'
              , jackColor: '#fff'
              , jackSecondaryColor: null
              , className: 'switchery'
              , disabled: false
              , disabledOpacity: 0.5
              , speed: '0.1s'
              , size: 'small'
            });

          });
        }

      },
      //scrollX:true,
    });
  });

</script>
@endsection
