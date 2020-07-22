@extends('cms.layouts.masterpage')

@section('title', 'Chart of Account')

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
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="#">Chart of Account</a>
          </li>
          <li class="breadcrumb-item active">Chart of Account</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-sharethis mr-2"></i> Chart of Account</h3>
        <div class="portlet-widgets">
          @if ( $permissions == "is_admin" || in_array( 'add', $permissions ) )
            <a href="{{route('chart_of_account.create')}}">
              <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
                <i class="fa fa-plus"></i> Add Chart Account</button>
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
                  <th>Name</th>
                  <th width="20%">View Sub Account Types</th>
                  @if ($count > 0)
                  <th class="no-sort text-center" width="10%">Actions</th>
                  @endif
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
      ajax: '{{ route("chart_of_account.datatable") }}',
      "columns": [
        { "data": "id", "defaultContent": "" },
        { "data": "name", "defaultContent": "" },
        { "data": "id", "defaultContent": "" },
        @if ($count > 0)
        { "data": "id", "defaultContent": "" },
        @endif
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
        "targets": -2,
        "render": function (data, type, row, meta) {
          var edit = '{{route("sub_account_type",[":id"])}}';
          edit = edit.replace(':id', data);
          return `
          @if ( $permissions == "is_admin" || in_array( 'edit', $permissions ) )
          <a href="` + edit + `" class="text-info p-1" data-original-title="Edit" title="" data-placement="top" data-toggle="tooltip">
              <i class="fa fa-user-secret"></i>Sub Accounts
          </a>
          @endif
          `;
        },
      },
      @if ($count > 0)
      {
        "targets": -1,
        "render": function (data, type, row, meta) {
          var edit = '{{route("chart_of_account.edit",[":id"])}}';
          edit = edit.replace(':id', data);
          var checked = row.status == 1 ? 'checked' : null;
          return `
          @if ( $permissions == "is_admin" || in_array( 'edit', $permissions ) )
          <a href="` + edit + `" class="text-info p-1" data-original-title="Edit"                  title="" data-placement="top" data-toggle="tooltip">
              <i class="fa fa-pencil"></i>
          </a>
          @endif
          @if ( $permissions == "is_admin" || in_array( 'delete', $permissions ) )
          <a href="javascript:;" class="delete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip" data-id="`+ data + `">
              <i class="fa fa-trash-o"></i>
          </a>
          @endif
          @if ( $permissions == "is_admin" || in_array( 'status', $permissions ) )
          <input class="status" type="checkbox" data-plugin="switchery"                           data-color="#005CA3" data-size="small" ` + checked + ` value="` + row.id + `">
          @endif
          `;
        },
      },
      @endif
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

        $('.status').change(function () {
          var $this = $(this);
          var id = $this.val();
          var status = this.checked;

          if (status) {
            status = 1;
          } else {
            status = 0;
          }

          axios
            .post('{{route("chart_of_account.status")}}', {
              _token: '{{csrf_token()}}',
              _method: 'patch',
              id: id,
              status: status,
            })
            .then(function (responsive) {
              console.log(responsive);
            })
            .catch(function (error) {
              console.log(error);
            });
        });

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
              .post('{{route("chart_of_account.destroy")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                id: deleteId,
              })
              .then(function (response) {
                console.log(response);

                swal(
                  'Deleted!',
                  'Your Network has been deleted.',
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
                  error.response.data.error,
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
