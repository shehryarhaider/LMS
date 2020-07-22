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
            <a href="#">Settings</a>
          </li>
          <li class="breadcrumb-item active">Site Backup</li>
        </ol>
      </div>
    </div>
    <form action="{{ route('vendor.backup') }}" method="post">
      @csrf
    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-harddrives mr-2"></i> Site Backup</h3>
        <div class="portlet-widgets">
          <div class="radio radio-theme form-check-inline custom_top_radio">
            <input type="radio" id="inlineRadio1" value="1" name="backup" checked>
            <label class="m-0" for="inlineRadio1"> DB </label>
          </div>
          <div class="radio radio-theme form-check-inline custom_top_radio">
            <input type="radio" id="inlineRadio2" value="2" name="backup">
            <label class="m-0" for="inlineRadio2"> DB &amp; Site </label>
          </div>
          <span class="divider"></span>
          <button type="submit" class="btn btn-white btn-custom btn-custom-white btn-rounded waves-effect">
            <i class="fa fa-save mr-1"></i> Create Backup</button>
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
                  <th>File</th>
                  <th class="no-sort text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($files as $key => $item)
                <tr>
                  <td align="center">{{$key+1}}</td>
                  <td>{{str_replace('padeaf-cms/','',$item)}}</td>
                  <td align="center">
                    <a href="{{route('vendor.backup.download',[str_replace('padeaf-cms/','',$item)])}}" class="text-success p-2" data-original-title="Download"
                      title="" data-placement="top" data-toggle="tooltip">
                      <i class="fa fa-download"></i>
                    </a>
                    <a href="javascript:;" class="delete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip"
                      data-id="{{str_replace('padeaf-cms/','',$item)}}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- end row -->
    </form>

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
          .post('{{route("vendor.backup.destroy")}}', {
            _method: 'delete',
            _token: '{{csrf_token()}}',
            id: deleteId,
          })
          .then(function (response) {
            console.log(response);
            swal(
              'Deleted!',
              'Your Backup has been deleted.',
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
