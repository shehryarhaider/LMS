@extends('vendor.layouts.masterpage')

@section('title', ' Site Backup')

@section('top-styles')
<!-- Plugins css-->
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

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
          <li class="breadcrumb-item">
            <a href="#">
              <i class="ti-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Module Management</a>
          </li>
          <li class="breadcrumb-item active">View</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-harddrives mr-2"></i> View Files</h3>
        <div class="portlet-widgets">
          <span class="divider"></span>
          <a href="{{route('vendor.mvc.directory',['resource'])}}" class="btn btn-white btn-custom btn-custom-white btn-rounded waves-effect">
            <i class="fa fa-folder mr-1"></i> Add Directory
          </a>
          <span class="divider"></span>
          <a href="{{route('vendor.mvc.view.create')}}" class="btn btn-white btn-custom btn-custom-white btn-rounded waves-effect">
            <i class="fa fa-save mr-1"></i> Add View</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body">
          <div class="alert alert-danger text-center">
              <strong>Warning !</strong> Deleting files will result in a broken application, proceed with caution !
          </div>
          <div class="custom_datatable">
            <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th class="no-sort text-center" width="5%">S.No</th>
                  <th>File</th>
                  <th class="no-sort text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($views as $key => $item)
                {{-- @if (strpos($item, 'vendor') !== 0) --}}
                <tr>
                  <td align="center">{{$key+1}}</td>
                  <td>{{$item}}</td>
                  <td align="center">
                    <a href="javascript:;" class="delete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip"
                      data-id="{{$item}}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
                {{-- @endif --}}
              @endforeach
              </tbody>
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
<script src="{{url('')}}/plugins/switchery/js/switchery.min.js"></script>

<!-- Required datatable js -->
<script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{url('')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{url('')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{url('')}}/plugins/datatables/jszip.min.js"></script>
<script src="{{url('')}}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{url('')}}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{url('')}}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{url('')}}/plugins/datatables/buttons.print.min.js"></script>
<script src="{{url('')}}/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{url('')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{url('')}}/plugins/datatables/responsive.bootstrap4.min.js"></script>

@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
  $(document).ready(function () {

    var table = $('#datatable').DataTable({
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
      }]
    });



    $(document).on('click', '.delete', function () {
      var deleteName = $(this).data('id');
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
            .post('{{route("vendor.mvc.view.destroy")}}', {
              _method: 'delete',
              _token: '{{csrf_token()}}',
              name: deleteName,
            })
            .then(function (response) {
              console.log(response);
              swal(
                'Deleted!',
                'Your view has been deleted.',
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
                'Oops, something bad happened :-(',
                'error'
              )
            });
        }
      })
    });

  });

</script>
@endsection
