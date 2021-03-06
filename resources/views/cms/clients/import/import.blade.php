@extends('cms.layouts.masterpage')

@section('title', 'Clients')

@section('top-styles')
<!-- Plugins css-->
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

<!-- DataTables -->
<link href="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{url('')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<style>
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
            <a href="#">Files</a>
          </li>
          <li class="breadcrumb-item active">Files</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-user mr-2"></i> Files</h3>
        <div class="portlet-widgets">
          <span class="divider"></span>
          @if ( $permissions == "is_admin" || in_array( 'import-add', $permissions ) )
            <a href="{{route('import.clients.create')}}">
              <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
                <i class="fa fa-download"></i> Import</button>
            </a>
          @endif
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
                  <th>File Name</th>
                  <th>Records</th>
                  <th>Actions</th>
                </tr>
              </thead>
            </table>
          </div>
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
<script type="text/javascript">
  $(document).ready(function () {


var table = $('#datatable').DataTable({
processing: true,
serverSide: true,
ajax: '{{ route("import.clients.datatable") }}',
"columns": [
  { "data": "", "defaultContent": "" },
  { "data": "file_name", "defaultContent": "" },
  { "data": "clients.length", "defaultContent": "" },
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
    var edit = '{{route("import.clients.edit",[":id"])}}';
    edit = edit.replace(':id', data);
    var checked = row.status == 1 ? 'checked' : null;
    return `
    @if ( $permissions == "is_admin" || in_array( 'import-edit', $permissions ) )
    <a href="` + edit + `" class="text-info p-1" data-original-title="Edit" title="" data-placement="top" data-toggle="tooltip">
        <i class="fa fa-pencil"></i>
    </a>
    @endif
    @if ( $permissions == "is_admin" || in_array( 'import-delete', $permissions ) )
    <a href="javascript:;" class="delete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip" data-id="`+ data + `">
        <i class="fa fa-trash-o"></i>
    </a>
    @endif
    `;
  },
},
],
"drawCallback": function (settings) {

  $('.delete').click(function () {
    var deleteId = $(this).data('id');
    var $this = $(this);

    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#4fa7f3',
      cancelButtonColor: '#d57171',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.value) {
      axios
        .post('{{route("import.clients.destroy")}}', {
          _method: 'delete',
          _token: '{{csrf_token()}}',
          id: deleteId,
        })
        .then(function (response) {
          console.log(response);

          swal(
            'Deleted!',
            'Your User has been deleted.',
            'success'
          )

          table
            .row($this.parents('tr'))
            .remove()
            .draw();
        })
        .catch(function (error) {
          console.log(error);
          swal(
            'Failed!',
            error.message,
            'error'
          )
        });
      }
    })
  });
},
//scrollX:true,
});
});

</script>
@endsection
