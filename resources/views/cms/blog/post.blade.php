@extends('cms.layouts.masterpage')

@section('title', 'Post')

@section('top-styles')
<!-- Plugins css-->
<link href="{{url('')}}/plugins/switchery/css/switchery.min.css" rel="stylesheet" />

<!-- summernote -->
<link href="{{url('')}}/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

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
            <a href="#">Blogs</a>
          </li>
          <li class="breadcrumb-item active">Post</li>
        </ol>
      </div>
    </div>

    <div class="portlet">
      <div class="portlet-heading bg-light-theme">
        <h3 class="portlet-title">
          <i class="ti-sharethis mr-2"></i> Post</h3>
        <div class="portlet-widgets">
          @if ( $permissions == "is_admin" || in_array( 'add', $permissions ) )
            <a href="{{route('blog.post.create')}}">
              <button class="btn btn-white btn-custom-white btn-custom btn-rounded waves-effect" type="button">
                <i class="fa fa-plus"></i> Add Post</button>
            </a>
          @endif
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="bg-primary1" class="panel-collapse collapse show">
        <div class="portlet-body">
          <div class="custom_datatable">

              <form action="#" id="advanceSearch">
                <div class="bg-black-transparent1 m-b-15 p15 pb0">
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Heading</label>
                        <input type="text" name="heading" id="autocomplete-ajax1" class="form-control" placeholder="heading" style=" z-index: 2;" autocomplete="off"/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Category</label>
                        <select parsley-trigger="change" data-style="btn-white" name="category" class="form-control">
                          <option selected="" value="">No Filter</option>
                          @foreach ($category as $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <button id="search" class="btn btn-light-theme btn-block waves-effect waves-light">
                          <i class="fa fa-search pr-1"></i> Search</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

            <table id="datatable" class="table table-bordered table-striped" width="100%" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th class="no-sort text-center" width="5%">S.No</th>
                  <th>Heading</th>
                  <th>Category</th>
                  <th>Featured</th>
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
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script src="{{url('')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('form').parsley();

    $('.summernote').summernote({
      height: 350,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: false                 // set focus to editable area after initializing summernote
    });

  });

</script>
<script type="text/javascript">

    function readURL(input, number) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imagePreview' + number).css('background-image', 'url(' + e.target.result + ')');
          $('#imagePreview' + number).hide();
          $('#imagePreview' + number).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
<script type="text/javascript">
  $(document).ready(function () {
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("blog.post.datatable") }}',
        "columns": [
          { "data": "id", name:"posts.id", "defaultContent": "", "className": "text-center" },
          { "data": "heading", "defaultContent": "" },
          { "data": "category.name", "defaultContent": "" },
          { "data": "featured", "defaultContent": "" },
          @if ($count > 0)
          { "data": "id", name:"posts.id" ,"defaultContent": "", "className": "text-center" },
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
          var checked = data == 1 ? 'checked' : null;
          console.log(data);
          return `
          @if ( $permissions == "is_admin" || in_array( 'featured', $permissions ) )
          <input class="featured" type="checkbox" data-plugin="switchery" data-color="#49C47C" data-size="small" ` + checked + ` value="` + row.id + `">
          @endif
          `;
        },
      },
      @if ($count > 0)
        {
          "targets": -1,
          "render": function (data, type, row, meta) {
            var edit = '{{route("blog.post.edit",[":id"])}}';
            edit = edit.replace(':id', data);
            var checked = row.status == 1 ? 'checked' : null;
            return `
            @if ( $permissions == "is_admin" || in_array( 'edit', $permissions ) )
              <a href="` + edit + `" class="text-info p-1" data-original-title="Edit" title="" data-placement="top" data-toggle="tooltip">
                  <i class="fa fa-pencil"></i>
              </a>
            @endif
            @if ( $permissions == "is_admin" || in_array( 'delete', $permissions ) )
              <a href="javascript:;" class="postDelete text-danger p-2" data-original-title="Delete" title="" data-placement="top" data-toggle="tooltip" data-id="`+ data + `">
                  <i class="fa fa-trash-o"></i>
              </a>
            @endif
            @if ( $permissions == "is_admin" || in_array( 'status', $permissions ) )
              <input class="postStatus" type="checkbox" data-plugin="switchery" data-color="#49C47C" data-size="small" ` + checked + ` value="` + row.id + `">
            @endif
            `;
          },
        },
        @endif
        ],
        "drawCallback": function (settings) {
          var elems = Array.prototype.slice.call(document.querySelectorAll('.postStatus'));
          if (elems) {
            elems.forEach(function (html) {
              var switchery = new Switchery(html, {
                color: '#49C47C'
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
          var featured_elems = Array.prototype.slice.call(document.querySelectorAll('.featured'));
        if (featured_elems) {
          featured_elems.forEach(function (html) {
            var switchery = new Switchery(html, {
              color: '#49C47C'
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

          $('.postStatus').change(function () {
            var $this = $(this);
            var id = $this.val();
            var status = this.checked;

            if (status) {
              status = 1;
            } else {
              status = 0;
            }

            axios
              .post('{{route("blog.post.status")}}', {
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
          $('.featured').change(function () {
          var $this = $(this);
          var id = $this.val();
          var status = this.checked;

          if (status) {
            status = 1;
          } else {
            status = 0;
          }

          axios
            .post('{{route("blog.post.featured")}}', {
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

          $('.postDelete').click(function () {
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
                .post('{{route("blog.post.destroy")}}', {
                  _method: 'delete',
                  _token: '{{csrf_token()}}',
                  id: deleteId,
                })
                .then(function (response) {
                  console.log(response);

                  swal(
                    'Deleted!',
                    'Your item has been deleted.',
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


    $('#advanceSearch').submit(function(e){
      e.preventDefault();
      table.columns(1).search($('input[name="heading"]').val());
      table.columns(2).search($('select[name="category"]').val());
      table.draw();
    });

    $(".custom_datatable #datatable_wrapper .row:nth-child(2) .col-sm-12").niceScroll();
  });

</script>
@endsection
